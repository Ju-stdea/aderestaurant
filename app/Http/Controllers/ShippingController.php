<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shipment;
use App\Services\UPSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class ShippingController extends Controller
{
    protected $upsService;

    public function __construct(UPSService $upsService)
    {
        $this->upsService = $upsService;
    }

    /**
     * Validate ShipTo address and then get the shipping rate.
     */
    public function getRate(Request $request)
    {

        $cityName = $request['cityName'];
        $stateCode = $request['stateCode'];
        $countryCode = $request['countryCode'];
        $address = $request['address'];
        $postal = $request['postal'];
        $totalWeight = $this->getTotalWeight();

        $shipment = $this->buildShipment($cityName, $stateCode, $countryCode, $address, $postal, $totalWeight);

        $transactionId = Str::uuid()->toString();

        $rate = $this->upsService->getRate($shipment, $transactionId);

        $serviceMapping = $this->getUPSServiceMapping();

        $formattedRates = [];
        if (isset($rate['RateResponse']['RatedShipment'])) {
            foreach ($rate['RateResponse']['RatedShipment'] as $shipmentRate) {
                $serviceCode = $shipmentRate['Service']['Code'];
                $serviceInfo = $serviceMapping[$serviceCode] ?? null; 

                $formattedRates[] = [
                    'service_code' => $serviceCode,
                    'service_description' => $serviceInfo['description'] ?? 'Unknown service',
                    'total_charges' => $shipmentRate['TotalCharges']['MonetaryValue'],
                    'currency_code' => $shipmentRate['TotalCharges']['CurrencyCode'],
                    'billing_weight' => $shipmentRate['BillingWeight']['Weight'],
                    'business_days_in_transit' => $shipmentRate['GuaranteedDelivery']['BusinessDaysInTransit'] ?? $serviceInfo['business_days_in_transit'] ?? '3 - 6',  // Default to 3-6 business days if not provided
                    'delivery_by_time' => $shipmentRate['GuaranteedDelivery']['DeliveryByTime'] ?? null,
                ];
            }
        }


        return response()->json($formattedRates);
    }

    public function getShippingRateByCode($serviceCode, $totalWeight, $shippingInfo): mixed
    {
        $shipmentDetails = [
            'Shipper' => [
                'ShipperNumber' => env('UPS_SHIPPER_ACCOUNT'),
                'Address' => [
                    'AddressLine' => [env('UPS_SHIPPER_STREET')],
                    'City' => env('UPS_SHIPPER_CITY'),
                    'StateProvinceCode' => env('UPS_SHIPPER_STATE'),
                    'PostalCode' => env('UPS_SHIPPER_POSTAL_CODE'),
                    'CountryCode' => env('UPS_SHIPPER_COUNTRY'),
                ],
            ],
            'ShipTo' => [
                'Address' => [
                    'AddressLine' => $shippingInfo['address'],
                    'City' => $shippingInfo['city'],
                    'StateProvinceCode' => $shippingInfo['state'],
                    'PostalCode' => $shippingInfo['postal_code'],
                    'CountryCode' => $shippingInfo['country'],
                ],
            ],
            'Service' => [
                'Code' => $serviceCode,
            ],
            'NumOfPieces' => '1',
            'Package' => [
                'PackagingType' => [
                    'Code' => '02',
                    'Description' => 'Package'
                ],
                'PackageWeight' => [
                    'UnitOfMeasurement' => [
                        'Code' => 'LBS',
                        'Description' => 'Pounds'
                    ],
                    'Weight' => (string) $totalWeight,
                ],
                'pickupType' => [
                    'Code' => '03',
                    'Description' => 'Customer Counter'
                ]
            ]
        ];

        $transactionId = uniqid();
        $response = $this->upsService->getRate($shipmentDetails, $transactionId, 'Rate');

        if (
            isset($response['RateResponse']['Response']['ResponseStatus']['Code']) &&
            $response['RateResponse']['Response']['ResponseStatus']['Code'] === '1' &&
            isset($response['RateResponse']['RatedShipment']['TotalCharges']['MonetaryValue'])
        ) {
            return $response['RateResponse']['RatedShipment']['TotalCharges']['MonetaryValue'];
        }

        return 0;
    }




    private function buildShipment($cityName, $stateCode, $countryCode, $address, $postal, $totalWeight)
    {
        return [
            'Shipper' => [
                'Name' => env('UPS_SHIPPER_NAME'),
                'ShipperNumber' => env('UPS_SHIPPER_ACCOUNT'),
                'Address' => [
                    'AddressLine' => [env('UPS_SHIPPER_STREET')],
                    'City' => env('UPS_SHIPPER_CITY'),
                    'StateProvinceCode' => env('UPS_SHIPPER_STATE'),
                    'PostalCode' => env('UPS_SHIPPER_POSTAL_CODE'),
                    'CountryCode' => env('UPS_SHIPPER_COUNTRY'),
                ],
            ],
            'ShipTo' => [
                'Name' => '',
                'Address' => [
                    'AddressLine' => $address,             
                    'City' => $cityName,                    
                    'StateProvinceCode' => $stateCode,      
                    'PostalCode' => $postal,                
                    'CountryCode' => $countryCode           
                ]
            ],
            'PaymentDetails' => [
                'ShipmentCharge' => [
                    'Type' => '01',
                    'BillShipper' => [
                        'AccountNumber' => env('UPS_SHIPPER_ACCOUNT')
                    ]
                ]
            ],
            'NumOfPieces' => '1',
            'Package' => [
                'PackagingType' => [
                    'Code' => '02',
                    'Description' => 'Package'
                ],
                'PackageWeight' => [
                    'UnitOfMeasurement' => [
                        'Code' => 'LBS',
                        'Description' => 'Pounds'
                    ],
                    'Weight' => (string) $totalWeight,
                ],
                'pickupType' => [
                    'Code' => '03',
                    'Description' => 'Customer Counter'
                ]
            ],
            "customerClassification" => [
                "Code" => "01"
            ]
        ];
    }

    /**
     * Create a shipment
     */
    public function createShipmentForOrder($orderId, $shipTo, $totalWeight, $serviceCode)
    {
       
        if (!$orderId || !$shipTo || !$totalWeight || !$serviceCode) {
            throw new \Exception('Missing shipment details.');
        }


        $shipmentData = [
            "ShipmentRequest" => [
                "Request" => [
                    "SubVersion" => "1801",
                    "RequestOption" => "nonvalidate",
                    "TransactionReference" => [
                        "CustomerContext" => ""
                    ]
                ],
                "Shipment" => [
                    "Description" => "Order Shipment" . $orderId,
                    "Shipper" => [
                        "Name" => env('UPS_SHIPPER_NAME'),
                        "AttentionName" => env('UPS_SHIPPER_ATTENTION_NAME'),
                        "Phone" => [
                            "Number" => env('UPS_SHIPPER_PHONE'),
                        ],
                        "ShipperNumber" => env('UPS_SHIPPER_ACCOUNT'),
                        "Address" => [
                            "AddressLine" => [
                                env('UPS_SHIPPER_STREET')
                            ],
                            "City" => env('UPS_SHIPPER_CITY'),
                            "StateProvinceCode" => env('UPS_SHIPPER_STATE'),
                            "PostalCode" => env('UPS_SHIPPER_POSTAL_CODE'),
                            "CountryCode" => env('UPS_SHIPPER_COUNTRY')
                        ]
                    ],
                    "ShipTo" => [
                        "Name" => $shipTo['name'],
                        "AttentionName" => $shipTo['attention_name'],
                        "Phone" => [
                            "Number" => $shipTo['phone']
                        ],
                        "Address" => [
                            "AddressLine" => $shipTo['address_line'],
                            "City" => $shipTo['city'],
                            "StateProvinceCode" => $shipTo['state'],
                            "PostalCode" => $shipTo['postal_code'],
                            "CountryCode" => $shipTo['country_code']
                        ],
                    ],
                    "ShipFrom" => [
                        "Name" => env('UPS_SHIPPER_NAME'),
                        "AttentionName" => env('UPS_SHIPPER_ATTENTION_NAME'),
                        "Phone" => [
                            "Number" => env('UPS_SHIPPER_PHONE')
                        ],
                        "Address" => [
                            "AddressLine" => [
                                env('UPS_SHIPPER_STREET')
                            ],
                            "City" => env('UPS_SHIPPER_CITY'),
                            "StateProvinceCode" => env('UPS_SHIPPER_STATE'),
                            "PostalCode" => env('UPS_SHIPPER_POSTAL_CODE'),
                            "CountryCode" => env('UPS_SHIPPER_COUNTRY')
                        ]
                    ],
                    "PaymentInformation" => [
                        "ShipmentCharge" => [
                            "Type" => "01",
                            "BillShipper" => [
                                "AccountNumber" => env('UPS_SHIPPER_ACCOUNT')
                            ]
                        ]
                    ],
                    "Service" => [
                        "Code" => $serviceCode,
                        "Description" => ""
                    ],
                    "Package" => [
                        "Description" => "",
                        "Packaging" => [
                            "Code" => "02",
                            "Description" => ""
                        ],
                        "PackageWeight" => [
                            "UnitOfMeasurement" => [
                                "Code" => "LBS",
                                "Description" => "Pounds"
                            ],
                            "Weight" => (string) $totalWeight
                        ]
                    ]
                ],
                "LabelSpecification" => [
                    "LabelImageFormat" => [
                        "Code" => "GIF",
                        "Description" => "GIF"
                    ],
                    "HTTPUserAgent" => "Mozilla/4.5"
                ]
            ]
        ];

        $transactionId = Str::uuid()->toString();
        $shipment = $this->upsService->createShipment($shipmentData, $transactionId);

        if ($shipment && $shipment['ShipmentResponse']['Response']['ResponseStatus']['Code'] == '1') {
            $this->storeShipment($orderId, $shipment);

            return [
                'success' => true,
                'message' => 'Shipment created successfully!',
                'shipment_data' => $shipment
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to create shipment. Please try again later.'
            ];
        }
    }


    /**
     * Track a shipment
     */
    public function trackShipment($trackingNumber)
    {
        $transactionId = Str::uuid()->toString();
        $trackingInfo = $this->upsService->trackShipment($trackingNumber, $transactionId);

        return response()->json($trackingInfo);
    }

    public function storeShipment($orderId, $upsResponse): void
    {
        $shipmentData = $upsResponse['ShipmentResponse']['ShipmentResults'];

        $baseServiceCharge = isset($shipmentData['ShipmentCharges']['BaseServiceCharge']['MonetaryValue'])
            ? $shipmentData['ShipmentCharges']['BaseServiceCharge']['MonetaryValue']
            : 0; 

        $itemizedCharges = isset($shipmentData['ShipmentCharges']['ItemizedCharges'][0]['MonetaryValue'])
            ? $shipmentData['ShipmentCharges']['ItemizedCharges'][0]['MonetaryValue']
            : 0; 

        Shipment::create([
            'order_id' => $orderId,
            'shipment_identification' => $shipmentData['ShipmentIdentificationNumber'],
            'tracking_number' => $shipmentData['PackageResults']['TrackingNumber'],
            'transaction_reference' => $upsResponse['ShipmentResponse']['Response']['TransactionReference']['TransactionIdentifier'],
            'total_charges' => $shipmentData['ShipmentCharges']['TotalCharges']['MonetaryValue'],
            'transportation_charges' => $shipmentData['ShipmentCharges']['TransportationCharges']['MonetaryValue'],
            'base_service_charge' => $baseServiceCharge, 
            'itemized_charges' => $itemizedCharges, 
            'currency_code' => $shipmentData['ShipmentCharges']['TotalCharges']['CurrencyCode'],
            'billing_weight' => $shipmentData['BillingWeight']['Weight'],
            'weight_unit' => $shipmentData['BillingWeight']['UnitOfMeasurement']['Code'],
            'shipping_label_base64' => $shipmentData['PackageResults']['ShippingLabel']['GraphicImage'],
        ]);
    }



    public function downloadShippingLabel(Request $request)
    {
        $request->validate([
            'order_id' => 'required'
        ]);

        $order_id = $request->input('order_id');
        $shipment = Shipment::where('order_id', $order_id)->first();

        if (!$shipment) {
            return response()->json(['error' => 'Shipment not found'], 404);
        }

        $imageData = base64_decode($shipment->shipping_label_base64);

        $headers = [
            'Content-Type' => 'image/gif',
            'Content-Disposition' => 'attachment; filename="shipping-label-' . $shipment->tracking_number . '.gif"',
        ];

        return response($imageData, 200, $headers);
    }



    /**
     * Fetch the delivery address of the authenticated user.
     *
     * @return mixed
     */
    private function fetchDeliveryAddress()
    {
        $user = Auth::user();

        $address = $user->deliveryAddresses;

        return $address;
    }

    /**
     * Validate the delivery address of the authenticated user.
     *
     * @return bool
     */
    private function validateAddress()
    {
        // I'm not  using this method in the code below but I'm leaving it here for reference
        // TODO: Implement address validation
        $address = $this->getSampleAddress();


        $shipToAddress = $this->buildAddressValidationRequest($address);

        $validationResponse = $this->upsService->validateAddress($shipToAddress);

        return $this->isAddressValid($validationResponse);
    }

    private function buildAddressValidationRequest($address)
    {
        return [
            'AddressKeyFormat' => [
                'ConsigneeName' => $address['ConsigneeName'],
                'BuildingName' => $address['BuildingName'],
                'AddressLine' => $address['AddressLine'],
                // 'PoliticalDivision2' => $address['PoliticalDivision2'], // City
                'PoliticalDivision1' => $address['PoliticalDivision1'], // State
                'PostcodePrimaryLow' => $address['PostcodePrimaryLow'], // Zip Code
                'PostcodeExtendedLow' => $address['PostcodeExtendedLow'], // Extended Zip Code
                'Urbanization' => $address['Urbanization'],              // Urbanization
                'CountryCode' => $address['CountryCode']                 // Country
            ]
        ];
    }

    private function isAddressValid($validationResponse)
    {
        return isset($validationResponse['XAVResponse']['Response']['ResponseStatus']['Code']) &&
            $validationResponse['XAVResponse']['Response']['ResponseStatus']['Code'] === '1';
    }

    private function getSampleAddress()
    {
        return [
            // 'ConsigneeName' => 'RITZ CAMERA CENTERS-1749',
            // 'BuildingName' => 'Innoplex',
            'AddressLine' => [
                '26601 ALISO CREEK ROAD',
                'STE D',
                'ALISO VIEJO TOWN CENTER'
            ],
            // 'Region' => 'ROSWELL,GA,30076-1521',
            'PoliticalDivision2' => 'ALISO VIEJO', // City
            'PoliticalDivision1' => 'CA',           // State
            'PostcodePrimaryLow' => '92656',        // Primary Zip Code
            // 'PostcodeExtendedLow' => '1521',        // Extended Zip Code
            // 'Urbanization' => 'porto arundal',
            'CountryCode' => 'US'
        ];
    }

    public function getTotalWeight()
    {
        $user = auth()->user();
        $totalWeight = 0.0;

        $cartItemsQuery = $user
            ? Cart::where('customer_id', $user->id)
            : Cart::where('session_id', Session::getId());

        $cartItems = $cartItemsQuery->with('product')->get();

        foreach ($cartItems as $item) {
            $product = $item->product;

            $itemWeight = $item->quantity * (float) $product->product_weight;
            $totalWeight += $itemWeight;
        }
        return $totalWeight;
    }

    public function getUPSServiceMapping()
    {
        return [
            '01' => [
                'description' => 'UPS Next Day Air®',
                'business_days_in_transit' => 1
            ],
            '02' => [
                'description' => 'UPS 2nd Day Air®',
                'business_days_in_transit' => 2
            ],
            '03' => [
                'description' => 'UPS Ground',
                'business_days_in_transit' => '1-5'
            ],
            '07' => [
                'description' => 'UPS Worldwide Express®',
                'business_days_in_transit' => '1-3'
            ],
            '08' => [
                'description' => 'UPS Worldwide Expedited®',
                'business_days_in_transit' => '2-5'
            ],
            '11' => [
                'description' => 'UPS Standard®',
                'business_days_in_transit' => 'Varies by destination'
            ],
            '12' => [
                'description' => 'UPS 3 Day Select®',
                'business_days_in_transit' => 3
            ],
            '13' => [
                'description' => 'UPS Next Day Air Saver®',
                'business_days_in_transit' => 1
            ],
            '14' => [
                'description' => 'UPS Next Day Air®',
                'business_days_in_transit' => 1
            ],
            '54' => [
                'description' => 'UPS Worldwide Express Plus®',
                'business_days_in_transit' => '1-3'
            ],
            '59' => [
                'description' => 'UPS 2nd Day Air A.M.®',
                'business_days_in_transit' => 2
            ],
            '65' => [
                'description' => 'UPS Saver®',
                'business_days_in_transit' => '1-3'
            ],
            '93' => [
                'description' => 'UPS SurePost®',
                'business_days_in_transit' => '2-7'
            ],
            '94' => [
                'description' => 'UPS SurePost®',
                'business_days_in_transit' => '2-7'
            ],
            'M4' => [
                'description' => 'UPS Mail Innovations®',
                'business_days_in_transit' => '4-7'
            ],
            'M5' => [
                'description' => 'UPS Mail Innovations®',
                'business_days_in_transit' => '7-14'
            ],
            'D2' => [
                'description' => 'UPS Worldwide Economy',
                'business_days_in_transit' => '5-10'
            ]
        ];
    }
}

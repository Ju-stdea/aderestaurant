@include('components.header')
@include('components.nav')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Loading spinner animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .spinner-border {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        vertical-align: text-bottom;
        border: 0.2em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        animation: spin 0.75s linear infinite;
    }

    /* Disabled button state */
    .btn:disabled {
        opacity: 0.65;
        cursor: not-allowed;
    }

    /* Shipping method cards */
    .shipping-method-card {
        transition: all 0.3s ease;
    }

    .shipping-method-card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    #addressSuggestions {
        display: none;
        max-height: 200px;
        overflow-y: auto;
        cursor: pointer;
    }

    #addressSuggestions li:hover {
        background-color: #f1f1f1;
    }

    .input-error {
        border: 1px solid red !important;
    }
</style>
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Shipping details</h1>
                <form action="#">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" name="firstname" id="firstname" value="{{ auth()->check() ? auth()->user()->first_name : '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" name="lastname" type="text" id="lastname" value="{{ auth()->check() ? auth()->user()->last_name : '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" name="phone" id="phone" value="{{ auth()->check() ? auth()->user()->mobile : '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" class="form-control" id="toAddress" value="{{ $deliveryAddress->address_line ?? '' }}" placeholder="House Number Street Name">
                                <ul id="addressSuggestions" class="list-group position-absolute w-80" style="z-index: 1000;"></ul>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" id="toCity" name="citySelect" value="{{ $deliveryAddress->city ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">State<sup>*</sup></label>
                                <input type="text" id="toState" name="toState" value="{{ $deliveryAddress->state ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" name="country" value="{{ $deliveryAddress->country ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" name="postal" id="postal" value="{{ $deliveryAddress->zipcode ?? '' }}" class="form-control">
                            </div>
                            @guest
                            <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="create-account" name="create-account">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div>
                            @endguest
                            <hr>
                            <div class="form-check my-3">
                                <input class="form-check-input" id="isBilling" type="checkbox" checked
                                                onclick="toggleBillingAddress()">
                                <label class="form-check-label" for="Address-1">Use shipping address as billing address</label>
                            </div>


                            <div id="shipping-method" >
                                <div class="container mt-4">
                                    <h6 class="font-bold" style="font-size: 1.4rem">Shipping method</h6>
                                    
                                    <button id="calculateShippingBtn" class="btn btn-primary mb-3">
                                        Calculate Shipping
                                    </button>

                                    <div id="noShippingMethods" class="border rounded p-3 bg-light text-danger" 
                                         style="font-size: 1.2rem;">
                                        Enter your valid shipping address to view available shipping methods.
                                    </div>
                                </div>

                                <div class="text-center" id="loadingIndicator" style="display: none;">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading rates...</span>
                                    </div>
                                    <p class="mt-2">Calculating shipping options...</p>
                                </div>

                                <div class="container my-4">
                                    <div id="shippingMethodsContainer"></div>
                                </div>
                            </div>

                            <!-----Billing address--->
                            <div id="billingForm" class="my-5" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" name="billingFirstname" id="billingFirstname" value="{{ auth()->check() ? auth()->user()->first_name : '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" name="billingLastname" id="billingLastname" value="{{ auth()->check() ? auth()->user()->last_name : '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup> <span style="color: red; font-weight: 500; display: block; margin-bottom: 6px;">
                                    Before entering your address, please check it on Google Maps to be sure it's correct. Then copy and paste it here.
                                </span></label>
                                <input name="billingAddress" type="text" id="billingAddressInput" class="form-control" value="{{ $deliveryAddress->address_line ?? '' }}"  placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" id="billingCitySelect" name="billingCitySelect" value="{{ $deliveryAddress->city ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" id="billingCountrySelect" name="billingCountrySelect" value="{{ $deliveryAddress->country ?? '' }}" class="form-control">
                            </div> 
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input name="billingPostal" type="number" id="billingPostal" value="{{ $deliveryAddress->zipcode ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input name="billingPhone" type="text" id="billingPhone" value="{{ auth()->check() ? auth()->user()->mobile : '' }}" class="form-control">
                            </div>
                            </div>

                            <div class="form-item">
                                <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Oreder Notes (Optional)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <!-- <th scope="col">Price</th> -->
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{ $item['image_url'] }}" alt="{{ $item['product_name'] }}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{ $item['product_name'] }}</td>
                                            <!-- <td class="py-5">₦69.00</td> -->
                                            <td class="py-5">{{ $item['quantity'] }}</td>
                                            <td class="py-5">₦{{ number_format($item['total'], 2) }}</td>
                                        </tr>
                                        @endforeach
                                        <!-- Shipping row -->
                                        <tr>
                                            <th scope="row"></th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">Shipping:</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">
                                                        <span id="selected-shipping-fee">₦0</span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Total row -->
                                        <tr>
                                            <th scope="row"></th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL:</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">
                                                        ₦<span id="total-amount">{{ number_format($subTotal) }}</span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="Delivery" value="Delivery">
                                        <label class="form-check-label" for="Delivery-1">Pick up in store</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12" id="paystackCheckout">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Paystack-1" name="Paystack" value="Paystack">
                                        <label class="form-check-label" for="Paystack-1">Pay with Paystack</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" id="continueButton">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->



<div id="toast-container" aria-live="polite" aria-atomic="true">
    <div id="toast" class="toast" style="font-weight: bolder;"></div>
</div>

<script>
 window.cartItems = {!! json_encode($cart) !!};

let debounceTimer;

function highlightIfEmpty(selector) {
    const input = $(selector);
    if (!input.val().trim()) {
        input.addClass('input-error');
        return true;
    } else {
        input.removeClass('input-error');
        return false;
    }
}

// Make address details readonly
$(document).ready(function () {
    $('#toCity').prop('readonly', true);
    $('#toState').prop('readonly', true);
    $('input[name="country"]').prop('readonly', true);
    $('#postal').prop('readonly', true);
});

$('#toAddress').on('input', function () {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        const address = $('#toAddress').val().trim();
        const firstname = $('#firstname').val().trim();
        const lastname = $('#lastname').val().trim();
        const phone = $('#phone').val().trim();
        const email = $('input[name="email"]').val().trim();

        const hasError = [
            highlightIfEmpty('#firstname'),
            highlightIfEmpty('#lastname'),
            highlightIfEmpty('#phone'),
            highlightIfEmpty('input[name="email"]'),
            highlightIfEmpty('#toAddress')
        ].includes(true);

        if (hasError) {
            $('#addressSuggestions').hide().empty();
            return;
        }

        if (address.length > 4) {
            // Show loading message
            $('#addressSuggestions').empty().show().append(`
                <li class="list-group-item text-muted">Validating address...</li>
            `);

            $.ajax({
                url: '/validate-address',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: firstname + ' ' + lastname,
                    email: email,
                    phone: phone,
                    address: address
                },
                success: function (response) {
                    const data = response.data;

                    $('#addressSuggestions').empty().show().append(`
                        <li class="list-group-item suggestion-item" data-address='${JSON.stringify(data)}'>
                            ${data.formatted_address}
                        </li>
                    `);
                },
                error: function (xhr) {
                    let message = "We couldn’t validate your address. Please use Google Maps to confirm it, then copy and paste it here.";

                    $('#addressSuggestions').empty().show().append(`
                        <span class="text-danger fw-bold d-block px-2 py-1">${message}</span>
                    `);
                }
            });
        } else {
            $('#addressSuggestions').hide().empty();
        }
    }, 500);
});

// Fill form fields when suggestion is selected
$(document).on('click', '.suggestion-item', function () {
    const data = $(this).data('address');

    $('#toAddress').val(data.formatted_address);
    $('#toCity').val(data.city);
    $('#toState').val(data.state);
    $('input[name="country"]').val(data.country);
    $('#postal').val(data.address_code);

    $('#addressSuggestions').hide().empty();
});
</script>

<script>
 window.cartItems = @json(array_values($cart));
document.addEventListener('DOMContentLoaded', function () {
    const calculateShippingBtn = document.getElementById('calculateShippingBtn');
    const toStateInput = document.getElementById('toState');
    const toCityInput = document.getElementById('toCity');
    const toAddressInput = document.getElementById('toAddress');
    const postalInput = document.getElementById('postal');
    const shippingMethodSection = document.getElementById('shipping-method');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const shippingMethodsContainer = document.getElementById('shippingMethodsContainer');

  
    const originalSubTotal = {{ $subTotal }};

    calculateShippingBtn.addEventListener('click', async function () {
        const toState = toStateInput.value.trim();
        const toCity = toCityInput.value.trim();
        const toAddress = toAddressInput.value.trim();
        const postal = postalInput.value.trim();

        if (!toState || !toCity || !toAddress || !postal) {
            showError('Please fill in all fields (state, city, address, and postal code)');
            return;
        }

        startLoading();

        try {
            const response = await fetch('/calculate-shipping', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    receiver: {
                        state: toState,
                        city: toCity,
                        address: toAddress,
                        postal: postal
                    },
                    items: getCartItemsWithDimensions()
                })
            });

            const data = await response.json();

            console.log('Backend response:', data);

            if (!response.ok) throw new Error(data.message || 'Failed to calculate shipping');
            if (!data.data.couriers || data.data.couriers.length === 0) {
                showNoMethodsAvailable();
                return;
            }

            displayShippingMethods(data.data.couriers);
        } catch (error) {
            showError(error.message);
        } finally {
            stopLoading();
        }
    });

    function startLoading() {
        loadingIndicator.style.display = 'block';
        shippingMethodsContainer.innerHTML = '';
        calculateShippingBtn.disabled = true;
        calculateShippingBtn.innerHTML = 'Calculating...';
    }

    function stopLoading() {
        loadingIndicator.style.display = 'none';
        calculateShippingBtn.disabled = false;
        calculateShippingBtn.innerHTML = 'Calculate Shipping';
    }

    function showError(message) {
        shippingMethodsContainer.innerHTML = `
            <div class="alert alert-danger mt-3">${message}</div>
        `;
    }

    function showNoMethodsAvailable() {
        shippingMethodsContainer.innerHTML = `
            <div class="alert alert-warning mt-3">No shipping methods available for this address</div>
        `;
    }

    function displayShippingMethods(couriers) {
        let html = '<h5 class="mt-3">Available Shipping Methods:</h5>';
        couriers.forEach((courier, index) => {
            html += `
            <div class="card mb-3 shipping-option" style="border: 2px solid #ccc; border-radius: 12px; transition: border-color 0.3s; cursor: pointer;">
              <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div class="form-check" style="flex-grow: 1;">
                  <input class="form-check-input shipping-radio" type="radio" name="shippingMethod"
                    value="${courier.courier_id}" data-total="${courier.total}" id="ship-${index}" ${index === 0 ? 'checked' : ''}>
                  <label class="form-check-label" for="ship-${index}" style="cursor: pointer;">
                    <strong>${courier.courier_name}</strong><br>
                    <span>₦${Number(courier.total).toLocaleString()}</span><br>
                    <small>Delivery ETA: ${courier.delivery_eta}</small><br>
                    <small>Pickup ETA: ${courier.pickup_eta}</small><br>
                    <small style="color: red;">Discount: ${courier.discount.discounted}${courier.discount.symbol}</small>
                  </label>
                </div>
                <div class="text-center mt-3 mt-md-0">
                  <img src="${courier.courier_image}" alt="${courier.courier_name}" width="80" style="border-radius: 6px;">
                </div>
              </div>
            </div>

            `;
        });
        shippingMethodsContainer.innerHTML = html;

        
        updateTotalWithShipping();
        document.querySelectorAll('.shipping-radio').forEach(input => {
            input.addEventListener('change', updateTotalWithShipping);
        });
    }

  
    function updateTotalWithShipping() {
        const selected = document.querySelector('.shipping-radio:checked');
        const shippingFee = selected ? parseFloat(selected.dataset.total) : 0;

      
        const shippingDisplay = document.getElementById('selected-shipping-fee');
        if (shippingDisplay) {
            shippingDisplay.textContent = `₦${shippingFee.toLocaleString()}`;
        }

       
        const totalDisplay = document.getElementById('total-amount');
        if (totalDisplay) {
            const newTotal = originalSubTotal + shippingFee;
            totalDisplay.textContent = newTotal.toLocaleString();
        }
    }

    function getCartItemsWithDimensions() {
        const items = Array.isArray(window.cartItems) ? window.cartItems : [];

        const result = items.map(item => {
            const name = item.product_name;
            const amount = item.product_price;

            if (!name || amount === undefined || amount === null) {
                console.warn("Invalid cart item:", item);
                return null;
            }

            return {
                name,
                description: item.description || 'No description',
                unit_weight: String(item.unit_weight || '1.0'), // cast to string
                unit_amount: String(amount), // cast to string
                quantity: parseInt(item.quantity || 1),
                dimension: {
                    length: parseInt(item.length || 10),
                    width: parseInt(item.width || 10),
                    height: parseInt(item.height || 10)
                }
            };
        }).filter(item => item !== null);

        console.log("Validated Cart Items:", result);
        return result;
    }
});

document.querySelectorAll('.shipping-option').forEach(option => {
  option.addEventListener('click', function (e) {
    // Prevent double triggering if clicking the radio directly
    const radio = this.querySelector('.shipping-radio');

    // Set this radio to checked
    radio.checked = true;

    // Remove green border from all
    document.querySelectorAll('.shipping-option').forEach(opt => {
      opt.style.borderColor = '#ccc';
      opt.querySelector('.form-check-input').style.accentColor = '';
    });

    // Add green border to selected
    this.style.borderColor = 'green';
    radio.style.accentColor = 'green';
  });
});

// On page load, highlight already checked one
document.querySelectorAll('.shipping-option').forEach(option => {
  const radio = option.querySelector('.shipping-radio');
  if (radio.checked) {
    option.style.borderColor = 'green';
    radio.style.accentColor = 'green';
  }
});
</script>


@include('components.footer')
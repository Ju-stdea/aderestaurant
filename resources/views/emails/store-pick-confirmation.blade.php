<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Add Google Fonts link for Jost -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Basic Styles */
        body,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Jost', sans-serif !important;
            /* Apply Jost font */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px 0;
        }

        .header img {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .summary,
        .shipping-address {
            width: 48%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .summary {
            margin-right: 2%;
        }

        .shipping-address {
            margin-left: 2%;
        }

        .section-wrapper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 18px;
            color: #333;
            border-bottom: 2px solid #2D3748;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .address-details p,
        .summary p {
            margin: 5px 0;
            font-size: 14px;
        }

        .order-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto;
        }

        .order-details th,
        .order-details td {
            text-align: left;
            padding: 10px 5px;
            border-bottom: 1px solid #ddd;
        }

        .order-details img {
            max-width: 50px;
            height: auto;
        }

        .order-total {
            text-align: right;
            margin-top: 20px;
        }

        .call-us {
            background-color: #2D3748;
            color: #fff !important;
            text-align: center;
            padding: 10px;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 10px;
            }

            .summary,
            .shipping-address {
                display: block;
                width: 100%;
                margin: 0 0 10px;
            }

            .section-wrapper {
                flex-direction: column;
            }

            .order-details {
                display: block;
                overflow-x: auto;
                /* Allow horizontal scrolling */
            }

            .order-details th,
            .order-details td {
                display: table-cell;
                padding: 8px;
                white-space: nowrap;
            }

            .order-total {
                text-align: left;
            }
        }

        @media screen and (max-width: 400px) {
            .header h1 {
                font-size: 24px;
            }

            .call-us {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <!-- Add your logo here -->
            <img src="https://res.cloudinary.com/dww7q9k1e/image/upload/v1743808910/logo_i0rcjv.jpg" style="height: 130px; border-radius: 50%;" alt="Amras logo">
            <h1>Thanks for your order</h1>
            <p>You'll receive an email when your items are shipped. If you have any questions, call anytime at
                {{ $companyPhone }} or reply to this email.
            </p>
            <a href="{{ $storeLocation }}" class="call-us">See store location on map</a>
        </div>

        <div class="section-wrapper">
            <!-- Order Summary Section -->
            <div class="summary">
                <h4>Order Summary</h4>
                <p><strong>Order No:</strong> #{{ $orderNumber }}</p>
                <p><strong>Order Date:</strong> {{ $orderDate }}</p>
                <p><strong>Order Total:</strong> ${{ $orderTotal }}</p>
            </div>

            <!-- Shipping Address Section -->
            <div class="shipping-address">
                <h4>Billing Information</h4>
                <div class="address-details">
                    <p><strong>{{ $customerName }}</strong></p>
                    <p>{{ $billingAddress->address }}</p>
                    <p>{{ $billingAddress->city }}, {{ $billingAddress->state }} {{ $billingAddress->postal_code }}
                    </p>
                    <p>{{ $billingAddress->country }}</p>
                    <p><strong>Phone:</strong> {{ $billingAddress->phone }}</p>
                </div>
            </div>
        </div>

        <!-- Order Details Table -->
        <table class="order-details">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Products</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        <td><img src="{{ $item['product_image'] }}" alt="Product Image"></td>
                        <td>{{ $item['product_name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>${{ $item['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Order Total Summary -->
        <div class="order-total">
            <table width="100%">
                <tbody>
                    <tr>
                        <td>Subtotal:</td>
                        <td>${{ $subtotal }}</td>
                    </tr>
                    <tr>
                        <td><strong>Order Total:</strong></td>
                        <td><strong>${{ $orderTotal }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <a href="tel:{{ $companyPhone }}" class="call-us">Call us at {{ $companyPhone }} or reply to this email</a>

        <div class="footer">
            <p>This email was sent by {{ $companyName }} | {{ $companyAddress }}</p>
            <p>&copy; {{ date('Y') }} {{ $companyName }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
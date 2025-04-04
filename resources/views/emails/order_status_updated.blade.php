<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Updated</title>
    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px;
        }

        .header img {
            max-width: 150px;
            height: auto;
        }

        .content {
            padding: 20px;
            color: #333;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            line-height: 1.6;
            font-size: 16px;
            margin: 10px 0;
        }

        .order-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f1f1;
            font-size: 12px;
            color: #777;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .email-container {
                width: 100%;
                box-shadow: none;
            }

            h1 {
                font-size: 22px;
            }

            p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="https://res.cloudinary.com/doeoa6jzb/image/upload/v1728430577/logo_otetxx.png" alt="Amras logo">
        </div>

        <div class="content">
            <h1>Your Order Status has been Updated</h1>
            <p>Dear Valued Customer,</p>
            <p>We are writing to inform you that the status of your order with ID <strong>{{ $order->order_code }}</strong> has been updated to: <strong>{{ $order->order_status }}</strong>.</p>
            <p>We appreciate your business and are committed to providing you with the best service possible.</p>
            <p>If you have any questions or need further assistance, please don't hesitate to reach out to us.</p>

            <div class="order-details">
                <p>Thank you for choosing Jhabis Food Mart!</p>
            </div>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Jhabis Food Mart. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

@include('components.header')
@include('components.nav')


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Returns and Refund</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Returns and Refunds </li>
            </ol>
        </div>
        <!-- Single Page Header End -->


    <!-- Returns and Refund Policy Start -->
    <div class="container-fluid py-5">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <i class="bi bi-arrow-counterclockwise display-1 text-success"></i>
                    <h1 class="mb-4">Returns and Refund Policy</h1>
                    <p class="mb-4">
                        At <strong>Jhabis Food Mart</strong>, we are committed to ensuring customer satisfaction. If you are not entirely satisfied with your purchase, we’re here to help. Please review our return and refund policy carefully before making a request.
                    </p>

                    <h4 class="mb-3 mt-4">1. Eligibility for Returns</h4>
                    <p class="mb-4">
                        Due to the perishable nature of many of our products, we only accept returns under the following conditions:
                        <ul class="text-start d-inline-block">
                            <li>The item was delivered damaged or expired</li>
                            <li>You received the wrong item</li>
                            <li>The item is unopened and in its original packaging</li>
                            <li>You report the issue within <strong>24 hours</strong> of receiving your order</li>
                        </ul>
                    </p>

                    <h4 class="mb-3 mt-4">2. Non-Returnable Items</h4>
                    <p class="mb-4">
                        The following items are not eligible for return:
                        <ul class="text-start d-inline-block">
                            <li>Fresh produce that has been opened or used</li>
                            <li>Items not in their original condition or packaging</li>
                            <li>Items returned after the 24-hour window</li>
                        </ul>
                    </p>

                    <h4 class="mb-3 mt-4">3. Refund Process</h4>
                    <p class="mb-4">
                        Once we receive and inspect your returned item, we will notify you of the approval or rejection of your refund. If approved, your refund will be processed within 3–7 business days and returned via your original payment method.
                    </p>

                    <h4 class="mb-3 mt-4">4. How to Request a Return</h4>
                    <p class="mb-4">
                        To request a return or refund, please follow these steps:
                        <ul class="text-start d-inline-block">
                            <li>Send an email to <strong>support@jhabisfoodmart.com</strong> within 24 hours of receiving your item</li>
                            <li>Include your order number, a description of the issue, and clear photo evidence</li>
                            <li>Wait for our customer support team to respond with return instructions</li>
                        </ul>
                    </p>

                    <h4 class="mb-3 mt-4">5. Delivery Issues</h4>
                    <p class="mb-4">
                        If your order is delayed or never arrives, please contact us immediately. We will investigate the issue and either re-deliver the item or issue a refund, depending on the outcome.
                    </p>

                    <h4 class="mb-3 mt-4">6. Exchange Policy</h4>
                    <p class="mb-4">
                        We only replace items if they are defective, damaged, or incorrect. If you need to exchange an item, please follow the same return request procedure.
                    </p>

                    <h4 class="mb-3 mt-4">7. Contact Us</h4>
                    <p class="mb-4">
                        For further assistance with returns and refunds, please contact our support team: <br>
                        <strong>Email:</strong> support@jhabisfoodmart.com <br>
                        <strong>Phone:</strong> +234 706 365 6998
                    </p>

                    <a class="btn border-success rounded-pill py-3 px-5" href="{{ url('/products') }}">Back to Shopping</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Returns and Refund Policy End -->



@include('components.footer')
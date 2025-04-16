@include('components.header')
@include('components.nav')


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">FAQ</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Faq</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


<!-- FAQ Start -->
<div class="container-fluid py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <i class="bi bi-question-circle-fill display-1 text-success"></i>
                <h1 class="mb-4">Frequently Asked Questions</h1>

                <h4 class="mb-3 mt-4">1. What is Jhabis Food Mart?</h4>
                <p class="mb-4">
                    Jhabis Food Mart is an online store dedicated to providing fresh, organic, and naturally sourced food products. We bring healthy choices right to your doorstep or let you pick them up from our physical store.
                </p>

                <h4 class="mb-3 mt-4">2. How can I place an order?</h4>
                <p class="mb-4">
                    Simply browse our products, add your preferred items to your cart, and proceed to checkout. You can choose delivery to your address or select the "Pick Up from Store" option at checkout.
                </p>

                <h4 class="mb-3 mt-4">3. What payment methods are available?</h4>
                <p class="mb-4">
                    We use <strong>Monnify</strong> as our secure payment gateway. You can pay using your debit card, bank transfer, or other supported payment channels during checkout.
                </p>

                <h4 class="mb-3 mt-4">4. How does the "Pick Up from Store" option work?</h4>
                <p class="mb-4">
                    During checkout, you can choose "Pick Up from Store" instead of delivery. Once your order is ready, you’ll receive a notification via email or SMS. Just come to our store with your order number to collect your items.
                </p>

                <h4 class="mb-3 mt-4">5. How long does delivery take?</h4>
                <p class="mb-4">
                    We strive to deliver orders within 24–48 hours, depending on your location. Delivery times will be confirmed during checkout.
                </p>

                <h4 class="mb-3 mt-4">6. Can I return an item?</h4>
                <p class="mb-4">
                    Yes, returns are accepted under specific conditions. Please visit our <a href="{{ url('/returns-and-refund') }}">Returns and Refund Policy</a> page for full details.
                </p>

                <h4 class="mb-3 mt-4">7. How do I contact customer service?</h4>
                <p class="mb-4">
                    You can reach our support team at: <br>
                    <strong>Email:</strong> support@jhabisfoodmart.com <br>
                    <strong>Phone:</strong> +234 706 365 6998
                </p>

                <a class="btn border-success rounded-pill py-3 px-5" href="{{ url('/products') }}">Browse Our Store</a>
            </div>
        </div>
    </div>
</div>
<!-- FAQ End -->



@include('components.footer')
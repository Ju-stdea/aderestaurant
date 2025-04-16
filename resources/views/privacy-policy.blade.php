@include('components.header')
@include('components.nav')


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Privacy Policy</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Privacy Policy </li>
            </ol>
        </div>
        <!-- Single Page Header End -->


 <!-- Privacy Policy Start -->
<div class="container-fluid py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <i class="bi bi-shield-lock-fill display-1 text-success"></i>
                <h1 class="mb-4">Privacy Policy</h1>
                <p class="mb-4">
                    At <strong>Jhabis Food Mart</strong>, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you use our website and services.
                </p>

                <h4 class="mb-3 mt-4">1. Information We Collect</h4>
                <p class="mb-4">
                    We collect the following types of information:
                    <ul class="text-start d-inline-block">
                        <li><strong>Personal Information:</strong> such as your name, email address, phone number, and delivery address when you register, place an order, or contact us.</li>
                        <li><strong>Payment Information:</strong> we may collect transaction details but we do not store your card or banking information. Payments are securely processed through trusted third-party gateways.</li>
                        <li><strong>Usage Data:</strong> information about your interactions with our website including pages visited, time spent, and browser type.</li>
                    </ul>
                </p>

                <h4 class="mb-3 mt-4">2. How We Use Your Information</h4>
                <p class="mb-4">
                    We use the information we collect to:
                    <ul class="text-start d-inline-block">
                        <li>Process and deliver your orders</li>
                        <li>Send order updates and customer service messages</li>
                        <li>Improve our website and personalize your experience</li>
                        <li>Send newsletters or promotional content if you opt-in</li>
                        <li>Comply with legal obligations</li>
                    </ul>
                </p>

                <h4 class="mb-3 mt-4">3. How We Protect Your Data</h4>
                <p class="mb-4">
                    We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, disclosure, alteration, or destruction. This includes secure server connections (SSL), encryption, and limited access to your information.
                </p>

                <h4 class="mb-3 mt-4">4. Sharing of Information</h4>
                <p class="mb-4">
                    We do not sell or rent your personal data. However, we may share your information with:
                    <ul class="text-start d-inline-block">
                        <li>Trusted third-party partners involved in order fulfillment and payment processing</li>
                        <li>Law enforcement or regulatory authorities if required by law</li>
                    </ul>
                </p>

                <h4 class="mb-3 mt-4">5. Your Rights</h4>
                <p class="mb-4">
                    You have the right to:
                    <ul class="text-start d-inline-block">
                        <li>Access and update your personal information</li>
                        <li>Request deletion of your account or data</li>
                        <li>Opt-out of marketing communications</li>
                    </ul>
                    To exercise any of these rights, please contact us via our support page.
                </p>

                <h4 class="mb-3 mt-4">6. Cookies</h4>
                <p class="mb-4">
                    We use cookies to enhance your shopping experience. Cookies help us remember your preferences and analyze site usage. You can control cookie preferences in your browser settings.
                </p>

                <h4 class="mb-3 mt-4">7. Changes to This Policy</h4>
                <p class="mb-4">
                    We may update this Privacy Policy from time to time. Any changes will be posted on this page, and if significant, we will notify you via email or our homepage.
                </p>

                <h4 class="mb-3 mt-4">8. Contact Us</h4>
                <p class="mb-4">
                    If you have any questions or concerns about our Privacy Policy or how we handle your data, please contact us at: <br>
                    <strong>Email:</strong> support@jhabisfoodmart.com <br>
                    <strong>Phone:</strong> +234 706 365 6998
                </p>

                <a class="btn border-success rounded-pill py-3 px-5" href="{{ url('/products') }}">Start Shopping</a>
            </div>
        </div>
    </div>
</div>
<!-- Privacy Policy End -->

@include('components.footer')
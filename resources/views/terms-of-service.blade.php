@include('components.header')
@include('components.nav')


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Terms of Service</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Terms of Service</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


    <!-- Terms of Use Start -->
    <div class="container-fluid py-5">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <i class="bi bi-file-earmark-text-fill display-1 text-success"></i>
                    <h1 class="mb-4">Terms of Use</h1>
                    <p class="mb-4">
                        Welcome to <strong>Jhabis Food Mart</strong>. These Terms of Use ("Terms") govern your access to and use of our website and services. By using our platform, you agree to comply with and be bound by these Terms. If you do not agree with any part of these Terms, please do not use our website.
                    </p>

                    <h4 class="mb-3 mt-4">1. Use of Our Website</h4>
                    <p class="mb-4">
                        You must be at least 18 years old or have the permission of a guardian to use our website. You agree to use our services only for lawful purposes and in a way that does not infringe on the rights of others.
                    </p>

                    <h4 class="mb-3 mt-4">2. Account Registration</h4>
                    <p class="mb-4">
                        To place orders, you may need to create an account. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You agree to provide accurate and complete information during registration.
                    </p>

                    <h4 class="mb-3 mt-4">3. Orders and Payments</h4>
                    <p class="mb-4">
                        All orders placed through our platform are subject to availability and confirmation. Prices listed are in Nigerian Naira (₦) and are subject to change without notice. Payments are processed securely via trusted third-party gateways.
                    </p>

                    <h4 class="mb-3 mt-4">4. Shipping and Delivery</h4>
                    <p class="mb-4">
                        We aim to deliver your orders on time, but delays may occur due to factors beyond our control. Delivery timelines and charges will be clearly communicated during checkout.
                    </p>

                    <h4 class="mb-3 mt-4">5. Returns and Refunds</h4>
                    <p class="mb-4">
                        We accept returns only for eligible items as stated in our <a href="{{ url('/returns-and-refund') }}">Refund Policy</a>. All requests must be made within a specified period from the delivery date. Refunds will be processed to your original payment method after the return is approved.
                    </p>

                    <h4 class="mb-3 mt-4">6. Intellectual Property</h4>
                    <p class="mb-4">
                        All content on this website, including text, images, logos, and graphics, is the property of Jhabis Food Mart and protected by applicable intellectual property laws. You may not use, reproduce, or distribute any content without our written permission.
                    </p>

                    <h4 class="mb-3 mt-4">7. Prohibited Activities</h4>
                    <p class="mb-4">
                        You agree not to:
                        <ul class="text-start d-inline-block">
                            <li>Use our site for any fraudulent or illegal activity</li>
                            <li>Attempt to gain unauthorized access to our systems</li>
                            <li>Misuse or abuse the services or products we offer</li>
                            <li>Upload harmful code, viruses, or disruptive technologies</li>
                        </ul>
                    </p>

                    <h4 class="mb-3 mt-4">8. Limitation of Liability</h4>
                    <p class="mb-4">
                        Jhabis Food Mart shall not be liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use our website or services, including but not limited to loss of data or profits.
                    </p>

                    <h4 class="mb-3 mt-4">9. Changes to the Terms</h4>
                    <p class="mb-4">
                        We reserve the right to update or modify these Terms at any time. Changes will be posted on this page, and your continued use of our services after such changes constitutes your acceptance of the new Terms.
                    </p>

                    <h4 class="mb-3 mt-4">10. Governing Law</h4>
                    <p class="mb-4">
                        These Terms are governed by the laws of the Federal Republic of Nigeria. Any disputes shall be resolved in accordance with Nigerian laws and courts.
                    </p>

                    <h4 class="mb-3 mt-4">11. Contact Us</h4>
                    <p class="mb-4">
                        For any questions regarding these Terms, please contact us at: <br>
                        <strong>Email:</strong> support@jhabisfoodmart.com <br>
                        <strong>Phone:</strong> +234 706 365 6998
                    </p>

                    <a class="btn border-success rounded-pill py-3 px-5" href="{{ url('/products') }}">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Terms of Use End -->


@include('components.footer')
@include('components.header')
@include('components.nav')


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">About Jhabis Food Mart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">About </li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- About Us Start -->
        <div class="container-fluid py-5">
            <div class="container py-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <i class="bi bi-basket-fill display-1 text-success" style="color: green;"></i>
                        <h1 class="mb-4">Welcome to Jhabis Food Mart</h1>
                        <p class="mb-4">
                            At <strong>Jhabis Food Mart</strong>, we’re passionate about providing you with the best in fresh, organic, and naturally sourced food products. As an e-commerce platform, we make it easy for you to shop for healthy and wholesome foods from the comfort of your home.
                        </p>
                        <p class="mb-4">
                            Our mission is to promote healthier living by connecting individuals and families with farm-fresh, organic goods straight from trusted sources. We believe that healthy eating starts with quality ingredients, and that's exactly what we deliver.
                        </p>
                        <p class="mb-4">
                            Whether you're restocking your pantry or trying something new, Jhabis Food Mart is your go-to destination for all things fresh and organic. Thank you for choosing us as your trusted food partner!
                        </p>
                        <a class="btn border-success rounded-pill py-3 px-5" href="{{ url('/products') }}">Start Shopping</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us End -->

@include('components.footer')
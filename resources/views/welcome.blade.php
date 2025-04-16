@include('components.header')
@include('components.nav')
<?php 
  use App\Models\Product;
?>
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                        <h1 class="mb-5 display-3 text-primary">Trusted, Preferred, Quality, Enriching</h1>
                        <form action="{{ route('search') }}" method="GET">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" name="search" placeholder="Search Something Healthy">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Search</button>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="img/p-1.jpeg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Nigerian and African cuisine</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/p-3.jpeg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over ₦10,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Organic Products</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <!-- All Products Tab -->
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>

                            <!-- Loop through categories -->
                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ Str::slug($category->category_name) }}">
                                        <span class="text-dark" style="width: 130px;">{{ $category->category_name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Tab content -->
                <div class="tab-content">

                    <!-- All Products Tab -->
                    <div id="tab-all" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <a href="{{ url('products/details/' . $product->id) }}">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{ $product->image_url }}" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                            {{ $product->category->category_name }}
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{ $product->name }}</h4>
                                            <p>{{ $product->description }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">₦
                                                 <?php $discounted_price= Product::getDiscountedPrice($product->id); ?>
                               
                                                    @if($discounted_price > 0)
                                                        {{ $discounted_price }}
                                                    @else
                                                        {{ $product->product_price }}
                                                    @endif
                                                 / {{ $product->product_weight }}kg</p>
                                                   <form id="cart-form" action="{{ route('add-to-shopping-cart') }}" method="GET">
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" id="number_qaun" class="number_qaun" name="quantity" min="1" value="1">
                                                <button href="#" class="btn border border-secondary rounded-pill px-3 text-primary product-btn" data-product-id="{{ $product->id }}">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                </button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Category Tabs -->
                    @foreach($categories as $category)
                        <div id="tab-{{ Str::slug($category->category_name) }}" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach($products->where('category_id', $category->id) as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <a href="{{ url('products/details/' . $product->id) }}">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ $product->image_url }}" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                                {{ $category->category_name }}
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ $product->description }}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">₦
                                                    <?php $discounted_price= Product::getDiscountedPrice($product->id); ?>
                               
                                                    @if($discounted_price > 0)
                                                        {{ $discounted_price }}
                                                    @else
                                                        {{ $product->product_price }}
                                                    @endif
                                                     / {{ $product->product_weight }}kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="img/p-2-removebg-preview.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Fresh Vegitables</h5>
                                        <h3 class="mb-0">20% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/pepper.jpeg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Fresh Flower Pepper</h5>
                                        <h3 class="mb-0">Free delivery</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="img/palm.jpeg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h5 class="text-white">Clean and Healthy Palm Oil</h5>
                                        <h3 class="mb-0">₦10,000</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <h1 class="mb-0">Fresh Organic Vegetables</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach($products as $product)
                    @if(strtolower($product->category->category_name) === 'vegetables')
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <a href="{{ url('products/details/' . $product->id) }}">
                            <div class="vesitable-img">
                                <img src="{{ $product->image_url }}" class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
                                {{ $product->category->category_name }}
                            </div>
                            <div class="p-4 rounded-bottom">
                                <h4>{{ $product->name }}</h4>
                                <p>{{ $product->description }}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">₦
                                        <?php $discounted_price = Product::getDiscountedPrice($product->id); ?>
                                        @if($discounted_price > 0)
                                            {{ $discounted_price }}
                                        @else
                                            {{ $product->product_price }}
                                        @endif
                                        / {{ $product->product_weight }}kg
                                    </p>
                                     <form id="cart-form" action="{{ route('add-to-shopping-cart') }}" method="GET">
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" id="number_qaun" class="number_qaun" name="quantity" min="1" value="1">
                                                <button class="btn border border-secondary rounded-pill px-3 text-primary product-btn" data-product-id="{{ $product->id }}">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>
                                </form>
                                </div>
                            </div>
                          </a>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Fresh Onion Powder</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">Our Fresh Onion Powder is always free from additives, artificial flavors, or anything that compromises its natural taste and quality.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/p-1-bgless.png" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">₦10k</span>
                                    <span class="h4 text-muted mb-0">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Top Selling Products</h1>
                    <!-- <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p> -->
                </div>
                <div class="row g-4">
                 @foreach($topsellings as $topselling)
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <a href="{{ url('products/details/' . $topselling->id) }}">
                        <div class="text-center">
                            <img src="{{ $topselling->image_url }}" class="img-fluid rounded" alt="">
                            <div class="py-2">
                                <a href="#" class="h5">{{ $topselling->product_name }}</a>
                                <?php $get_reviews = Product::getReviews($product->id); ?>
                                <div class="d-flex my-3 justify-content-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-1">
                                            <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" 
                                                fill="{{ $i <= round($get_reviews) ? '#FFA800' : '#E0E0E0' }}" />
                                        </svg>
                                    @endfor
                                </div>
                                <h4 class="mb-3">₦
                                       <?php $discounted_price = Product::getDiscountedPrice($topselling->id); ?>
                                        @if($discounted_price > 0)
                                            {{ $discounted_price }}
                                        @else
                                            {{ $topselling->product_price }}
                                        @endif</h4>
                                 <form id="cart-form" action="{{ route('add-to-shopping-cart') }}" method="GET">
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" id="number_qaun" class="number_qaun" name="quantity" min="1" value="1">
                                                <button class="btn border border-secondary rounded-pill px-3 text-primary product-btn" data-product-id="{{ $product->id }}">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>
                                </form>
                               </div>
                        </div>
                    </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>satisfied customers</h4>
                                <h1>1963</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality of service</h4>
                                <h1>99%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality certificates</h4>
                                <h1>2</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>Available Products</h4>
                                <h1>20</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->


<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h4 class="text-primary">What Our Customers Say</h4>
            <h1 class="display-5 mb-5 text-dark">Trusted by Nigerians, Loved for Quality!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            "I love the freshness of their organic food! Every product I ordered was top quality and delivered on time."
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="img/faith.jpeg" class="img-fluid rounded" style="height: 150px;" alt="Client Image">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Faith.</h4>
                            <p class="m-0 pb-3">Kebbi, Nigeria</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            "Finally, a reliable platform for organic food in Nigeria! The taste and quality are simply unmatched."
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="img/e.jpeg" class="img-fluid rounded" style="height: 150px;" alt="Client Image">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Emmanuel A.</h4>
                            <p class="m-0 pb-3">Kebbi, Nigeria</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            "Healthy living starts with good food. Their organic products have changed the way my family eats!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="https://source.unsplash.com/100x100/?african,food" class="img-fluid rounded" alt="Image">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Zainab M.</h4>
                            <p class="m-0 pb-3">Kano, Nigeria</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

        <!-- Tastimonial End -->

<div id="toast-container" aria-live="polite" aria-atomic="true">
    <div id="toast" class="toast" style="font-weight: bolder;"></div>
</div>


@include('components.footer')
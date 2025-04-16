@include('components.header')
@include('components.nav')

       <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Dashboard</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Dashboard</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Dashboard Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <p class="paragraph">Hello, {{ Auth::user()->first_name }}</p>
                                <h5 class="heading">Welcome to your Profile </h5>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded flex flex-col gap-3">
                                
                                <button class="w-full btn py-3 bg-white text-green-600 font-semibold border border-green-400 border-secondary text-primary rounded-lg shadow hover:bg-green-50 transition" data-tab="dashboard" type="submit">
                                    Dashboard
                                </button>
                                
                                <button class="w-full btn py-3 bg-white text-green-600 font-semibold border border-green-400 rounded-lg border-secondary text-primary shadow hover:bg-green-50 transition" data-tab="orders" type="submit">
                                    Orders
                                </button>
                                <button class="w-full btn py-3 bg-white text-green-600 font-semibold border border-green-400 rounded-lg border-secondary text-primary shadow hover:bg-green-50 transition" data-tab="reviews" type="submit">
                                    Reviews
                                </button>
                                </a>
                                <button class="w-full btn py-3 bg-white text-green-600 font-semibold border border-green-400 rounded-lg border-secondary text-primary shadow hover:bg-green-50 transition" data-tab="payment" type="submit">
                                    Payment
                                </button>
                                <button class="w-full btn py-3 bg-white text-green-600 font-semibold border border-green-400 rounded-lg border-secondary text-primary shadow hover:bg-green-50 transition" data-tab="address" type="submit">
                                    Address
                                </button>
                                <button class="w-full btn py-3 bg-white text-green-600 font-semibold border border-green-400 rounded-lg border-secondary text-primary shadow hover:bg-green-50 transition" data-tab="profile" type="submit">
                                    Profile
                                </button>
                                </div>
                        </div>
               <!--          <div class="col-lg-7">
                            <form action="" class="">
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div> -->
                        <div class="col-lg-12 mt-4">
                            <!-- Tab Contents -->
                            <div class="tab-content" id="tab-contents">

                                <!-- Dashboard Tab -->
                                <div class="tab-pane active" data-tab-content="dashboard">
                                                           <div class="d-flex flex-wrap gap-3">

                                <!-- Total Orders -->
                                <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                    <i class="fas fa-shopping-cart fa-2x text-success me-4"></i>
                                    <div>
                                        <h5 class="mb-1">Total Orders</h5>
                                        <p class="mb-0 fw-bold">{{ $orderCount }}</p>
                                    </div>
                                </div>

                                <!-- Pending Orders -->
                                <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                    <i class="fas fa-clock fa-2x text-warning me-4"></i>
                                    <div>
                                        <h5 class="mb-1">Pending Orders</h5>
                                        <p class="mb-0 fw-bold">{{ $pendingOrderCount }}</p>
                                    </div>
                                </div>

                                <!-- Pending Reviews -->
                                <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                    <i class="fas fa-star-half-alt fa-2x text-danger me-4"></i>
                                    <div>
                                        <h5 class="mb-1">Total Reviews</h5>
                                        <p class="mb-0 fw-bold">{{ $reviewCount }}</p>
                                    </div>
                                </div>

                                <!-- Delivered Orders -->
                                <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                    <i class="fas fa-check-circle fa-2x text-primary me-4"></i>
                                    <div>
                                        <h5 class="mb-1">Delivered Orders</h5>
                                        <p class="mb-0 fw-bold">0</p>
                                    </div>
                                </div>

                                <!-- Canceled Orders -->
                                <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                    <i class="fas fa-times-circle fa-2x text-secondary me-4"></i>
                                    <div>
                                        <h5 class="mb-1">Canceled Orders</h5>
                                        <p class="mb-0 fw-bold">0</p>
                                    </div>
                                </div>

                            </div>
                            </div>

                            <!-- Orders Tab -->
                            <div class="tab-pane d-none" data-tab-content="orders">
                                <h4 class="mb-3">Your Orders</h4>
                                <p>Here you can view all your orders and their statuses.</p>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="tab-pane d-none" data-tab-content="reviews">
                                <h4 class="mb-3">Your Reviews</h4>
                                <p>See and manage your product reviews here.</p>
                            </div>

                            <!-- Payment Tab -->
                            <div class="tab-pane d-none" data-tab-content="payment">
                                <h4 class="mb-3">Payment Info</h4>
                                <p>Manage your payment methods and transaction history here.</p>
                            </div>

                            <!-- Address Tab -->
                            <div class="tab-pane d-none" data-tab-content="address">
                                <h4 class="mb-3">Shipping Address</h4>
                                    <form id="shippingAddressUpdateForm">
                                        @csrf
                                        
                                        <!-- New Shipping Address Fields -->
                                        <input type="text" name="address" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Address" value="{{ $deliveryAddresses->address_line ?? '' }}" required>
                                        <input type="text" name="country" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Country" value="NIGERIA" readonly>
                                        
                                        <!-- State Dropdown (Hardcoded States in Nigeria) -->
                                        <select name="state" class="w-100 form-control border-0 py-3 mb-4" required>
                                            <option value="">Select Your State</option>
                                            <option >Abia</option>
                                            <option >Adamawa</option>
                                            <option >Akwa Ibom</option>
                                            <option >Anambra</option>
                                            <option >Bauchi</option>
                                            <option >Bayelsa</option>
                                            <option >Benue</option>
                                            <option >Borno</option>
                                            <option >Cross River</option>
                                            <option >Delta</option>
                                            <option >Ebonyi</option>
                                            <option >Edo</option>
                                            <option >Ekiti</option>
                                            <option >Enugu</option>
                                            <option >Gombe</option>
                                            <option >Imo</option>
                                            <option >Jigawa</option>
                                            <option >Kaduna</option>
                                            <option >Kano</option>
                                            <option >Katsina</option>
                                            <option >Kebbi</option>
                                            <option >Kogi</option>
                                            <option >Kwara</option>
                                            <option >Lagos</option>
                                            <option >Nasarawa</option>
                                            <option >Niger</option>
                                            <option >Ogun</option>
                                            <option >Ondo</option>
                                            <option >Osun</option>
                                            <option >Oyo</option>
                                            <option >Plateau</option>
                                            <option >Rivers</option>
                                            <option >Sokoto</option>
                                            <option >Taraba</option>
                                            <option >Yobe</option>
                                            <option >Zamfara</option>
                                        </select>

                                        <input type="text" name="city_name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your City" value="{{ optional($deliveryAddresses)->name ?? '' }}">
                                        <input type="number" name="zipcode" value="{{ optional($deliveryAddresses)->zipcode ?? '' }}" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Zip Code" required>
                                        <!-- addressType Dropdown (Hardcoded States in Nigeria) -->
                                        <select name="addressType" class="w-100 form-control border-0 py-3 mb-4" required>
                                            <option >shipping</option> 
                                            <option >billing</option>
                                        </select>
                                        <input type="checkbox" required name="is_shipping" value="1" {{ isset($deliveryAddresses->is_shipping) && $deliveryAddresses->is_shipping ? 'checked' : '' }}> Click here
                                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Update</button>
                                    </form>

                            </div>
                            <!-- Profile Tab -->
                            <div class="tab-pane d-none" data-tab-content="profile">
                                <h4 class="mb-3">Your Profile</h4>
                                <p> 
                         <div class="col-lg-7">
                                <form id="profileUpdateForm">
                                    @csrf
                                    <input type="text" name="first_name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your First Name" value="{{ Auth::user()->first_name }}">
                                    <input type="text" name="last_name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Last Name" value="{{ Auth::user()->last_name }}">
                                    <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email" value="{{ Auth::user()->email }}">
                                      <input type="number" name="mobile" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Mobile Number" value="{{ Auth::user()->mobile }}" required>
                                    <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Update</button>
                                </form>

                            </div> 
                                
                        </p>
                            </div>

                        </div>
                    </div>

{{--                   <div class="col-lg-12">
                        <div class="d-flex flex-wrap gap-3">

                            <!-- Total Orders -->
                            <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                <i class="fas fa-shopping-cart fa-2x text-success me-4"></i>
                                <div>
                                    <h5 class="mb-1">Total Orders</h5>
                                    <p class="mb-0 fw-bold">{{ $orderCount }}</p>
                                </div>
                            </div>

                            <!-- Pending Orders -->
                            <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                <i class="fas fa-clock fa-2x text-warning me-4"></i>
                                <div>
                                    <h5 class="mb-1">Pending Orders</h5>
                                    <p class="mb-0 fw-bold">{{ $pendingOrderCount }}</p>
                                </div>
                            </div>

                            <!-- Pending Reviews -->
                            <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                <i class="fas fa-star-half-alt fa-2x text-danger me-4"></i>
                                <div>
                                    <h5 class="mb-1">Total Reviews</h5>
                                    <p class="mb-0 fw-bold">{{ $reviewCount }}</p>
                                </div>
                            </div>

                            <!-- Delivered Orders -->
                            <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                <i class="fas fa-check-circle fa-2x text-primary me-4"></i>
                                <div>
                                    <h5 class="mb-1">Delivered Orders</h5>
                                    <p class="mb-0 fw-bold">0</p>
                                </div>
                            </div>

                            <!-- Canceled Orders -->
                            <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm flex-fill" style="min-width: 250px;">
                                <i class="fas fa-times-circle fa-2x text-secondary me-4"></i>
                                <div>
                                    <h5 class="mb-1">Canceled Orders</h5>
                                    <p class="mb-0 fw-bold">0</p>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard End -->

<div id="toast-container" aria-live="polite" aria-atomic="true">
    <div id="toast" class="toast" style="font-weight: bolder;"></div>
</div>

@include('components.footer')
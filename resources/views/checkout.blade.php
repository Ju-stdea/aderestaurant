@include('components.header')
@include('components.nav')



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
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" class="form-control"  id="address" value="address" value="{{ $deliveryAddress->address_line ?? '' }}" placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" id="citySelect" name="citySelect" value="{{ $deliveryAddress->city ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" name="country" value="{{ $deliveryAddress->country ?? '' }}" class="form-control">
                            </div> 
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" name="postal" id="postal" value="{{ $deliveryAddress->zipcode ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" name="phone" id="phone" value="{{ auth()->check() ? auth()->user()->mobile : '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" class="form-control">
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="Account-1" name="Accounts" value="Accounts">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div>
                            <hr>
                            <div class="form-check my-3">
                                <input class="form-check-input" id="isBilling" type="checkbox" checked
                                                onclick="toggleBillingAddress()">
                                <label class="form-check-label" for="Address-1">Use shipping address as billing address</label>
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
                                <label class="form-label my-3">Address <sup>*</sup></label>
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
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-4">Shipping</p>
                                            </td>
                                            <td colspan="3" class="py-0">
                                                <div class="form-check text-start">
                                                    <!-- <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping-1" value="Shipping"> -->
                                                    <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">₦135.00</p>
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
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Paystack-1" name="Paystack" value="Paystack">
                                        <label class="form-check-label" for="Paystack-1">Pay with Paystack</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
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
    function toggleBillingAddress() {
        const isBillingChecked = document.getElementById('isBilling').checked;
        const billingForm = document.getElementById('billingForm');

        if (isBillingChecked) {
            billingForm.style.display = 'none';  // Hide billing form if checkbox is checked
        } else {
            billingForm.style.display = 'block'; // Show billing form if checkbox is unchecked
        }
    }

</script>

@include('components.footer')
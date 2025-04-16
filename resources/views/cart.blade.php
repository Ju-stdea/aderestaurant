@include('components.header')
@include('components.nav')
<?php 
  use App\Models\Product;
?>
    <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        @if (count($cart) > 0)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $index => $item)
                            <tr data-product-id="{{ $item['id'] }}">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item['image_url'] }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item['product_name'] }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">
                                        <?php        $discounted_price = Product::getDiscountedPrice($item['id']); ?>
                                        @if($discounted_price > 0)
                                            ₦{{ $discounted_price }}
                                        @else
                                            ₦{{ number_format($item['product_price'], 2) }}
                                        @endif                                        
                                    </p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" data-product-id="{{ $item['id'] }}" data-index="{{ $index }}">
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="{{ $item['quantity'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border" data-product-id="{{ $item['id'] }}" data-index="{{ $index }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">₦ {{ number_format($item['total'], 2) }}</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4 remove-item" data-product-id="{{ $item['id'] }}">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <!-- <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code"> -->
                    <a href="{{ url('/carts') }}">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Update Cart</button>
                </a>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">₦ {{ number_format($totalAmount, 2) }}</p>
                                </div><!-- 
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div> -->
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                               <p class="mb-0 pe-4">₦ {{ number_format($totalAmount, 2) }}</p>
                            </div>
                            <a href="{{ url('/checkout') }}">
                               <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
     @else
        <div class="container text-center">
            <h4 style="margin-top: 20px;">Your cart is empty.</h4>
            <a href="{{ url('products') }}" class="shop-btn"> <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Our Products</button></a>
        </div>
    @endif

<div id="toast-container" aria-live="polite" aria-atomic="true">
    <div id="toast" class="toast" style="font-weight: bolder;"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function () {
        function showToast(message, type) {
            Swal.fire({
                text: message,
                icon: type,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        }

        // Using event delegation for both buttons
        $(document).on("click", ".btn-plus", function () {
            var productId = $(this).data("product-id");
            var container = $(this).closest(".input-group");
            console.log("Plus - container:", container);
            var quantityInput = container.find("input");
            console.log("Plus - input:", quantityInput);

            if (quantityInput.length === 0) {
                console.error("Plus - Input element not found!");
                return;
            }
            var currentQuantity = parseInt(quantityInput.val()) || 0;

            $.ajax({
                url: "{{ route('update.increase.cart') }}",
                type: "GET",
                data: { product_id: productId },
                success: function (response) {
                    var newQuantity = currentQuantity + 1;
                    quantityInput.val(newQuantity);
                    showToast('Quantity increased successfully!', 'success');
                },
                error: function (xhr) {
                    showToast('Error updating quantity!', 'error');
                }
            });
        });

        $(document).on("click", ".btn-minus", function () {
            var productId = $(this).data("product-id");
            var container = $(this).closest(".input-group");
            console.log("Minus - container:", container);
            var quantityInput = container.find("input");
            console.log("Minus - input:", quantityInput);

            if (quantityInput.length === 0) {
                console.error("Minus - Input element not found!");
                return;
            }
            var currentQuantity = parseInt(quantityInput.val()) || 0;

            if (currentQuantity > 1) {
                $.ajax({
                    url: "{{ route('update.decrease.cart') }}",
                    type: "GET",
                    data: { product_id: productId },
                    success: function (response) {
                        var newQuantity = currentQuantity - 1;
                        quantityInput.val(newQuantity);
                        showToast('Quantity decreased successfully!', 'success');
                    },
                    error: function (xhr) {
                        showToast('Error updating quantity!', 'error');
                    }
                });
            } else {
                console.warn("Quantity cannot go below 1.");
            }
        });
    });
</script>

@include('components.footer')
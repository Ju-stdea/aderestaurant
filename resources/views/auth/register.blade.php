@include('components.header')
@include('components.nav')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Register</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Register</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Welcome | Create an account</h1>
                                        <!-- Login Link -->
                                        <div class="form-check my-3">
                                            <label class="form-check-label" for="login-link">
                                                Already have an account? <a href="{{ url('login') }}">Click here to login</a>
                                            </label>
                                        </div>
                                @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <!----For forget password ---->
                                @if(session('message'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('message') }}
                                </div>
                                @endif
                                <!----Validation errors---->
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                           <form method="POST" action="{{ route('register') }}">
                                @csrf
                                    <div class="col-md-12 col-lg-6 col-xl-7">
                                        <div class="form-item">
                                            <div class="row">
                                                <!-- First Name -->
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-item w-100">
                                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                                                    </div>
                                                </div>

                                                <!-- Last Name -->
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-item w-100">
                                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <label class="form-label my-3">Email <sup>*</sup></label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-item">
                                            <label class="form-label my-3">Password <sup>*</sup></label>
                                            <input type="password" class="form-control" name="password" required placeholder="Password">
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="form-item">
                                            <label class="form-label my-3">Confirm Password <sup>*</sup></label>
                                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        </div>

                                        <!-- Terms Agreement -->
                                        <div class="form-check my-3">
                                            <input class="form-check-input" type="checkbox" name="terms_agreed" id="terms_agreed" required>
                                            <label class="form-check-label" for="terms_agreed">
                                                I agree to the <a href="#">terms and conditions</a><sup>*</sup>
                                            </label>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                            <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>

                        <div class="col-md-12 col-lg-6 col-xl-5">
                         
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->

@include('components.footer')
@include('components.header')
@include('components.nav')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Forgot Password</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Forgot Password</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">We are close | Reset Password?</h1>
                             <div class="form-check my-3">
                                <label class="form-check-label" for="Address-1">Oh! I remember my password <a href="{{ url('login') }}">Click here</a></label>
                            </div>
                                @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <!----For forget password ---->
                                @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
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
               <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="form-item">
                                <label class="form-label my-3">Email <sup>*</sup></label>
                                <input type="text" name="email" value="{{ old('email') }}"  class="form-control">
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

                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Reset Password</button>
                            </div>  
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                         
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->

@include('components.footer')

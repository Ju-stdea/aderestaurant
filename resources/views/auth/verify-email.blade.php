@include('components.header')
@include('components.nav')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Verify Email</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Verify Email</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">One More Step... | Verify Email</h1>
                 <label class="form-check-label" for="Address-1">Thanks for registering! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another (Dont forget the spam folder)</a></label>
                             <div class="form-check my-3">
                            </div>
                                @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <!----For forget password ---->
<!--                                 @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif -->
                                @if (session('status') == 'verification-link-sent')
                                    <div class="alert alert-success" role="alert">
                                        A new verification link has been sent to the email address you provided during registration.
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
               <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Resend Verification Email</button>
                            </div>  
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                         
                        </div>
                    </div>
                </form>
            </div>
        </div>

@include('components.footer')

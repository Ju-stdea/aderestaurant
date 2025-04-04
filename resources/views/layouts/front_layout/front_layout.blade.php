<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="Amras Grocery, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/logos/top-logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!--title  -->
    <title>Amras Grocery: Your One-Stop Destination for Grocery Items</title>


    <!--------------- swiper-css ---------------->
    <link rel="stylesheet" href="{{ url('css/front_css/swiper10-bundle.min.css') }}">

    <!--------------- bootstrap-css ---------------->
    <link rel="stylesheet" href="{{ url('css/front_css/bootstrap-5.3.2.min.css') }}">

    <!---------------------- Range Slider ------------------->
    <link rel="stylesheet" href="{{  url('css/front_css/nouislider.min.css') }}">

    <!---------------------- Scroll ------------------->
    <link rel="stylesheet" href="{{ url('css/front_css/aos-3.0.0.css') }}">

    <!--------------- additional-css ---------------->
    <link rel="stylesheet" href="{{ url('css/front_css/style.css') }}">

    <!--------------- JQuery ---------------->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a,
        span,
        div,
        label,
        input,
        button,
        select,
        option,
        textarea {
            font-family: 'Jost', sans-serif !important;
        }

        .blinking-alert {
            animation: blink-animation 4s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
    </style>
</head>

</head>

<body>


    <!--------------- header-section --------------->
    @include('layouts.front_layout.front_header')

    <!--------------- header-section-end --------------->

    @yield('content')
    <!--------------- footer-section--------------->
    @include('layouts.front_layout.front_footer')

    <!--------------- footer-section-end--------------->

    <!--------------- jQuery ---------------->
    <script src="{{ url('js/front_js/jquery_3.7.1.min.js') }}"></script>

    <!--------------- bootstrap-js ---------------->
    <script src="{{ url('js/front_js/bootstrap_5.3.2.bundle.min.js') }}"></script>

    <!--------------- Range-Slider-js ---------------->
    <script src="{{ url('js/front_js/nouislider.min.js') }}"></script>

    <!--------------- scroll-Animation-js ---------------->
    <script src="{{ url('js/front_js/aos-3.0.0.js') }}"></script>

    <!--------------- swiper-js ---------------->
    <script src="{{ url('js/front_js/swiper10-bundle.min.js') }}"></script>

    <!--------------- additional-js ---------------->
    <script src="{{ url('js/front_js/ecoshop.js') }}"></script>



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#update-profile-btn').click(function (e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('first_name', $('#firname').val());
                formData.append('last_name', $('#latname').val());
                formData.append('email', $('#gmail').val());
                formData.append('mobile', $('#mobile').val());
                formData.append('profile_image', $('#input-file')[0].files[0]);

                $.ajax({
                    url: '{{ route('profile.update') }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert('Profile updated successfully.');
                    },
                    error: function (xhr) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#updatePasswordBtn').click(function (e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('current_password', $('#currentpass').val());
                formData.append('new_password', $('#pass').val());
                formData.append('new_password_confirmation', $('#repass').val());

                $.ajax({
                    url: '{{ route('profile.password.update') }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert('Password updated successfully.');
                        window.location.href = '{{ route('login') }}';
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = errors ? Object.values(errors).flat().join('\n') : 'An error occurred. Please try again.';
                        alert(errorMessage);
                    }
                });
            });
        });



        $('button[data-bs-toggle="pill"]').on('click', function () {
            localStorage.setItem('activeTab', $(this).attr('data-bs-target'));
        });

        $(document).ready(function () {
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('button[data-bs-target="' + activeTab + '"]').tab('show');
            }
        });

    </script>

</body>

</html>
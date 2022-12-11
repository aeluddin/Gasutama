<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!--Logo Title-->
    <link rel="icon" href="{{ asset('/frontend/Assets/img/Logo_title.png') }}">
    <title>Gasutama Konstruksi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!--Link Bootstrap-->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!--Font Google-->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap') }}"
        rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css') }}" />
    <!--link CSS-->
    <link rel="stylesheet" href="{{ asset('/frontend/style1.css') }}">

    <!--link responsive.css-->
    <link rel="stylesheet" href="{{ asset('frontend/responsive.css') }}">

</head>

<body>
    <div class="scroller">
        <!--Navbar-->
        @include('frontend.layout.nav')

        <!--Section About-->
        <section id="about1">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-6 text-about">
                        <h1>WELCOME TO GASUTAMA KONSTRUKSI, WE BUILD YOUR DREAM</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's hdb ubdfbd uhsfbdsi ihcsnfwe ihsh uheswfcd icbwf uivbs icb ceiubcw ibcfw
                            fibfew dibwfufw iwecwefbiadbfw ieuhbfewf ncse</p>
                        <div class="swiper mySwiper swiper1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="{{ asset('/frontend/Assets/img/Slide_1.jpeg') }}"
                                        alt=""></div>
                                <div class="swiper-slide"><img src="{{ asset('/frontend/Assets/img/Slide_1.jpeg') }}"
                                        alt=""></div>
                                <div class="swiper-slide"><img src="{{ asset('/frontend/Assets/img/Slide_1.jpeg') }}"
                                        alt=""></div>
                            </div>
                        </div>
                        <button class="button-lg-primary" onclick="window.location.href='/projectPortofolio';">OUR
                            PORTOFOLIO</button>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.layout.footer')


    </div>

    <!-- Swiper JS -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    </script>
    <script src="{{ 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js' }}"></script>

</body>

</html>

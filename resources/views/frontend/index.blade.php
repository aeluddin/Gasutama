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
    <link rel="stylesheet" href="{{ asset('/frontend/style.css') }}">

    <!--link responsive.css-->
    <link rel="stylesheet" href="{{ asset('frontend/responsive.css') }}">

</head>

<body>

    <!--Navbar-->
    @include('frontend.layout.nav')



    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('/frontend/Assets/img/slide (1).jpeg') }}" alt="">
                <div class="hero-tagline">
                    <h1>
                        WELCOME TO GASUTAMA KONSTRUKSI
                    </h1>
                    <h2>
                        WE BUILD YOUR DREAM COME THRU
                    </h2>
                </div>
            </div>
            <div class="swiper-slide"><img src="{{ asset('/frontend/Assets/img/slide (2).jpeg') }}" alt="">
                <div class="hero-tagline">
                    <h3>
                        KAMI MERUPAKAN PERUSAHAAN YANG MELAYANI JASA RANCANG DAN BANGUN
                    </h3>
                    <h2>
                        {{-- LETAK TULISAN BISA DISESUAIKAN LAGI, UNTUK FONT USAHAKAN SAMAKAN DENGAN DI LOGO (ANTAPANI)
ukuran tolong sesuain aja ridru --}}
                    </h2>
                </div>
            </div>
            <div class="swiper-slide"><img src="{{ asset('/frontend/Assets/img/slide (3).jpeg') }}" alt="">
                <div class="hero-tagline">
                    <h3>
                        TIM KAMI TERDIRI DARI MULTI DISIPLIN KHUSUSNYA DIBIDANG KONSTRUKSI
                    </h3>
                    <h2>
                        {{-- LETAK TULISAN BISA DISESUAIKAN LAGI, UNTUK FONT USAHAKAN SAMAKAN DENGAN DI LOGO (ANTAPANI)
                        ukuran tolong sesuain aja ridru --}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"><img src="{{ asset('/frontend/Assets/img/Arrow Kanan.png') }}" alt=""
                class="next-img"></div>
        <div class="swiper-button-prev"><img src="{{ asset('/frontend/Assets/img/Arrow Kiri.png') }}" alt=""
                class="prev-img"></div>
    </div>

    <!-- Swiper JS -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            direction: 'horizontal',
            slidesPerView: 1,
            spaceBetween: 30,
            mousewheel: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

    <!--Hero Section-->
    <!-- <section id="hero">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-6 hero-tagline">
            <h1>
              WELCOME TO GASUTAMA KONSTRUKSI
            </h1>
            <h2>
              "WE BUILD YOUR DREAM COME THRU"
            </h2>
          </div>
        </div>
      </div> -->

    </section>
    <script src="{{ 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js' }}"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>

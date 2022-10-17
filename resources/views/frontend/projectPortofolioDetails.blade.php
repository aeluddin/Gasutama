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
    <link rel="stylesheet" href="{{ asset('/frontend/responsive.css') }}">

    <!--Link Javascript-->
    <script src="{{ asset('/frontend/script.js') }}"></script>

</head>

<body>

    <div class="scroller">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('/frontend/Assets/img/logo small.png') }}" alt=""
                        height="37px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-5">
                            <a class="nav-link" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link" href="/about">ABOUT</a>
                        </li>
                        <li class="nav-item dropdown mx-5">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                PORTOFOLIO
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/projectPortofolio">Project Portofolio</a></li>
                                <li><a class="dropdown-item" href="/designPortofolio">Design Portofolio</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link" href="/certificate">CERTIFICATE</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link" href="/contact">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <section id="projectDetails">
            <div class="container">
                <div class="card-wrapper">
                    <div class="card">
                        <!-- card left -->
                        <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    @foreach ($images as $image)
                                    <img src="/product_images/{{ $image->image }}"
                                        alt="shoe image">
                                    @endforeach
                                </div>
                            </div>
                            <div class="img-select">
                                @foreach ($images as $image)
                                <div class="img-item">
                                    <a href="#" data-id="{{$image->id}}">
                                        <img src="/product_images/{{ $image->image }}"
                                            alt="shoe image">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- card right -->
                        <div class="product-content">
                            <h2 class="product-title">{{ $product->title }}</h2>

                            <div class="product-detail">
                                <h2>Description: </h2>
                                {!! $product->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="footer">
            <div class="container">
                <!--=============== footer ===============-->
                <div class="height-emulator style=" height: 300px;"></div>
                <footer>

                    <div class="footer-inner">
                        <div class="row">

                            <div class="col-md-4">
                                <a class="footer-logo ajax" href="/">
                                    <img src="{{ asset('/frontend/Assets/img/logo small.png') }}" alt=""
                                        class="logo-footer">
                                </a>
                            </div>
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-7">
                                <div class="footer-adress"> <br>
                                    <span>PT GASUTAMA KONSTRUKSI<br>
                                        Pondok Indah Office Tower 2<br> 15th Floor <br>
                                        Jl. Sultan Iskandar Muda Kav. V-TA<br> Pondok Indah<br>
                                        Jakarta, 12310, Indonesia<br><br>
                                        Tel: +62 8111476793, Fax: +62 21 7433946<br>
                                        <a href="mailto:admin@arkadiaworks.com">admin@arkadiaworks.com</a><br>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <p> &#169; Gasutama Konstruksi 2022. All rights reserved. </p>
                            </div>
                        </div>
                    </div>
                    <span class="footer-decor"></span>

                </footer>
            </div>
            <!-- footer end    -->
        </section>


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
    <script src="{{ ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js') }}"></script>


    <script>
        const imgs = document.querySelectorAll(".img-select a");
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener("click", (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector(".img-showcase img:first-child")
                .clientWidth;

            document.querySelector(".img-showcase").style.transform = `translateX(${
    -(imgId - 1) * displayWidth
  }px)`;
        }

        window.addEventListener("resize", slideImage);
    </script>

</body>

</html>
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
        @include('frontend.layout.nav')

        <section id="projectDetails">
            <div class="container">
                <div class="card-wrapper">
                    <div class="card">
                        <!-- card left -->
                        <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    @foreach ($images as $image)
                                        <img src="{{ asset('PortoDesain/'.$image->image) }}"
                                        alt="shoe image">
                                    @endforeach
                                </div>
                            </div>

                            <div class="img-select">
                                @php
                                    $id = 0
                                @endphp
                                @foreach ($images as $image)
                                @php
                                    $id += 1
                                @endphp
                                    <div class="img-item">
                                        <a href="#" data-id="{{ $id }}">
                                            <img src="{{ asset('PortoDesain/'.$image->image)}}"
                                                alt="shoe image">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- card right -->
                        <div class="product-content">
                            <h2 class="product-title">nike shoes</h2>

                            <div class="product-detail">
                                <h2>Description: </h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora
                                    fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur
                                    quidem at sequi ipsa!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis
                                    eius. Dignissimos, labore suscipit. Unde. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente
                                    architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
                            </div>
                        </div>
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

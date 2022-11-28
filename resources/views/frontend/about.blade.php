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

        <!-- Section Layanan -->
        <section id="layanan">
            <div class="container">

                <p><span style="font-size: 14pt; "><strong>WE BUILD YOUR
                            DREAM</strong></span></p>
                <p><span style="font-size: 12pt; ">We are a general contractor
                        company that provides comprehensive construction services, starting from the planning stage to
                        the construction stage so that costs become more efficient.</span></p>
                <p><span style="font-size: 12pt; ">Kami merupakan perusahaan
                        general kontraktor yang melayani jasa kontruksi secara menyeluruh, dimulai dari tahap
                        perencanaan hingga tahap konstruksi sehingga biaya pembangunan menjadi lebih efisien dan
                        terjangkau.</span></p>
                <h2><span style="font-size: 14pt; "><strong>VISI</strong></span></h2>
                <p><span style="font-size: 12pt; ">Menjadi perusahaan penyedia
                        jasa kontruksi yang berintegritas tinggi, inovatif dan terpercaya serta memberikan pelayanan
                        yang memuaskan.</span></p>
                <p style="text-align: center;"><span
                        style="font-size: 12pt; "><em>To become a construction
                            service provider company with high integrity, innovative and trustworthy and provide
                            satisfactory service</em></span></p>
                <h2><span style="font-size: 14pt; "><strong>MISI</strong></span></h2>
                <ol>
                    <li><span style="font-size: 12pt; ">Mengutamakan
                            profesionalisme dan kompetensi dalam menjalin.<br /></span><span
                            style=" font-size: 12pt;">Prioritizing
                            professionalism and competence in establishing cooperation</span><span
                            style=" font-size: 12pt;">.</span></li>
                </ol>
                <ol start="2">
                    <li><span style="font-size: 12pt; ">Berkontribusi penuh
                            dalam memberikan wadah bagi sumber daya manusia unggul untuk tumbuh dan
                            maju.<br />Fully contribute in providing a place for superior human resources to grow
                        and advance together.</li>
                </ol>
                <ol start="3">
                    <li><span style="font-size: 12pt; ">Menerapkan sistem BMW
                            ( Biaya, Mutu dan Waktu).<br /></span><span
                            style=" font-size: 12pt;">Implementing the BMW
                            system (Cost, Quality and Time).</span></li>
                </ol>
                <p><br /><br /></p>
            </div>
        </section>

        <section id="layanan">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Our Service</h1>
                        <h2>We Build Your Dream</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card-layanan">
                            <div class="img-layanan">
                                <img src="{{ asset('/frontend/Assets/img/industry.jpeg') }}" alt="">
                            </div>
                            <div class="content-layanan">
                                <h3>Industry</h3>
                                <p>
                                    Industry pembangunan pabrikmu menjadi yang terbaik DIn publishing and graphic
                                    design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual
                                    form of a document or a typeface without relying on meaningful content
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-layanan">
                            <div class="img-layanan">
                                <img src="{{ asset('/frontend/Assets/img/industry.jpeg') }}" alt="">
                            </div>
                            <div class="content-layanan">
                                <h3>Industry</h3>
                                <p>
                                    Industry pembangunan pabrikmu menjadi yang terbaik DIn publishing and graphic
                                    design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual
                                    form of a document or a typeface without relying on meaningful content
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-layanan">
                            <div class="img-layanan">
                                <img src="{{ asset('/frontend/Assets/img/industry.jpeg') }}" alt="">
                            </div>
                            <div class="content-layanan">
                                <h3>Industry</h3>
                                <p>
                                    Industry pembangunan pabrikmu menjadi yang terbaik DIn publishing and graphic
                                    design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual
                                    form of a document or a typeface without relying on meaningful content
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="our-partner">
            <div class="container text-center">
                <h1>Our Partners</h1>
                <br>
                <div class="row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-2">
                        <img src="{{ asset('/frontend/Assets/img/logo small.png') }}" class="img-responsive"
                            style="width:100%" alt="Image">
                    </div>
                    <div class="col-sm-2">
                        <img src="{{ asset('/frontend/Assets/img/logo small.png') }}" class="img-responsive"
                            style="width:100%" alt="Image">
                    </div>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-2">

                    </div>
                </div>
            </div><br>

            <h1 class="text-center mt-5">Our Company Timeline</h1>
            <ul class="timeline">

                <!-- Item 1 -->
                <li>
                    <div class="direction-r">
                        <div class="flag-wrapper">
                            <span class="flag">The Journey Begin</span>
                            <span class="time-wrapper"><span class="time">2022</span></span>
                        </div>
                        <div class="desc">My current employment. Way better than the position before!</div>
                    </div>
                </li>


            </ul>
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

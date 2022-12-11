<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

    <!--link CSS-->
    <link rel="stylesheet" href="{{ asset('/frontend/style1.css') }}">

    <!-- link icon -->
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css') }}">
</head>

<body>
    <!--Navbar-->
    @include('frontend.layout.nav')


    <div class="scroller">
        <section id="mapSection">

            <div class="container text-center">
                <div class="row">
                    <div col-md-2>

                    </div>

                    <div col-md-8>
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0"
                                    scrolling="no" marginheight="0" marginwidth="0"
                                    src="{{ asset('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.574120380647!2d115.13627791573734!3d-8.54065927213915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23b55db5ceec9%3A0xda17059d069d7d4a!2sGASUTAMA%20KONSTRUKSI!5e0!3m2!1sid!2sid!4v1665124135896!5m2!1sid!2sid') }}"></iframe>
                            </div>

                            <div col-md-2>

                            </div>
                        </div>
                    </div>
        </section>

        <section id="contact">
            <section class="section-address">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <div class="box-address">
                                <h4 class="mb-2"><strong>Kantor Operasional Pusat -
                                        Bali</strong></h4>
                                <ul>
                                    <span><a href="{{ asset('https://goo.gl/maps/3odhPzsfcYjasTZP8') }}"
                                            target="_blank">
                                            Jl. Raya Tenggilis No. 54, RT 001 / RW 002<br>
                                            Kel. Kendangsari, Kec. Tenggilis Mejoyo<br>
                                            Surabaya - 60292</a>
                                    </span>
                                    <br>
                                    <span class="bi bi-telephone">
                                        <a href="tel:+ (+62) 31 9985 0245" target="_blank">&nbsp;(+62) 31 9985 0245
                                        </a>
                                    </span>
                                    <br>
                                    <span class="bi bi-printer">
                                        <a href="mailto:mk.surabaya@mitrakonstruksi.co.id"
                                            target="_blank">&nbsp;mk.surabaya@mitrakonstruksi.co.id
                                        </a>
                                    </span>
                                    <br>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 offset-md-1">

                        </div>
                        <div class="col-md-5 offset-md-1">

                        </div>
                        <div class="col-md-5 offset-md-1">

                        </div>
                    </div>
                </div>
            </section>

        </section>

        @include('frontend.layout.footer')


    </div>


    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

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
    <link rel="stylesheet" href="{{ asset('/frontend/main.css') }}">

</head>

<body>
    <!--Navbar-->
    @include('frontend.layout.nav')

    <div class="scroller">
        <section id="certificate">
            <div class="container">
                <h1>GASUTAMA KONSTRUKSI DESIGN PORTOFOLIO</h1>
                <div class="grid">
                    @foreach ($datas as $data)
                        <a href="{{ route('designporto.frontend.show', $data->id) }}">
                            <div class="col">
                                <img src="{{ asset('PortoDesain/'. $data->images[0]->image) }}" alt="">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @include('frontend.layout.footer')
    </div>

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

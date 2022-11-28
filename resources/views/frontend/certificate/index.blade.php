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
                <h1>CERTIFICATE</h1>
                <div class="grid">
                    @foreach ($datas as $data )
                    <div class="col">
                        <img src="{{ asset('Sartifikasi/'. $data->images[0]->image) }}" alt="">
                        <h2>{{ $data->title }}</h2>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close">X</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>

        @include('frontend.layout.footer')

    </div>

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Get all images and insert the clicked image inside the modal
        // Get the content of the image description and insert it inside the modal image caption
        var images = document.getElementsByTagName('img');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        var i;
        for (i = 0; i < images.length; i++) {
            images[i].onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                modalImg.alt = this.alt;
                captionText.innerHTML = this.nextElementSibling.innerHTML;
            }
        }
    </script>
</body>

</html>

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
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('/frontend/Assets/img/logo small.png') }}" alt=""
                    height="37px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            PORTOFOLIO
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/projectPortofolio">Project Portofolio</a></li>
                            <li><a class="dropdown-item" href="/designPortofolio">Design Portofolio</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link active" href="/certificate">CERTIFICATE</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="/contact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="scroller">
        <section id="certificate">
            <div class="container">
                <h1>CERTIFICATE</h1>

                <div class="grid">
                    <div class="col">
                        <img src="{{ asset('frontend/Assets/img/certif-landscape.jpg') }}" alt="">
                        <h2>Title</h2>
                    </div>
                    <div class="col">
                        <img src="{{ asset('frontend/Assets/img/certif-landscape.jpg') }}" alt="">
                        <h2>Title</h2>
                    </div>
                    <div class="col">
                        <img src="{{ asset('frontend/Assets/img/certif-landscape.jpg') }}" alt="">
                        <h2>Title</h2>
                    </div>
                    <div class="col">
                        <img src="{{ asset('frontend/Assets/img/certificate.jpg') }}" alt="">
                        <h2>Title</h2>
                    </div>
                    <div class="col">
                        <img src="{{ asset('frontend/Assets/img/certificate.jpg') }}" alt="">
                        <h2>Title</h2>
                    </div>
                    <div class="col">
                        <img src="{{ asset('frontend/Assets/img/certificate.jpg') }}" alt="">
                        <h2>Title</h2>
                    </div>
                </div>

            </div>
        </section>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close">X</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>

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
   images[i].onclick = function(){
       modal.style.display = "block";
       modalImg.src = this.src;
       modalImg.alt = this.alt;
       captionText.innerHTML = this.nextElementSibling.innerHTML;
   }
}
    </script>
</body>

</html>
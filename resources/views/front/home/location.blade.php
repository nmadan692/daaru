<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daaruu Dot Com</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('front')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('front')}}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('front')}}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ComingSoon - v2.1.0
    * Template URL: https://bootstrapmade.com/comingsoon-free-html-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;

        }

        li {
            float: right;
        }

        li a {
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }


        li a.active {
            color: white;
            background-color: #f28e1c;
        }
        .button1 {background-color: #f28e1c;}
        .button {
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>

</head>

<body>




<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center">
        <h1>Daaruu Dot Com</h1>
        <h2>We're now available at two store. Place  your order and grab the opportunity.</h2>
        <h1>Where are you now?</h1>
        <div class="countdown d-flex justify-content-center">
            <ul>
                @foreach($cities as $city)
                    <li><a href="{{ route('default.city', encrypt($city->id)) }}"><button class="button button1">{{$city->name}}</button></a></li>
                @endforeach
            </ul>
        </div>

        <div class="social-links text-center">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        </div>

    </div>
</header><!-- End #header -->


<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="copyright">
        &copy; Copyright <strong><span>Daaruu Dot Com</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/comingsoon-free-html-bootstrap-template/ -->
        Designed by <a href="https://softmine.com.np/">SoftMine Technologies</a>
    </div>

</footer><!-- End #footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('front')}}/assets/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('front')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('front')}}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{asset('front')}}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{asset('front')}}/assets/vendor/jquery-countdown/jquery.countdown.min.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('front')}}/assets/js/main.js"></script>
<script>
    const btn = document.querySelector('#btn');
    // handle click button
    btn.onclick = function () {
        const rbs = document.querySelectorAll('input[name="choice"]');

    };
</script>

</body>

</html>

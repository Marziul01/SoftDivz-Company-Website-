<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <title>Dtox</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="dtox" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/plugins/bootstrap/bootstrap.min.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/plugins/themify-icons/themify-icons.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/plugins/slick/slick.css">
    <!-- venobox popup -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/plugins/Venobox/venobox.css">
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/plugins/aos/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main Stylesheet -->
    <link href="{{ asset('frontend-assets') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend-assets') }}/css/main.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend-assets') }}/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend-assets') }}/images/favicon.ico" type="image/x-icon">

</head>

<body>

@include('frontend.include.header')

@yield('content')

@include('frontend.include.footer')

<script src="{{ asset('frontend-assets') }}/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend-assets') }}/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="{{ asset('frontend-assets') }}/plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="{{ asset('frontend-assets') }}/plugins/Venobox/venobox.min.js"></script>
<!-- aos -->
<script src="{{ asset('frontend-assets') }}/plugins/aos/aos.js"></script>
<!-- Main Script -->
<script src="{{ asset('frontend-assets') }}/js/script.js"></script>

@yield('customJs')

</body>

</html>

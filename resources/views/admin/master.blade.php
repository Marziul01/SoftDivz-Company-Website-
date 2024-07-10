<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>SoftDivz | @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-assets') }}/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{ asset('admin-assets') }}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin-assets') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('admin-assets') }}/css/main.css" rel="stylesheet">

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="{{ route('home') }}" target="_blank">
                <b class="logo-abbr"><img src="{{ asset('admin-assets') }}/images/logo.png" alt=""> </b>
                <span class="logo-compact"><img src="{{ asset('admin-assets') }}/images/logo-compact.png" alt=""></span>
                <span class="brand-title">
                        <img src="{{ asset('admin-assets') }}/images/logo-text.png" alt="">
                    </span>
            </a>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    @include('admin.include.header')
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('admin.include.sidebar')
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->

    <div class="content-body">
        @yield('content')
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    @include('admin.include.footer')
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('admin-assets') }}/plugins/common/common.min.js"></script>
<script src="{{ asset('admin-assets') }}/js/custom.min.js"></script>
<script src="{{ asset('admin-assets') }}/js/settings.js"></script>
<script src="{{ asset('admin-assets') }}/js/gleek.js"></script>
<script src="{{ asset('admin-assets') }}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{ asset('admin-assets') }}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{ asset('admin-assets') }}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{ asset('admin-assets') }}/plugins/d3v3/index.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/topojson/topojson.min.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{ asset('admin-assets') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{ asset('admin-assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{ asset('admin-assets') }}/plugins/chartist/js/chartist.min.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="{{ asset('admin-assets') }}/js/dashboard/dashboard-1.js"></script>

@yield('customJs')
</body>

</html>

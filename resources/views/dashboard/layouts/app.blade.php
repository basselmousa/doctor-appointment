<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('dashboard/assets/img/favicon.png')}}">
    <title>
        Admin
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Nucleo Icons -->
    <link href="{{asset('dashboard/assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('dashboard/assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet"/>
</head>
<body>
@include('dashboard.layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('dashboard.layouts.nav')
    <div class="container-fluid py-4">
        @yield('dashboardContent')
    </div>

</main>

<script src="{{asset('dashboard/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
</body>
</html>

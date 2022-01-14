<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('dashboard/assets/img/favicon.png')}}">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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

<body class="g-sidenav-show  bg-gray-200">

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <form action="{{ route('add_vaccine.post') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Vaccine Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">age</label>
                        <input type="number" name="age" class="form-control" >
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</main>

<!--   Core JS Files   -->
<script src="{{asset('dashboard/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.carousel.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{route('welcome')}}"><span class="text-primary">Children</span>-Vaccines</a>

            {{--            <form action="#">--}}
            {{--                <div class="input-group input-navbar">--}}
            {{--                    <div class="input-group-prepend">--}}
            {{--                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>--}}
            {{--                    </div>--}}
            {{--                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"--}}
            {{--                           aria-describedby="icon-addon1">--}}
            {{--                </div>--}}
            {{--            </form>--}}

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('doctors') ? 'active' : '' }}">
                        <a class="nav-link" href=" {{ route('doctors') }}">Doctors</a>
                    </li>
                    @auth('web')
                        <li class="nav-item {{ request()->routeIs('user-vaccines') ? 'active' : '' }}">
                            <a class="nav-link" href=" {{ route('user-vaccines') }}">My Vaccines</a>
                        </li>
                    @endauth

                    <li class="nav-item">
                        @guest
                            @if (Route::has('login') || Route::has('register'))
                                <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login / Register</a>
                            @endif
                        @else
                            <a class="btn btn-primary ml-lg-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @endguest
                    </li>
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>




<div class="container">
    <h1 class="header"><span class="text-primary">{{ auth('web')->user()->full_name }}</span> Taked Vaccines</h1>
       <table class="table">
           <thead>
           <tr>

               <th scope="col">Child Name</th>
               <th scope="col">Doctor Name</th>
               <th scope="col">Vaccine Name</th>
               <th scope="col">Date</th>
           </tr>
           </thead>
           <tbody>
           @foreach($taked as $take)

               <tr>
                   <th scope="row">{{ $take->user }}</th>
                   <td>{{ $take->admin}}</td>
                   <td>{{ $take->vaccine }}</td>
                   <td>{{ $take->date  }}</td>
               </tr>
           @endforeach

           </tbody>
       </table>
   </div>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/js/theme.js')}}"></script>

</body>
</html>

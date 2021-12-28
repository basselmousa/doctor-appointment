@extends('layouts.home-layout')
@section('homeText')

    <div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('assets/img/bg_image_1.jpg')}});">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                <h1 class="display-4">Healthy Living</h1>

            </div>
        </div>
    </div>

@endsection

@section('content')


    <div class="page-section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1>Welcome to Your Health <br> Center</h1>
                    <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>

                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="img-place custom-img-1">
                        <img src="{{asset('assets/img/bg-doctor.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

            <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                @foreach($doctors as $doctor)
                    <div class="item">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="{{  asset("assets/img/doctors/doctor_1.jpg") }}" alt="">
{{--                                <div class="meta">--}}
{{--                                    <a href="#"><span class="mai-call"></span></a>--}}
{{--                                    <a href="#"><span class="mai-logo-whatsapp"></span></a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="body">
                                <p class="text-xl mb-0"><a href="{{ route('view_doctor', $doctor->id) }}">{{ $doctor->full_name }}</a></p>
                                <span class="text-sm text-grey">{{ $doctor->certificates }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


{{--    @auth('web')--}}

{{--        <div class="page-section">--}}
{{--            <div class="container">--}}
{{--                <h1 class="text-center wow fadeInUp">Make an Appointment</h1>--}}

{{--                <form class="main-form">--}}
{{--                    <div class="row mt-5 ">--}}
{{--                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">--}}
{{--                            <input type="text" class="form-control" placeholder="Full name">--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">--}}
{{--                            <input type="text" class="form-control" placeholder="Email address..">--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">--}}
{{--                            <input type="date" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">--}}
{{--                            <select name="departement" id="departement" class="custom-select">--}}
{{--                                <option value="general">General Health</option>--}}
{{--                                <option value="cardiology">Cardiology</option>--}}
{{--                                <option value="dental">Dental</option>--}}
{{--                                <option value="neurology">Neurology</option>--}}
{{--                                <option value="orthopaedics">Orthopaedics</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                            <input type="text" class="form-control" placeholder="Number..">--}}
{{--                        </div>--}}
{{--                        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div> <!-- .page-section -->--}}

{{--    @endauth--}}

@endsection

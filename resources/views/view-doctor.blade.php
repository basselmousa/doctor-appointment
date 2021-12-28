@extends('layouts.home-layout')
@section('content')

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

            <form class="main-form" method="post" action="{{ route('make_appoint', $id) }}">
                @csrf
                <div class="row mt-5 ">


                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">

                        <input type="time" name="time" min="{{ $id->start }}" max="{{ $id->end }}"
                               class="form-control @error('time') is-invalid @enderror">
                        <small>Please choose time between {{ $id->start }} and {{ $id->end }}</small>
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="vaccine" id="departement" class="custom-select @error('vaccine') is-invalid @enderror">

                            @foreach($vaccines as $vaccine)
                                <option value="{{ $vaccine->id }}">{{ $vaccine->vaccines_name }}</option>
                            @endforeach

                        </select>
                        @error('vaccine')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="day" id="departement" class="custom-select @error('day') is-invalid @enderror">

                            @foreach(explode(',' , $id->days) as $day)
                                @empty( !$day )

                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endempty
                            @endforeach

                        </select>
                        @error('day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
            </form>
        </div>
    </div> <!-- .page-section -->

@endsection

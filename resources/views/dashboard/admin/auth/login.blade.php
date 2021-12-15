@extends('layouts.app')

@section('content')



    <div class="main" style="height: 856px !important;">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            @if($errors->has('error'))
                {{ $errors }}
            @endif
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf

                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="full_name" class="@error('full_name') is-invalid @enderror"
                       placeholder="Full name" required>
                @error('full_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="number" name="phone_number" class="@error('phone_number') is-invalid @enderror" placeholder="Phone number "
                       required>
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email"
                       required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <textarea  name="certificates" class="@error('certificates') is-invalid @enderror" placeholder="Certificates" required></textarea>
                @error('certificates')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <select name="days[]" class="js-example-basic-single form-control" id="day" multiple>
                    <option value="sunday">Sunday</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                </select>


                @error('days')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <input type="time" name="start" class="@error('start') is-invalid @enderror" placeholder="Please start start time in each day"
                       required>
                @error('start')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <input type="time" name="end" class="@error('end') is-invalid @enderror" placeholder="Please insert end time in each day"
                       required>
                @error('end')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <input type="password" name="password" class="@error('password') is-invalid @enderror"
                       placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password"
                       required autocomplete="new-password">

                <button>Sign up</button>
            </form>
        </div>

        <div class="login">
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <label for="chk" aria-hidden="true">{{ __('Login') }}</label>
                <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email"
                       required="">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="password" name="password" class="@error('password') is-invalid @enderror"
                       placeholder="Password" required="">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <button>Login</button>
            </form>
        </div>
    </div>

@endsection

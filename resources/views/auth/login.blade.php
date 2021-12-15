@extends('layouts.app')

@section('content')


    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="full_name" class="@error('full_name') is-invalid @enderror"
                       placeholder="Full name" required>
                @error('full_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="number" name="nid" class="@error('nid') is-invalid @enderror" placeholder="National Id"
                       required>
                @error('nid')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="number" name="age" class="@error('age') is-invalid @enderror" placeholder="Age" required>
                @error('age')
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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="chk" aria-hidden="true">{{ __('Login') }}</label>
                <input type="number" name="nid" class="@error('nid') is-invalid @enderror" placeholder="Email"
                       required="">
                @error('nid')
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

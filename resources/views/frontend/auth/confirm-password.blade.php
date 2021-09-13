@extends('frontend.auth.master-auth')
@section('title', 'Confirm Password')
@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/login-register-frontend/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30">
            <form action="{{route('password.update')}}" class="login100-form validate-form" method="POST">
                @csrf
                <span class="login100-form-title p-b-20">Reset Password</span>
                <input type="hidden" name="token" value="{{ request()->token }}">

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Email wajib di isi">
                    <span class="label-input100">{{ __('E-Mail Address') }}</span>
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"  name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-10" id="div-password" data-validate="Password wajib di isi">
                    <span class="label-input100">Password</span>
                    <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-10" id="div-password" data-validate="Password wajib di isi">
                    <span class="label-input100">Confirm Password</span>
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">Reset Password</button>
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

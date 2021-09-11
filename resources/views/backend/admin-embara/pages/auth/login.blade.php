@extends('backend.admin-embara.pages.auth.master-auth')
@section('title', 'Embara Registration')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt mt-4" data-tilt style="margin-left: 40px">
                <img src="{{ asset('assets/login-register-backend/images/logo-embara.png') }}" alt="IMG">
            </div>
            <form class="login100-form validate-form" action="{{ url('admin-embara/login/post') }}" method="POST">
                @csrf
                <span class="login100-form-title">
                    Admin Embara Login
                </span>
                @if (Session::has('status'))
                    <div class="alert alert-{{ Session::get('alert-class', 'info') }} alert-dismissible fade show" role="alert">
                        <div>
                        {{ Session::get('status') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">Login</button>
                </div>
                <div class="text-center p-t-12 mt-3">
                    <span class="txt1">Forgot</span>
                    <a class="txt2" href="#">Password ?</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

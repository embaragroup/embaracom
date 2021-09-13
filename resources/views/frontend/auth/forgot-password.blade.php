@extends('frontend.auth.master-auth')
@section('title', 'Lupa Password')
@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/login-register-frontend/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('password.email')}}" class="login100-form validate-form" method="POST">
                @csrf
                {{-- <span class="login100-form-title p-b-20">Link Lupa Password</span> --}}

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Email wajib di isi">
                    <span class="label-input100">Alamat Email</span>
                    <input class="input100" type="text" name="email" placeholder="Masukan email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">Kirim Email</button>
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

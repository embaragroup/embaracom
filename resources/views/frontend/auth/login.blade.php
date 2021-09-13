@extends('frontend.auth.master-auth')
@section('title', 'Login')
@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/login-register-frontend/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30">
            <form action="{{ url('login') }}" class="login100-form validate-form" method="POST">
                @csrf
                <span class="login100-form-title p-b-20">Masuk</span>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Email wajib di isi">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Masukan email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" id="div-password" data-validate="Password wajib di isi">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" id="password" placeholder="Masukan password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="row my-4">
                    <div class="col-12 text-center">
                        <a href="{{ route('register') }}">
                        Belum punya akun ? DAFTAR
                        </a>
                    </div>
                </div>

                @if (Route::has('password.request'))
                    <div class="row my-4">
                        <div class="col-12 text-center">
                            <a href="{{ route('password.request') }}">
                                Lupa Password
                            </a>
                        </div>
                    </div>
                @endif

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">MASUK</button>
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

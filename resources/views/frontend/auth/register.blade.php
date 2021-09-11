@extends('frontend.auth.master-auth')
@section('title', 'Embara registration')
@section('content')
<div class="limiter">
  <div class="container-login100" style="background-image: url('assets/login-register-frontend/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30">
      <form action="{{ url('register') }}" class="login100-form validate-form" method="POST">
        @csrf
        <span class="login100-form-title p-b-20">
          Daftar
        </span>

        <div class="wrap-input100 validate-input m-b-10" data-validate = "Username wajib di isi">
          <span class="label-input100">Username</span>
          <input class="input100" type="text" name="name" placeholder="Masukan username">
          <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" data-validate = "Email wajib di isi">
          <span class="label-input100">Email</span>
          <input class="input100" type="email" name="email" placeholder="Masukan email">
          <span class="focus-input100" data-symbol="&#x2709;"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" id="div-password" data-validate="Password wajib di isi">
          <span class="label-input100">Password</span>
          <input class="input100" type="password" name="password" id="password" placeholder="Masukan password">
          <span class="focus-input100" data-symbol="&#xf190;"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" id="div-confirm-password" data-validate="Confirm password wajib di isi">
          <span class="label-input100">Confirm Password</span>
          <input class="input100" type="password" id="confirm-password" placeholder="Masukan konfirmasi password">
          <span class="focus-input100" data-symbol="&#xf190;"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-23" data-validate = "Phone wajib di isi">
          <span class="label-input100">Phone</span>
          <input class="input100" type="number" name="phone" placeholder="Masukan nomer telephone">
          <span class="focus-input100" data-symbol="&#x260F;"></span>
        </div>

        <div class="row mb-3">
          <div class="col-12 text-center">
            <a href="{{ route('login') }}" class="">
              Sudah punya akun ? MASUK
            </a>
          </div>
        </div>

        <div class="container-login100-form-btn">
          <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button type="submit" class="login100-form-btn">DAFTAR</button>
          </div>
        </div>

        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('js')
<script>
  function checkPasswordMatch() {
    let password = $("#password").val();
    let confirmPassword = $("#confirm-password").val();
    if (password != confirmPassword)
      $('#div-confirm-password').addClass('alert-validate').attr('data-validate', 'Password does not match')
    else
      $('#div-confirm-password').removeClass('alert-validate').attr('data-validate', 'matching')
  }
  $(document).ready(function () {
    $("#confirm-password").keyup(checkPasswordMatch);
  });

  // validasi password min 8 character
  $('#password').on('keyup', function(){
    if ($(this).val().replace(/ /g,'').length < 8){
    console.log('masuk')
      $('#div-password').addClass('alert-validate').attr('data-validate', 'Min 8 characters')
    
    }else{
      $('#div-password').removeClass('alert-validate')
    }
  })
</script> 
@endpush
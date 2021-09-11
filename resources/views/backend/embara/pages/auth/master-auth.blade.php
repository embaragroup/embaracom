
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-5.1.0/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-register-backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-register-backend/css/main.css') }}">
	<meta name="robots" content="noindex, follow">
</head>
<body>

    @yield('content')

	<script src="{{ asset('assets/bootstrap-5.1.0/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/login-register-backend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/login-register-backend/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{ asset('assets/login-register-backend/js/main.js') }}"></script>

</body>
</html>

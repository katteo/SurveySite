<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>SurveySayz | Registro</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/admin.css" rel="stylesheet">

</head>

<body class="gray-bg">

	<div class="middle-box text-center loginscreen animated fadeIn">
		<div>
			<div>
				<h3 class="logo-name">ss</h1>
			</div>
			<h3>Registrarse en SurveySayz</h3>
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form class="m-t" role="form" method="post" action="{{ url('/register') }}">
				{!! csrf_field() !!}
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Usuario" required>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password_confirmation" placeholder="Repita Password" required>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Registrarse</button>

				<p class="text-muted text-center">
					<small>Ya tienes una cuenta?</small>
				</p>
				<a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Ingresar</a>
			</form>
		</div>
	</div>

	<!-- Mainly scripts -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="js/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
	</script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SurveySayz | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeIn">
        <div>
            <div>
                <h3 class="logo-name">SS</h1>
            </div>
            <h3>Inicio de Sesion</h3>
            @if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
            <form class="m-t" role="form" method="post" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input name="email" id="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

                <a href="#"><small>Olvidaste tu password?</small></a>
                <p class="text-muted text-center"><small>No tienes una cuenta?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/register') }}">Registrate</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
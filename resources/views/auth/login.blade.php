<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vital Salud y Belleza</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css?v=3.2.0')}}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1">Vital Salud y Belleza</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicio de sesión:</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Correo: </label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña:</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <br>
                <p class="mb-0">
                    <a href="{{url('register')}}" class="text-center">¿No tienes cuenta? Registrate ahora!</a>
                </p>
            </div>

        </div>

    </div>


    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>

</html>
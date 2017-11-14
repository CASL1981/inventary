<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">    
</head>
<body class="cover">
    <div class="container-login">
        <p class="text-center" style="font-size: 80px;">
            <i class="zmdi zmdi-account-circle"></i>
        </p>
        <p class="text-center text-condensedLight">Inicia Sesión Con Tu Cuenta</p>
        <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" name="password" required placeholder="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div>                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                    </label>
                </div>                
                <a class="brand-logo right" href="{{ route('password.request') }}">
                    Olvidaste tu contraseña?
                </a>
            </div>
            <button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
                Ingresa <i class="zmdi zmdi-mail-send"></i>
            </button>
        </form>
    </div>    
</body>
</html>
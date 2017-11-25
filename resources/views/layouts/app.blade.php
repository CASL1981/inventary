<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">    
  <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">    
  <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">    
  <link href="{{ asset('css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">    
  {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">     --}}
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
  {{-- <link href="/css/app.css" rel="stylesheet"> --}}
  
</head>
<body>
  <div id="app">    
    @yield('content')
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="{{ asset('js/material.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>  
  <script src="{{ asset('js/vue.js') }}"></script>
  <script src="{{ asset('js/axios.js') }}"></script>
  <script src="{{ asset('js/toastr.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
  @yield('script')
  
</body>
</html>
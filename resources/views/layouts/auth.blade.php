<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @stack('prepend-styles')
    @include('includes.styles-auth')
    @stack('addon-styles')
  </head>
  <body class="hold-transition login-page" style="background-color: #078287;">
    <div class="login-box">
      <div class="login-logo">
        <a href="/index.html" style="color: #fff;">UMKM Negeri Katon</a>
      </div>       
      @yield('content')
    </div>

    
    @include('includes.scripts-auth')
    @stack('prepend-scripts')
    @stack('addon-scripts')
  </body>
</html>

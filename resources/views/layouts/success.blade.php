<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @stack('prepend-styles')
    @include('includes.styles')
    @stack('addon-styles')
  </head>
  <body>
    @yield('content')

    @include('includes.footer')

    @include('includes.scripts')
    @stack('prepend-scripts')
    @stack('addon-scripts')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Log in</title>

  <style>
    /* CSS styles go here */
    body {
        background-image: url('{{asset ('backend/dist/img/maji.jpg')}}');
        background-size: cover;
        background-position: center;
      }
    
  </style>

  @include('layouts.partials.styles')
</head>
<body class="hold-transition login-page">
    @yield('content')
@include('layouts.partials.scripts')

</body>
</html>

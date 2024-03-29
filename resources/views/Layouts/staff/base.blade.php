<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Staff</title>

  @include('layouts.partials.styles')
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 @include('layouts.partials.loader')

  <!-- Navbar -->
 @include('layouts.staff.navbar')

  <!-- /.navbar -->


 @include('layouts.staff.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
 @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->
@include('layouts.partials.scripts')
@livewireScripts
</body>
</html>
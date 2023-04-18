<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Staff</title>

  <!-- Bootstrap 5 CSS file -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        {{ $slot }}
    </div>
</div>
  <!-- /.content-wrapper -->
 @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->
@include('layouts.partials.scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script>
  window.addEventListener('show-form', event => {
    $('#lgoForm').modal('show');
    })

    window.addEventListener('hide-form', event => {
    $('#lgoForm').modal('hide');
    })
</script>
@livewireScripts
</body>
</html>
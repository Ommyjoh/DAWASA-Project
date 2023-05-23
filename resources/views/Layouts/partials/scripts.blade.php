
<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- toastr js -->
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', Error, {
                CloseButton: true,
                ProgressBar: true
            });
        @endforeach
    </script>
@endif
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  window.addEventListener('show-delete-confirmation', event => {
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
        Livewire.emit('deleteConfirmed');
    }
  })
  })

  window.addEventListener('userDeleted', event => {
    Swal.fire(
      'Deleted!',
      event.detail.message,
      'success'
    )
    })

</script>

<script>
  window.addEventListener('show-form', event => {
    $('#lgoForm').modal('show');
    })

    window.addEventListener('hide-form', event => {
    $('#lgoForm').modal('hide');
    })
</script>

<script>
  // JavaScript code to create the graph using Chart.js
  var ctx = document.getElementById('myChart').getContext('2d');
  
  var data = {
      labels: ['Kinondoni', 'Temeke', 'Kigamboni', 'Ilala', 'Ubungo'],
      datasets: [{
          label: 'Total requests',
          data: [23, 19, 25, 35, 22],
          backgroundColor: ['#33ccff', '#33ccff', '#33ccff', '#33ccff', '#33ccff'],
          borderColor: 'rgb(204, 153, 255)',
          borderWidth: 1
      }]
  };

  
  var options = {
            scales: {
                y: {
                    min: 0,
                    ticks: {
                        stepSize: 10
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Total Connection Requests'
                    }
                },
                x: {
                    scaleLabel: {
                        display: true,
                        labelString: 'Districts'
                    }
                }
            }
        };

  var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
  });
</script>

<script>
  // JavaScript code to create the graph using Chart.js
  var ctx = document.getElementById('myChart2').getContext('2d');
  
  var data = {
      labels: ['Kinondoni', 'Temeke', 'Kigamboni', 'Ilala', 'Ubungo'],
      datasets: [{
          label: 'Total requests',
          data: [23, 19, 25, 35, 22],
          backgroundColor: ['#66ffff', '#009999', '#33ccff', '#cccc00', '#1aff8c'],
          borderColor: 'rgb(204, 153, 255)',
          borderWidth: 1
      }]
  };

  var options = {
      scales: {
          y: {
              min: 0,
              ticks: {
                  stepSize: 4
              }
          }
      }
  };

  var myChart = new Chart(ctx, {
      type: 'pie',
      data: data,
      options: options
  });
</script>

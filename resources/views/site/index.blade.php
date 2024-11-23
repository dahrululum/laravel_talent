<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PRIMADONA :: BKPSDMD Prov. Kepulauan Bangka Belitung</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  {{-- <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('lte/dist/css/adminlte_front.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('lte/dist/css/facebox.css') }}">

  <link rel="stylesheet" href="{{ url ('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ url ('lte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ url ('lte/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="{{ asset('css/loginpenduduk.css') }}" rel="stylesheet">
  @yield('styles')
</head>
<body class="layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  {{-- <nav class="main-header navbar navbar-expand text-sm fixed-top navbar-dark bg-primary">
   
  </nav> --}}
  {{-- @include('site/header') --}}

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper " >
    <section class="content " id="content ">
    
    <div class="container ">
            
      @include('site.content')
    </div>
    </section>
          
  </div>
  <!-- /.content-wrapper -->
   
  <footer class="main-footer bg-light">
    <strong> <a href="#">BKPSDMD Provinsi Kepulauan Bangka Belitung</a>.</strong> All rights reserved.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ url('lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
{{-- <!-- ChartJS -->


<script src="{{ url('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url ('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
<script src="{{ url('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ url('lte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('lte/dist/js/adminlte.js') }}"></script>
<script src="{{ url('lte/dist/js/facebox.js') }}" type="text/javascript" ></script>

{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('lte/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('lte/dist/js/demo.js') }}"></script> --}}
<script>
  $(function () {
    //Initialize Select2 Elements
    bsCustomFileInput.init();

    //Date picker
    $('#datepicker').datepicker({
      format:'yyyy-mm-dd',	
      autoclose: true
    })
 
  })
  jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();
})
  
</script>
<script type="text/javascript">
  $('#reload').click(function () {
  $.ajax({
  type: 'GET',
  url: 'reload-captcha',
  success: function (data) {
  $(".captcha span").html(data.captcha);
  }
  });
  });
  </script>
         
@yield('javascripts')

</body>
</html>

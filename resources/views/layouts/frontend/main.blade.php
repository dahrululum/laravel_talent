<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aplikasi SILAPOR  PROV. KEPULAUAN BANGKA BELITUNG</title>

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
  <link rel="stylesheet" href="{{ url ('lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url ('lte/dist/css/facebox.css') }}">
 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/daterangepicker/daterangepicker.css') }}">
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="{{ url ('lte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    @media print {
            .pagebreak1 {
                clear: both;
                page-break-before: always;
            }
            .pagebreak2 {
                clear: both;
                page-break-after: always;
            }
            .printna {
             display:none;
            }
            .noprint {
             display:none;
            }
            .chartdisplay{
                margin: 0 0;
                width: 100%;
                height: 80%;
                margin-bottom:100px;
            }
        }
  </style>
  @yield('styles')
   

</head>
<body class="sidebar-mini control-sidebar-slide-open text-sm">

    <!-- wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.frontend.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.frontend.sidebar')
        <!-- /.Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        @include('layouts.frontend.content')
        <!-- /.content-wrapper -->

       

        <!-- Admin Footer -->
        {{-- @include('layouts.frontend.footer') --}}
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
 
<script>
  $(function () {
    //Initialize Select Elements
    bsCustomFileInput.init();
     //facebox
     jQuery(document).ready(function($) {
       $('a[rel*=facebox]').facebox();
     })
     //tgl
     $('#datepicker1').datepicker({
      format:'yyyy-mm-dd',	
      autoclose: true
      })
      $('#datepicker2').datepicker({
        format:'yyyy-mm-dd',	
        autoclose: true
      })
      $('#datepicker3').datepicker({
        format:'yyyy-mm-dd',	
        autoclose: true
      })
      $('#uraian').summernote({
        height: 150,   //set editable area's height
        codemirror: { // codemirror options
          theme: 'monokai'
        }
      });
 
  })
  
</script>
@yield('javascripts')

    @yield('js_footer')

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin TalentPool </title>

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
  @yield('styles')
   

</head>
<body class="sidebar-mini control-sidebar-slide-open text-sm">

    <!-- wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.backend.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.backend.sidebar')
        <!-- /.Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        @include('layouts.backend.content')
        <!-- /.content-wrapper -->

       

        <!-- Admin Footer -->
        @include('layouts.backend.footer')
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
<!-- Bootstrap Switch -->
<script src="{{ url('lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ url('lte/dist/js/adminlte.js') }}"></script>
<script src="{{ url('lte/dist/js/facebox.js') }}" type="text/javascript" ></script>
<script src="{{ url('lte/plugins/chart.js/Chart.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select Elements
    bsCustomFileInput.init();
    $('[data-toggle="tooltip"]').tooltip()
     //facebox
     jQuery(document).ready(function($) {
       $('a[rel*=facebox]').facebox();
     })
     //tgl
     $('.datepicker').datepicker({
      format:'yyyy-mm-dd',	
      autoclose: true
      })
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
      $('.datepick').datepicker({
        format:'yyyy-mm-dd',	
        autoclose: true
      })
      
      $('.ket2').summernote();
      
      $('#uraiandisable').summernote('disable');

      $('.ket').summernote({
        height: 150,   //set editable area's height
        fontSizes: ['8', '9', '10', '11', '12', '14', '18'],
        toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
              ],
       
        
      });
 
 
  })
  
</script>
<script>
  function registerSummernote(element, placeholder, max, callbackMax) {
    $(element).summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['insert', ['link']],
        
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      height: 200, 
      placeholder,
      callbacks: {
        onKeydown: function(e) {
          var t = e.currentTarget.innerText;
          if (t.length >= max) {
            //delete key
            if (e.keyCode != 8)
              e.preventDefault();
            // add other keys ...
          }
        },
        onKeyup: function(e) {
          var t = e.currentTarget.innerText;
          if (typeof callbackMax == 'function') {
            callbackMax(max - t.length);
          }
        },
        onPaste: function(e) {
          var t = e.currentTarget.innerText;
          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
          e.preventDefault();
          var all = t + bufferText;
          document.execCommand('insertText', false, all.trim().substring(0, 400));
          if (typeof callbackMax == 'function') {
            callbackMax(max - t.length);
          }
        }
      }
    });
  }


$(function(){
 
  registerSummernote('#definisi', 'Isi definisi', 2000, function(max) {
    $('#sisadef').text(max)
  });
  registerSummernote('#refpemilihan', 'Isi Referensi', 1000, function(max) {
    $('#sisarefpil').text(max)
  });
  registerSummernote('#klasifikasi', 'Isi Klasifikasi', 1000, function(max) {
    $('#sisaklas').text(max)
  });
  registerSummernote('#interpretasi', 'Isi Interpretasi', 1000, function(max) {
    $('#sisaint').text(max)
  });
  registerSummernote('#rumus', 'Isi Rumus', 1000, function(max) {
    $('#sisarum').text(max)
  });
  registerSummernote('#ind_pembangunan_pub', 'Isi indikator Pembangunan Publikasi', 1000, function(max) {
    $('#sisaindpub').text(max)
  });
  registerSummernote('#ind_pembangunan_nama', 'Isi Indikator Nama', 1000, function(max) {
    $('#sisaindnama').text(max)
  });
  registerSummernote('#var_pembangunan_nama', 'Isi Var Nama', 1000, function(max) {
    $('#sisavarnama').text(max)
  });
  registerSummernote('#aturan', 'Isi Aturan', 1000, function(max) {
    $('#sisaaturan').text(max)
  });
  registerSummernote('#pertanyaan', 'Isi Pertanyaan', 1000, function(max) {
    $('#sisatanya').text(max)
  });
});
    
</script>
@yield('javascripts')

    @yield('js_footer')

</body>

</html>

 

@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
<!-- DataTables --> 

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        //$('#tablena').DataTable();
        $('#table1').DataTable( {
          "order": [[ 0, "asc" ]]
        });
        $('#table2').DataTable( {
          "order": [[ 0, "asc" ]]
        });

        //dialog
        $('#dialogqrcode').on('shown.bs.modal', function(e) {
 
            //var idpeserta = $(this).data('id');
            

            var alias = $(e.relatedTarget).data('alias');
            $(e.currentTarget).find('input[name="alias"]').val(alias);

            var idna = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="id"]').val(idna);

            var nama = $(e.relatedTarget).data('nama');
            $(e.currentTarget).find('input[name="nama"]').val(nama);

            var tglsurvei = $(e.relatedTarget).data('tglsurvei');
            $(e.currentTarget).find('input[name="tglsurvei"]').val(tglsurvei);

            var appurl2 = {!! json_encode(url('/dialogqrcode')) !!};
            var deturl2 = appurl2+"/"+idna;
                if(alias==""){
                    $("#viewtabel2").html("<h4 class='text-danger'>No. Registrasi Survei tidak boleh kosong!!!</h4>");
                }else{
                    $("#viewtabel2").load(deturl2);
                }
            //$("#viewtabel").html("<h2 class='text-danger text-center'>"+idpeserta+" </h2> <h2 class='text-info text-center'>"+nmpeserta+" </h2> <h2 class='text-info text-center'>"+idmember+" </h2>");


            }); 
            
    })
</script>
<script>
    $ ( function () {
           $( "#Formdashboard" ).submit(function( e ) {
               e.preventDefault();

               var idinsta =$( "#instansi" ).val();
               
               var appurl = {!! json_encode(url('/admin/detail_dashboard/')) !!};
               var deturl = appurl+'/'+idinsta;

                   //alert( "Handler for .submit() called   "+deturl );
                   if($("#idinsta").val() =="all"){
                       //$("#viewtabel").hide();
                       $("#resultpilih").show();
                        
                   }else{
                       $("#resultpilih").show();
                       $("#resultpilih").load(deturl);
                   }

                  
           });
   })



   
 </script>
@endsection

@section('content')
 
asdasd
 
@stop

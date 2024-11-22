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
        $('#tablena').DataTable({ "pageLength": 100 });
    })
    $("#getdataApi").click(function(e){
            e.preventDefault();
            alert("Proses GetData API akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdatasimadig')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                    // var appurl = {!! json_encode(url('/admin/detail_indikatorninebox')) !!};
                    // var deturl = appurl+"/"+response.data;
                    
                    // $("#result").show();
                    // $("#result").load(deturl, function() {
                    //     //alert( "The last 25 entries in the feed have been loaded" );
                    //     $(".spinner-border").hide();
                    // });
                    window.location.reload();
                    //$("#resultna").show();


                }, 
                error: function(xhr, status, error){
                        alert('error '+error);
                        
                }
            });

        });
</script>

@endsection

 

@section('content')
 
   
<form method="POST" id="FormCari" enctype="multipart/form-data">
                 
    <div class="card card-info card-solid">
        <div class="card-header ">
            <h3 class="card-title">Get Data Pegawai API SatamASN</h3>
        </div>    
        <div class="card-body" >
            <div class="form-group row">
                <label for="key" class="col-sm-2 col-form-label">Jumlah Pegawai  </label>
                <div class=" col-form-label col-sm-2">
                    {{-- <input type="text" class="form-control mr-2" name="jmlpeg" id="jmlpeg" value="{{ $jmlpeg}}" readonly> --}}
                    <b>{{ $jmlpeg}}</b> Orang
                    
                </div>
                
                 
                    
                             
               
                 
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    {{-- <a href="#" class="btn btn-danger" id="getdataApi"> <i class="fas fa-1x fa-sync-alt"></i> Get All Data</a> --}}
                    <button class="btn btn-success" type="submit" name="submit" value="1" id="getdataApi">
                        <i class="fa fa-download"></i> Get Data
                    </button>
                </div>
            </div>
        </div>
        
                   
    </div>
</form>
    <?php 
     //if(isset($_POST["submit"])){
     //   $key=$_GET['key'];
        
    ?>
    <div class="text-center"  >
        <div class="spinner-border m-5"  role="status" style="display: none;"  >
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="card card-info" id="resultna">
        <div class="card-header ">
            <h3 class="card-title">Hasil Get Data Pegawai Potensi  </h3>
        </div>
        <div class="card-body">
             
            <div class="table-responsive p-1">
                        

                <table class="table table-sm  table-hover table-bordered  " id="tablena1">
                    <thead  class="bg-gray">
                    <tr>
                        <th> No. </th>
                        <th> NIP </th>
                        <th> Talent Box </th>
                        <th> Pendidikan</th>
                        <th> Pengalaman Jabatan </th>
                        <th> Pengalaman Pelatihan </th>
                        <th> Sertifikasi Kompetensi </th>
                        <th> # </th>
                     
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($model as $ib) { 
                            
                                    if(($ib->nilai_tb == 1) ){
                                    $nilaitb="1";
                                    $stylena="bg-danger";
                                    
                                }elseif($ib->nilai_tb == 2){
                                    $nilaitb="2";
                                    $stylena="bg-danger";
                                    
                                }elseif($ib->nilai_tb == 3){
                                    $nilaitb="3";
                                    $stylena="bg-danger";
                                    
                                }elseif($ib->nilai_tb == 4){
                                    $nilaitb="4";
                                    $stylena="bg-warning";
                                        
                                }elseif($ib->nilai_tb == 5){
                                    $nilaitb="5";
                                    $stylena="bg-warning";
                                    
                                }elseif($ib->nilai_tb == 6){
                                    $nilaitb="6";
                                    $stylena="bg-warning";
                                        
                                }elseif($ib->nilai_tb == 7){
                                    $nilaitb="7";
                                    $stylena="bg-success";
                                    
                                }elseif($ib->nilai_tb == 8){
                                    $nilaitb="8";
                                    $stylena="bg-success";
                                    
                                }elseif($ib->nilai_tb == 9){
                                    $nilaitb="9";
                                    $stylena="bg-primary";
                                    
                                }else{
                                    $nilaitb="-";
                                    $stylena="bg-danger";
                                    
                                }
                          
                        ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td class="small"> {{ $ib->nip }}  </td>
                                <td class="small text-center"> {{ $ib->data_talentabox }} </td>
                                <td class="small">{{ $ib->data_api_pendidikan}} </td>
                                <td class="small">{{ $ib->data_api_jabatan}} </td>
                                <td class="small"> {{ $ib->data_api_pelatihan}}</td>
                                <td class="small" > {{ $ib->data_api_sertifikasi}}</td>
                                <td class="small">Detail</td>
                            </tr>
                            

                        
                        <?php
                       $no++;  } 
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{-- @if(empty($params["key"])) --}}
            <div class="row">
                <div class="col-sm-2 ">
                    Jumlah: <b>{!! $model->total() !!}</b>  Pegawai
                </div>
                <div class="col-sm-8 d-flex justify-content-center">
                    {!! $model->links() !!}
                </div>
                <div class="col-sm-2 text-right">
                    <?php 
                        $total = $model->total();
                        $currentPage = $model->currentPage();
                        $perPage = $model->perPage();

                        $from = ($currentPage - 1) * $perPage + 1;
                        $to = min($currentPage * $perPage, $total);

                        //echo "Showing {$from} to {$to} of {$total} entries";
                    ?>
                    <em>Showing {{ $from }}  to {{ $to }} of {{ $total }} entries</em>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
    <?php 
    // }
    ?>
@endsection

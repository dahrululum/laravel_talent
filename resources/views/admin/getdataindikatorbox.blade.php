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
        $('#tablena1').DataTable({ "pageLength": 10 });
    })
    $("#getbatch1").click(function(e){
            e.preventDefault();
            alert("Proses GetData Batch 1 akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            var idbatch = $(this).data("batch");
            var que1 = $(this).data("que");
            
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdataindikatorbox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "idbatch": idbatch,
                    "que": que1,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                   
                    window.location.reload();
                    //$("#resultna").show();


                }, 
                error: function(xhr, status, error){
                        alert('error '+error);
                        
                }
            });

    });
    $("#getbatch2").click(function(e){
            e.preventDefault();
            alert("Proses GetData Batch 2 akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            var idbatch = $(this).data("batch");
            var que2 = $(this).data("que");
            
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdataindikatorbox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "idbatch": idbatch,
                    "que": que2,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                   
                    window.location.reload();
                    //$("#resultna").show();


                }, 
                error: function(xhr, status, error){
                        alert('error '+error);
                        
                }
            });

    });
    $("#getbatch3").click(function(e){
            e.preventDefault();
            alert("Proses GetData Batch 3 akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            var idbatch = $(this).data("batch");
            var que3 = $(this).data("que");
            
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdataindikatorbox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "idbatch": idbatch,
                    "que": que3,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                   
                    window.location.reload();
                    //$("#resultna").show();


                }, 
                error: function(xhr, status, error){
                        alert('error '+error);
                        
                }
            });

    });
    $("#getbatch4").click(function(e){
            e.preventDefault();
            alert("Proses GetData Batch 4 akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            var idbatch = $(this).data("batch");
            var que4 = $(this).data("que");
            
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdataindikatorbox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "idbatch": idbatch,
                    "que": que4,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                   
                    window.location.reload();
                    //$("#resultna").show();


                }, 
                error: function(xhr, status, error){
                        alert('error '+error);
                        
                }
            });

    });
    $("#getbatch5").click(function(e){
            e.preventDefault();
            alert("Proses GetData Batch 5 akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            var idbatch = $(this).data("batch");
            var que5 = $(this).data("que");
            
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdataindikatorbox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "idbatch": idbatch,
                    "que": que5,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                   
                    window.location.reload();
                    //$("#resultna").show();


                }, 
                error: function(xhr, status, error){
                        alert('error '+error);
                        
                }
            });

    });
    $("#getbatch6").click(function(e){
            e.preventDefault();
            alert("Proses GetData Batch 6 akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            var idbatch = $(this).data("batch");
            var que6 = $(this).data("que");
            
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdataindikatorbox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "idbatch": idbatch,
                    "que": que6,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                    alert("sukses "+response.message);
                    console.log(response.message);
                    $(".spinner-border").hide();
                   
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
            <h3 class="card-title">Get Data Indikator Box Per Batch</h3>
        </div>    
        <div class="card-body" >
            <div class="row">
                <div class="col-lg-2 col-2">
                    <!-- small card -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <h5> 32 record PD </h5>
        
                        <p>BATCH 1</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      <a href="#" class="small-box-footer" id="getbatch1"  data-toggle="tooltip" data-placement="top" title="que1" data-que="{{ $chunk1 }}" data-batch="1">
                        Import Data  <i class="fas fa-upload"></i>
                      </a>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <!-- small card -->
                    <div class="small-box bg-fuchsia">
                      <div class="inner">
                        <h5>40 record PD</h5>
        
                        <p>BATCH 2</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      <a href="#" class="small-box-footer"  id="getbatch2"  data-toggle="tooltip" data-placement="top" title="que2" data-que="{{ $chunk2 }}" data-batch="2">
                        Import Data  <i class="fas fa-upload"></i>
                      </a>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <!-- small card -->
                    <div class="small-box bg-lightblue">
                      <div class="inner">
                        <h5>30 record PD</h5>
        
                        <p>BATCH 3</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      <a href="#" class="small-box-footer"  id="getbatch3"  data-toggle="tooltip" data-placement="top" title="que3" data-que="{{ $chunk3 }}" data-batch="3">
                        Import Data  <i class="fas fa-upload"></i>
                      </a>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <!-- small card -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h5>38 record PD</h5>
        
                        <p>BATCH 4</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      <a href="#" class="small-box-footer"  id="getbatch4"  data-toggle="tooltip" data-placement="top" title="que4" data-que="{{ $chunk4 }}" data-batch="4">
                        Import Data  <i class="fas fa-upload"></i>
                      </a>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <!-- small card -->
                    <div class="small-box bg-maroon">
                      <div class="inner">
                        <h5>60 record PD</h5>
        
                        <p>BATCH 5</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      <a href="#" class="small-box-footer"  id="getbatch5"  data-toggle="tooltip" data-placement="top" title="que5" data-que="{{ $chunk5 }}" data-batch="5">
                        Import Data  <i class="fas fa-upload"></i>
                      </a>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <!-- small card -->
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h5>17 record PD</h5>
        
                        <p>BATCH 6</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      <a href="#" class="small-box-footer"  id="getbatch6"  data-toggle="tooltip" data-placement="top" title="que6" data-que="{{ $chunk6 }}" data-batch="6">
                        Import Data  <i class="fas fa-upload"></i>
                      </a>
                    </div>
                </div>

            </div>
            <div class="form-group row">
                


                <label for="key" class="col-sm-2 col-form-label">Jumlah Instansi  </label>
                <div class=" col-form-label col-sm-2">
                    {{-- <input type="text" class="form-control mr-2" name="jmlpeg" id="jmlpeg" value="{{ $jmlpeg}}" readonly> --}}
                  
                   {{$jmlpd}}
                </div>
                {{-- <div class="text-primary mb-2 border-bottom">  {{$chunk1}}</div> --}}
                
                {{-- <div class="text-primary mb-2 border-bottom"> {{$chunk1->count()}}</div>
                <div class="text-danger mb-2 border-bottom">  {{$chunk2->count()}}</div>
                <div class="text-info mb-2 border-bottom">  {{$chunk3->count()}}</div>
                <div class="text-dark mb-2 border-bottom">  {{$chunk4->count()}}</div>
                <div class="text-primary mb-2 border-bottom">  {{$chunk5->count()}}</div>
                <div class="text-dark mb-2 border-bottom">  {{$chunk6->count()}}</div> --}}
                
                             
                
            </div>
        </div>
        {{-- <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                   
                    <button class="btn btn-success" type="submit" name="submit" value="1" id="getdataJPM">
                        <i class="fa fa-download"></i> Get Data
                    </button>
                </div>
            </div>
        </div> --}}
        
                   
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
            <h3 class="card-title">Hasil Get Data Indikator Box per Batch  </h3>
        </div>
        <div class="card-body">
             
            <div class="table-responsive p-1">
                        

                <table class="table table-sm  table-hover table-bordered  " id="tablena1">
                    <thead  class="bg-gray">
                        <tr class="bg-navy">
                            <th rowspan="2">No.</th>
                            <th rowspan="2">NIP / Nama Pegawai</th> 
                            <th rowspan="2">Instansi</th> 
                            <th rowspan="2">Jabatan</th> 
                            <th colspan="9" class="text-center">Indikator</th>
                             
                            <th rowspan="2" > Nilai X</th>
                            <th rowspan="2" > Nilai Y</th>
                            
                            <th rowspan="2">Box</th>
                            <th rowspan="2">Proses</th>
                            
                          </tr>
                          <tr class="bg-navy disabled ">
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">SKP</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Inovasi</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Prestasi</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Indisipliner</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kompetensi</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kualifikasi</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Riwayat Jabatan</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Riwayat Diklat</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kecerdasan Umum</b></th> 
                          </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($model as $ib) { 
                            
                                 
                          
                        ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td class="small"> {{ $ib->nama }}  <span class="badge badge-dark">{{ $ib->nip }} </span>  </td>
                                <td class="small">{{ $ib->nama_instansi}} </td>
                                <td class="small">{{ $ib->jabatan}} </td>
                                <td class="small text-center"> {{ $ib->nilai_skp }} </td>
                                <td class="small text-center"> {{ $ib->nilai_inovasi }} </td>
                                <td class="small text-center"> {{ $ib->nilai_prestasi }} </td>
                                <td class="small text-center"> {{ $ib->nilai_indisipliner }} </td>
                                <td class="small text-center"> {{ $ib->nilai_kompetensi }} </td>
                                <td class="small text-center"> {{ $ib->nilai_kualifikasi }} </td>
                                <td class="small text-center"> {{ $ib->nilai_riwayat_jabatan }} </td>
                                <td class="small text-center"> {{ $ib->nilai_riwayat_diklat }} </td>
                                <td class="small text-center"> {{ $ib->nilai_kecerdasan }} </td>
                                <td class="small">{{ $ib->nilai_x}} </td>
                                <td class="small">{{ $ib->nilai_y}} </td>
                                <td class="small">{{ $ib->nilai_tb}} </td>
                                 
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

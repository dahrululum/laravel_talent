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
    $("#getdataJPM").click(function(e){
            e.preventDefault();
            alert("Proses GetData JPM akan segera berlangsung");

            var idinstansi = $("#idpd").val();
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-getdatakompetensi')}}",
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
            <h3 class="card-title">Get Data Indikator Box Per Batch</h3>
        </div>    
        <div class="card-body" >
            <div class="form-group row">
                <label for="key" class="col-sm-2 col-form-label">Jumlah Pegawai  </label>
                <div class=" col-form-label col-sm-2">
                    {{-- <input type="text" class="form-control mr-2" name="jmlpeg" id="jmlpeg" value="{{ $jmlpeg}}" readonly> --}}
                    <b>{{ $jmlpeg}}</b> Orang
                    
                </div>
                <div>Jml Insta : {{$jmlpd}}</div>
                
                 
                    
                             
               
                 
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    {{-- <a href="#" class="btn btn-danger" id="getdataApi"> <i class="fas fa-1x fa-sync-alt"></i> Get All Data</a> --}}
                    <button class="btn btn-success" type="submit" name="submit" value="1" id="getdataJPM">
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
            <h3 class="card-title">Hasil Get Data Pegawai JPM  </h3>
        </div>
        <div class="card-body">
             
            <div class="table-responsive p-1">
                        

                <table class="table table-sm  table-hover table-bordered  " id="tablena1">
                    <thead  class="bg-gray">
                        <tr class="bg-navy">
                            <th rowspan="2">No.</th>
                            <th rowspan="2">NIP / Nama Pegawai</th> 
                            <th rowspan="2">Instansi</th> 
                            
                            <th colspan="9" class="text-center">Standar Kompetensi Jabatan</th>
                             
                            <th rowspan="2" > Skor</th>
                            <th rowspan="2" > JPM</th>
                            
                            <th rowspan="2">Keterangan</th>
                            <th rowspan="2">Proses</th>
                            
                          </tr>
                          <tr class="bg-navy disabled ">
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Integritas</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kerjasama</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Komunikasi</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Orientasi <br> Pada Hasil</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pelayanan Publik</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pengembangan Diri <br>dan Orang Lain</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Mengelola Perubahan</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pengambilan Keputusan</b></th>
                            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Perekat Bangsa</b></th> 
                          </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($model as $ib) { 
                            
                                 
                          
                        ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td class="small"> {{ $ib->nama }}  <span class="badge badge-dark">{{ $ib->nip }} </span>  </td>
                                <td class="small">{{ $ib->instansi}} </td>
                                <td class="small text-center"> {{ $ib->nilai_integritas }} </td>
                                <td class="small text-center"> {{ $ib->nilai_kerjasama }} </td>
                                <td class="small text-center"> {{ $ib->nilai_komunikasi }} </td>
                                <td class="small text-center"> {{ $ib->nilai_pelayanan }} </td>
                                <td class="small text-center"> {{ $ib->nilai_pengembangan }} </td>
                                <td class="small text-center"> {{ $ib->nilai_orientasi }} </td>
                                <td class="small text-center"> {{ $ib->nilai_perubahan }} </td>
                                <td class="small text-center"> {{ $ib->nilai_keputusan }} </td>
                                <td class="small text-center"> {{ $ib->nilai_perekat }} </td>
                                <td class="small">{{ $ib->skor}} </td>
                                <td class="small">{{ $ib->jpm}} </td>
                                <td class="small">{{ $ib->kategori}} </td>
                                 
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

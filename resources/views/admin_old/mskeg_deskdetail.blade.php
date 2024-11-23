@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts')
<!-- DataTables --> 

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ url('js/jquery.chained.js') }}"></script>
<script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>
<script> 
    $ ( function () {
        $('.select2').select2();
    })
    $ ( function () {
        
        $('#tablena').DataTable();
        $("#unitkerja").chained("#instansi");
    })
</script>
<script>
    $ ( function () {
           $( "#Formfilter" ).submit(function( e ) {
               e.preventDefault();
               
               var idinsta =$( "#instansi" ).val();
               var idunit =$( "#unitkerja" ).val();
             

               var datastring= idinsta+'/'+idunit;

               var appurl = {!! json_encode(url('/admin/detail_mskegdeskdetail/')) !!};
               var deturl = appurl+'/'+datastring;

                   //alert( "Handler for .submit() called   "+deturl );
                   if($("#unitkerja").val() ==""){
                       //$("#viewtabel").hide();
                       $("#resultpilih").show();
                       $("#resultpilih").html("<h4 class='callout text-danger text-center'><i class='fa fa-exclamation-circle'></i> Silahkan Pilih Unitkerja terlebih dahulu, ID Unitkerja  tidak boleh kosong</h4>");
                   }else{
                       $("#resultpilih").show();
                       $("#resultpilih").load(deturl);
                   }

                  
           });
   })



   
 </script>
@endsection

 

@section('content')
 
<form method="POST" id="Formfilter" enctype="multipart/form-data">
    {{ csrf_field() }} 
     
  <div class="card card-info card-solid">
    <div class="card-header ">
        <h3 class="card-title">Filter Berdasarkan Instansi dan Kegiatan </h3>
    </div>    
    <div class="card-body" >
        @if($levuser==2)
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-danger">Instansi</label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control  form-control-sm" id="instansi" name="instansi" value="{{ $bio->id_instansi}}" readonly>
                <input type="text" class="form-control  form-control-sm" id="nama_instansi" name="nama_instansi" value="{{ $bio->getSKPD->namaskpd}}" readonly>
                
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Unit Kerja</label>
            <div class="col-sm-5">
              <select class="form-control form-control-sm" name="unitkerja" id="unitkerja" required>
                  <option value="">Pilih Unit Kerja</option>
                  @foreach ($unit as $bid)  
                  <option class="<?php echo $bid->id_instansi?>" value="{{ $bid->id }}"> {{ $bid->nama_unitkerja }} </option>
                @endforeach   
                </select>
              </div>
          </div>
          @else
          <div class="form-group row" id="idinsta">
            <label for="inputEmail" class="col-sm-3 col-form-label"> Instansi/Perangkat Daerah  </label>
            <div class="col-sm-6">
            <select class="form-control form-control-sm select2" name="instansi" id="instansi" required>
              <option value="">Pilih Instansi</option>
                @foreach ($skpd as $jd)  
                <option value="{{ $jd->id }}">  {{ $jd->namaskpd }}</option>
              
              @endforeach
              
            </select>
            </div>
        </div>
        
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Unit Kerja</label>
            <div class="col-sm-5">
              <select class="form-control form-control-sm" name="unitkerja" id="unitkerja" required>
                  <option value="">Pilih Unit Kerja</option>
                  @foreach ($unit as $bid)  
                  <option class="<?php echo $bid->id_instansi?>" value="{{ $bid->id }}"> {{ $bid->nama_unitkerja }} </option>
                @endforeach   
                </select>
              </div>
          </div>


          @endif
          <hr>

        
         
    </div>
    <div class="card-footer"> 
         <button class="btn btn-primary btn-lg" type="submit" id="btnpilih"> <i class="fa fa-search"></i> Pilih</button>
    </div>
               
</div>
</form>  
<div id="resultpilih">
    
     
    <div class="card card-solid card-dark">
        <div class="card-header ">
            <h3 class="card-title">Detail Deskripsi MS-KEG  </h3>
        </div>    
      
        <div class="card-body table-responsive p-0" >
          <table class="table table-bordered table-head-fixed " id="tablena2">
                <thead>
                <tr >
                    <th class="bg-gray"> No.</th>
                    <th class="bg-gray"> Tahun </th>
                    
                    <th class="bg-gray col-md-3"> Nama Kegiatan</th>
                    <th class="bg-gray "> Tahap 1</th>
                    <th class="bg-gray "> Tahap 2 </th>
                    <th class="bg-gray "> Tahap 3 </th>
                    <th class="bg-gray "> Tahap 4</th>
                    <th class="bg-gray "> Tahap 5</th>
                    <th class="bg-gray "> Tahap 6 </th>
                    <th class="bg-gray "> Tahap 7 </th>
                    <th class="bg-gray "> Tahap 8</th>
                    <th class="bg-gray "> #</th>
                    
                </tr>
                </thead>
                <tbody>
                  

                  @foreach ($ms as $pd)
                  <tr bgcolor="#eee">
                    <td colspan="12">
                      <div class="font-weight-bold">{{ $pd->getSKPD->namaskpd }}</div> 
                      <div class="font-italic">{{ $pd->getUK->nama_unitkerja }}</div> 
                       
                  </tr>
                  @if(!empty($pd->id_kegiatan))
                  {{-- <tr bgcolor="#f7f7f7">
                    <td colspan="9">
                      <div class="font-weight-normal ">{{ $pd->getKEG->namakeg }} <span class="badge badge-dark">{{ $pd->getKEG->alias }}</span></div> 
                    </td>
                    <td class="col-md-1"> <a href="{{ URL::to('/admin/print_msind/'.$pd->getKEG->alias) }}" target="_blank" class="btn btn-success btn-block"> <i class="fa fa-print"></i> Print </a> </td>
                  </tr> --}}
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $pd->tahun }}</td>
                      <td >
                        <div class="font-weight-normal ">{{ $pd->getKEG->namakeg }} <span class="badge badge-dark">{{ $pd->getKEG->alias }}</span></div>
                      </td>
                      <td class="">
                        
                        @if(empty($pd->{'1_1'}))
                             
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/1/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-info my-1"> <i class="fa fa-check-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/1/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif
                    </td>
                      <td>
                        @if(empty($pd->{'2_1a'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/2/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-info my-1"> <i class="fa fa-check-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/2/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                      <td>
                        @if(empty($pd->{'3_1'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/3/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-info my-1"> <i class="fa fa-exclamation-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/3/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                      <td class="">
                        @if(empty($pd->{'4_1'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/4/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-success my-1"> <i class="fa fa-exclamation-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/4/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                      <td>
                        @if(empty($pd->{'5_1'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/5/'.$pd->id) }}"  class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-success my-1"> <i class="fa fa-exclamation-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/5/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                      <td>
                        @if(empty($pd->{'6_1'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/6/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-success my-1"> <i class="fa fa-exclamation-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/6/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                      <td>
                        @if(empty($pd->{'7_1'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/7/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-success my-1"> <i class="fa fa-exclamation-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/7/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                      <td>
                        @if(empty($pd->{'8_1'}))
                            <div class=" small p-1 border  text-center rounded border-dark bg-danger my-1"> <i class="fa fa-exclamation-circle"></i> Data belum ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/8/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Isi </a>
                            </div>
                        @else
                            <div class=" small p-1 border  text-center rounded border-dark bg-success my-1"> <i class="fa fa-exclamation-circle"></i> Data Sudah ada</div>
                            <div>
                                <a href="{{ URL::to('/admin/addtahap_mskeg/8/'.$pd->id) }}"   class="btn btn-success btn-block "> <i class="fa fa-edit"></i> Edit </a>
                            </div>
                        @endif    
                    </td>
                    <td><a href="{{ URL::to('/admin/view_mskeg/'.$pd->id) }}" target="_blank" class="btn btn-info btn-block"> <i class="fa fa-eye"></i> View </a></td>
                  </tr>
                  @endif  

                  @endforeach
                </tbody>
            </table>
          </div>
                     
    </div>
</div>    

@endsection

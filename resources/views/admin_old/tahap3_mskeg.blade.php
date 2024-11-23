@extends($layout)
@section('styles')
 
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts') 
<script src="{{ url('js/jquery.chained.js') }}"></script>
  <script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>
  <script> 
    $ ( function () {
        $('.select2').select2();
    })
    $(document).ready(function () {
        $("#unitkerja").chained("#instansi");
        $("#kegiatan").chained("#unitkerja");

        $("#bidang").chained("#urusan");
    });
  </script>
<script>
  function getval(sel)
  {
    // var appurl = {!! json_encode(url('/select_instansi')) !!};
    //   var deturl = appurl+"/"+idpd_asal+"/"+jenis;
    var idjen = sel.value;
      //alert(idjen);
    if(idjen==2){
      $("#viewinstansi").show();
    } 
    else{
      $("#viewinstansi").hide();
    }
      
  }
  function getrekom(sel)
  {
    // var appurl = {!! json_encode(url('/select_instansi')) !!};
    //   var deturl = appurl+"/"+idpd_asal+"/"+jenis;
    var idrekom = sel.value;
      //alert(idjen);
    if(idrekom==1){
      $("#labelrekom").show();
    } 
    else{
      $("#labelrekom").hide();
    }
      
  }
</script>
@endsection
@section('content')
<div class="">
    <div class="row justify-content-center">
	    <div class="col-md-12">
            <div class="card card-solid card-info">
                <div class="card-header"><b>MS-KEG :: Tahap {{ $id1 }} </b></div>
                <form action="{{url('admin/post-addtahap_mskeg')}}" method="POST" id="regForm" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                
										{{ csrf_field() }}
                    
                    <div class="form-group row" id="idinsta">
                      <label for="" class="col-sm-2 col-form-label"> Instansi/Perangkat Daerah  </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control  form-control-sm" id="nama_instansi" name="nama_instansi" value="{{ $ms->getSKPD->namaskpd}}" readonly>
                      </div>
                  </div>
                  
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="inputFirstName">Nama Unit Kerja</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control  form-control-sm" id="nama_unitkerja" name="nama_unitkerja" value="{{ $ms->getUK->nama_unitkerja}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  form-control-sm" id="nama_kegiatan" name="nama_kegiatan" value="{{ $ms->getKEG->namakeg}}" readonly>
                        </div>          
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="inputFirstName">Kode Kegiatan</label>
                      <div class="col-sm-2">
                          <input class="form-control form-control-sm  " id="kodekeg" type="text" name="kodekeg" value="{{ $ms->kdkeg }} " readonly  required />
                      </div> 
                    </div> 
                     
                    
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputFirstName">Tahun Anggaran</label>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm  " id="tahun" type="text" name="tahun" value="{{ $ms->tahun }}" readonly required />
                            

                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputFirstName">ID MS-KEG <span class="badge badge-info">alias</span></label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm  " id="idkeg" type="text" name="idkeg" value="{{ $ms->alias }}" readonly required />
                        </div> 
                      </div> 
                  
                     
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 bg-dark p-2   "><b>III. PERENCANAAN DAN PERSIAPAN</b> </div>
                        <div class="col-md-12 mt-0 border p-1">
                            <div class="form-group ">
                                <label class="col-sm-2 col-form-label mb-2" for="">3.1. Latar Belakang Kegiatan</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control ket" id="3_1" name="3_1" rows="8" required> {{ $ms->{'3_1'} }} </textarea>
                                </div> 
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2 col-form-label mb-2" for="">3.2. Tujuan Kegiatan</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control ket" id="3_2" name="3_2" rows="8" required> {{ $ms->{'3_2'} }} </textarea>
                                </div> 
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2 col-form-label mb-2" for="">3.3. Rencana Jadwal Kegiatan</label>
                                <div class="col-sm-12">
                                     <table class="table table-sm table-bordered col-md-6">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">Jenis</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Awal <br> <small>(thn/bln/tgl)</small></th>
                                                <th class="text-center">Akhir <br> <small>(thn/bln/tgl)</small> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rfj as $rj)
                                            <?php 
                                                 $msd=App\Models\Mskeg_detail_33::where([
                                                        ['id_ref','=',$rj->id],
                                                        ['id_mskeg','=',$ms->id],
                                                        
                                                    ])->first();
                                                if(!empty($msd->id)){
                                                    $tglawal=$msd->tglawal;
                                                    $tglakhir=$msd->tglakhir;
                                                }else{
                                                    $tglawal="Data Kosong";
                                                    $tglakhir="Data Kosong";
                                                }
                                            ?>
                                            <tr>
                                                <td>{{ $rj->id }} 
                                                  <input class="" id="idref" type="hidden" name="idref" value="{{ $rj->id }}" /> 
                                                  <input class="" id="idmskeg" type="hidden" name="idmskeg" value="{{ $ms->id }}" /> 
                                                  <input class="" id="idkeg" type="hidden" name="idkeg" value="{{ $ms->id_kegiatan }} " /> 
                                                
                                                </td>
                                                <td>{{ $rj->tipe }}</td>
                                                <td>{{ $rj->nama }}</td>
                                                <td class="col-md-2"><input class="form-control form-control-sm  datepicker  " id="tglawal{{ $rj->id }}" type="text" name="tglawal{{ $rj->id }}" value="{{ $tglawal }} " readonly required /></td>
                                                <td class="col-md-2"><input class="form-control form-control-sm  datepicker  " id="tglakhir{{ $rj->id }}" type="text" name="tglakhir{{ $rj->id }}" value="{{ $tglakhir }} " readonly required /></td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                     </table>
                                </div> 
                            </div>
                        </div>
                              
                        
                    </div>
                </div>
                <div class="card-body"></div>
                <div class="card-footer">
                    <input type="hidden" class="form-control" id="idna" name="idna" value="{{$ms->id}}" readonly>
                    <input type="hidden" class="form-control" id="tahap" name="tahap" value="{{$id1}}" readonly>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
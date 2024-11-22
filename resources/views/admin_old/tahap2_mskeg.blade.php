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
                        <div class="col-md-12 bg-dark p-2   "><b>II. PENANGGUNG JAWAB</b> </div>
                        <div class="col-md-12 mt-0 border p-1">
                           
                            <div class="form-group">
                                <label class="col-sm-4 col-form-label mb-2" for="">2.1. Unit Eselon Penanggung Jawab</label>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label ml-5" for="">Eselon I</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm  " id="2_1a" type="text" name="2_1a" value="{{ $ms->{'2_1a'} }}"  required />
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label ml-5" for="">Eselon II</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm  " id="2_1b" type="text" name="2_1b" value="{{ $ms->{'2_1b'} }}"  required />
                                        </div> 
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-form-label mb-2" for="">2.2. Penanggung Jawab Teknis (setingkat Eselon 3)</label>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label ml-5" for="">Jabatan</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm  " id="2_2a" type="text" name="2_2a" value="{{ $ms->{'2_2a'} }}"  required />
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label ml-5" for="">Alamat</label>
                                        <div class="col-sm-5">
                                            <input class="form-control form-control-sm  " id="2_2b" type="text" name="2_2b" value="{{ $ms->{'2_2b'} }}"  required />
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label ml-5" for="">Telpon/Faksimile</label>
                                        <div class="col-sm-2">
                                            <input class="form-control form-control-sm  " id="2_2c" type="text" name="2_2c" value="{{ $ms->{'2_2c'} }}" placeholder="Telepon" required />
                                        </div> 
                                        <div class="col-sm-2">
                                            <input class="form-control form-control-sm  " id="2_2d" type="text" name="2_2d" value="{{ $ms->{'2_2d'} }}" placeholder="Faksimile"  required />
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label ml-5" for="">Email</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm  " id="2_2e" type="text" name="2_2e" value="{{ $ms->{'2_2e'} }}"  required />
                                        </div> 
                                    </div>
                            </div>
                            

                        </div>
                        
                    </div>
                </div>
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
 
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
</script>
@endsection
@section('content')
<div class=" ">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">Edit Kegiatan</div>
                    <form action="{{url('admin/post-editkegiatan')}}" method="POST" id="regForm">
				    {{ csrf_field() }}
                    <div class="card-body">
                
                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Kode PD</label>
                        <div class="col-sm-1">
                          <input type="text" class="form-control" id="kdskpd" name="kdskpd" value="{{$pd->kdskpd}}" readonly >
                        </div>
                      </div> --}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Perangat Daerah / Unit Kerja</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="instansi" id="instansi" required>
                                <option value="">Pilih Instansi</option>
                                  @foreach ($skpd as $jd)  
                                  <option value="{{ $jd->id }}" @if($jd->id==$kg->id_instansi) selected @endif> {{ $kg->id_instansi }} {{ $jd->namaskpd }}</option>
                                
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
                              <option class="<?php echo $bid->id_instansi?>" value="{{ $bid->id }}" @if($bid->id==$kg->id_unitkerja) selected @endif > {{ $bid->id }}. {{ $bid->nama_unitkerja }} </option>
                            @endforeach   
                            </select>
                          </div>
                      </div>
                      <hr>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Urusan</label>
                      <div class="col-sm-5">
                        <select class="form-control form-control-sm" name="urusan" id="urusan" required>
                            <option value="">Pilih Urusan</option>
                            @foreach ($urus as $ur)  
                            <option class="" value="{{ $ur->kdurusan }}" @if($ur->kdurusan==$kg->kdurusan) selected @endif>   {{ $ur->namaurusan }} </option>
                          @endforeach   
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Bidang</label>
                      <div class="col-sm-5">
                        <select class="form-control form-control-sm" name="bidang" id="bidang" required>
                            <option value="">Pilih Bidang</option>
                            @foreach ($bidang as $bi)  
                            <option class="<?php echo $bi->kdurusan?>" value="{{ $bi->kdbidang }}"  @if($bi->kdbidang==$kg->kdbidang) selected @endif>  {{ $bi->namabidang }} </option>
                          @endforeach   
                          </select>
                        </div>
                    </div>


                  
                  <hr>

                      <div class="form-group row">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Kelompok</label>
                          <div class="col-sm-4">
                              <select class="form-control form-control-sm" name="kelompok" id="kelompok" required>
                                  <option value="">Pilih Kelompok Kegiatan</option>
                                  <option value="1"  @if($kg->kelompok==1) selected @endif>1. Sensus</option>
                                  <option value="2"  @if($kg->kelompok==2) selected @endif>2. Survei</option>
                                  <option value="3"  @if($kg->kelompok==3) selected @endif>3. Kompilasi Produk Administrasi</option>
                                  <option value="4"  @if($kg->kelompok==4) selected @endif>4. Cara Lain Sesuai Perkembangan IT</option>
                                  
                            </select>
                          </div>          
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">ID Kegiatan</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm  " id="idkeg" type="text" name="idkeg" value="{{ $uniqid }}" readonly required />
                        
                        
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Kode Kegiatan</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm @error('kdkeg') is-invalid @enderror" id="kdkeg" type="text" name="kdkeg" value="{{ $kg->kdkeg }}" required />
                        
                        
                        </div> 
                      </div>   
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Kegiatan</label>
                        <div class="col-sm-8">
                        <input class="form-control form-control-sm @error('namakeg') is-invalid @enderror" id="namakeg" type="text" name="namakeg" value="{{ $kg->namakeg }}" required />
                        
                        
                        </div> 
                      </div>  
                    </div>
                    <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{$kg->id}}" >
                    <button class="btn btn-primary " type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
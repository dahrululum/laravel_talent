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
<div class="">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card card-solid card-info">
                <div class="card-header"><b>Add Kegiatan </b></div>
                <form action="{{url('admin/post-addkegiatan')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
                
										{{ csrf_field() }}
                    
                    <div class="form-group row" id="idinsta">
                      <label for="inputEmail" class="col-sm-3 col-form-label"> Instansi/Perangkat Daerah  </label>
                      <div class="col-sm-6">
                      <select class="form-control form-control-sm" name="instansi" id="instansi" required>
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
                            <option class="<?php echo $bid->id_instansi?>" value="{{ $bid->id }}"> {{ $bid->id }}. {{ $bid->nama_unitkerja }} </option>
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
                            <option class="" value="{{ $ur->kdurusan }}">  {{ $ur->namaurusan }} </option>
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
                            <option class="<?php echo $bi->kdurusan?>" value="{{ $bi->kdbidang }}">   {{ $bi->namabidang }} </option>
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
                                <option value="1">1. Sensus</option>
                                <option value="2">2. Survei</option>
                                <option value="3">3. Kompilasi Produk Administrasi</option>
                                <option value="4">4. Cara Lain Sesuai Perkembangan IT</option>
                                
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
                        <input class="form-control form-control-sm @error('kdkeg') is-invalid @enderror" id="kdkeg" type="text" name="kdkeg" placeholder="Kode Kegiatan" required />
                        
                        
                        </div> 
                      </div>   
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Kegiatan</label>
                        <div class="col-sm-8">
                        <input class="form-control form-control-sm @error('namakeg') is-invalid @enderror" id="namakeg" type="text" name="namakeg" placeholder="Nama Kegiatan" required />
                        
                        
                        </div> 
                      </div>                           
                    
                     
                     
                </div>
                
                <div class="card-footer">
                   
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
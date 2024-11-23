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
                <div class="card-header"><b>Add MS-KEG </b></div>
                <form action="{{url('admin/post-addmskeg')}}" method="POST" id="regForm" class="form-horizontal" enctype="multipart/form-data">
                  <div class="card-body">
                
										{{ csrf_field() }}
                    
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
                            <option class="<?php echo $bid->id_instansi?>" value="{{ $bid->id }}"> {{ $bid->id }}. {{ $bid->nama_unitkerja }} </option>
                          @endforeach   
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="kegiatan" id="kegiatan" required>
                                <option value="">Pilih  Kegiatan</option>
                                @foreach ($keg as $kg)  
                                <option class="<?php echo $kg->id_unitkerja?> <?php echo $kg->id_instansi?> " value="{{ $kg->id }}"> {{ $kg->id }}. {{ $kg->namakeg }} </option>
                              @endforeach   
                                
                          </select>
                        </div>          
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Kode Kegiatan</label>
                      <div class="col-sm-2">
                          <input class="form-control form-control-sm  " id="kodekeg" type="text" name="kodekeg" value=" "  required />
                      </div> 
                    </div> 
                     
                    
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Tahun Anggaran</label>
                        <div class="col-sm-1">
                            {{-- <input class="form-control form-control-sm  " id="tahun" type="text" name="tahun" value="{{ $thnna }}" readonly required /> --}}
                            <select class="form-control form-control-sm " name="tahun" id="tahun" required>
                              <option value="">Pilih Tahun</option>
                              @for($i=2019; $i<=2030; $i++)
                              <option class=" " value="{{ $i }}" @if($i==$thnna) selected @endif> {{ $i }} </option>
                              @endfor   
                              
                        </select>

                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">ID MS-KEG <span class="badge badge-info">alias</span></label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm  " id="idkeg" type="text" name="idkeg" value="{{ $uniqid }}" readonly required />
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Cara Pengumpulan Data</label>
                        <div class="col-sm-3">
                          <select class="form-control form-control-sm " name="carakumpul" id="carakumpul" required>
                            <option value="">--- Pilih Cara Pengumpulan data ---</option>
                            @foreach ($rf1 as $rf1)  
                                <option class="" value="<?php echo $rf1->kode?>"> {{  $rf1->kode }}. {{  $rf1->nama }} </option>
                              @endforeach   
                          </select>
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Sektor Kegiatan</label>
                        <div class="col-sm-4">
                          <select class="form-control form-control-sm " name="sektorkeg" id="sektorkeg" required>
                            <option value="">--- Pilih Sektor Kegiatan ---</option>
                            @foreach ($rf2 as $rf2)  
                                <option class="" value="<?php echo $rf2->kode?>"> {{  $rf2->kode }}. {{  $rf2->nama }} </option>
                              @endforeach   
                          </select>
                        </div> 
                      </div>   
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Jenis Kegiatan</label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm " name="jeniskeg" id="jeniskeg" required>
                            <option value="">--- Pilih Jenis Kegiatan ---</option>
                            @foreach ($rf3 as $rf3)  
                                <option class="" value="<?php echo $rf3->kode?>"> {{  $rf3->kode }}. {{  $rf3->nama }} </option>
                              @endforeach   
                          </select>
                        </div> 
                      </div>   
                      <hr>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-primary" for="">Jika kegiatan statistik sektoral, apakah mendapatkan rekomendasi kegiatan statistik dari BPS?</label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm " name="adarekom" id="adarekom"  onchange="getrekom(this);" required>
                            <option value=""> Pilih  Rekomendasi </option>
                            <option value="1">1. Ya</option>
                            <option value="2">2. Tidak</option>
                            
                          </select>
                        </div> 
                        <div class="col-sm-5" id="labelrekom" style="display:none;">
                          <input class="form-control form-control-sm @error('konsep') is-invalid @enderror" id="namarekom" type="text" name="namarekom" placeholder="Isi Identitas Rekomendasi" required />
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
 
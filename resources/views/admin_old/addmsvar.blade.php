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
</script>
@endsection
@section('content')
<div class="">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card card-solid card-info">
                <div class="card-header"><b>Add MS-VAR </b></div>
                <form action="{{url('admin/post-addmsvar')}}" method="POST" id="regForm" class="form-horizontal" enctype="multipart/form-data">
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
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Kegiatan</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm" name="kegiatan" id="kegiatan" required>
                                <option value="">Pilih  Kegiatan</option>
                                @foreach ($keg as $kg)  
                                <option class="<?php echo $kg->id_unitkerja?> <?php echo $kg->id_instansi?> " value="{{ $kg->id }}"> {{ $kg->id }}. {{ $kg->namakeg }} </option>
                              @endforeach   
                                
                          </select>
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
                        <label class="col-sm-3 col-form-label" for="inputFirstName">ID Variabel</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm  " id="idvar" type="text" name="idvar" value="{{ $uniqid }}" readonly required />
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Variabel</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('namavar') is-invalid @enderror" id="namavar" type="text" name="namavar" placeholder="Nama Variabel" required />
                        </div> 
                      </div>   
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Alias Variabel</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('namaalias') is-invalid @enderror" id="namaalias" type="text" name="namaalias" placeholder="Alias Variabel" required />
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Konsep</label>
                        <div class="col-sm-8">
                            <input class="form-control form-control-sm @error('konsep') is-invalid @enderror" id="konsep" type="text" name="konsep" placeholder="Konsep" required />
                            
                        </div> 
                        
                      </div>   
                      
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Definisi</label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('definisi') is-invalid @enderror" id="definisi" type="text" name="definisi" placeholder="definisi" required /> --}}
                            <textarea class="form-control " id="definisi" name="definisi" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisadef" class="text-danger"></span></div>
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="">Referensi Pemilihan</label>
                        <div class="col-sm-8">
                          <textarea class="form-control " id="refpemilihan" name="refpemilihan" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisarefpil" class="text-danger"></span></div>

                            
                            {{-- <textarea class="form-control ket " id="refpemilihan" name="refpemilihan" rows="8" required>  </textarea> --}}
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Referensi Waktu</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('refwaktu') is-invalid @enderror" id="refwaktu" type="text" name="refwaktu" placeholder="ref waktu" required />
                            {{-- <textarea class="form-control ket " id="refwaktu" name="refwaktu" rows="8" required>  </textarea> --}}
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Tipe Data</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('tipedata') is-invalid @enderror" id="tipedata" type="text" name="tipedata" placeholder="tipe data" required />
                        </div> 
                      </div>  
                      
                  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Klasifikasi Isian</label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('klasifikasi') is-invalid @enderror" id="klasifikasi" type="text" name="klasifikasi" placeholder="klasifikasi" required /> --}}
                            <textarea class="form-control " id="klasifikasi" name="klasifikasi" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisaklas" class="text-danger"></span></div>

                        </div> 
                      </div>    
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Aturan Validasi</label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('aturan') is-invalid @enderror" id="aturan" type="text" name="aturan" placeholder="aturan" required /> --}}
                            <textarea class="form-control " id="aturan" name="aturan" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisaaturan" class="text-danger"></span></div>
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="">Kalimat Pertanyaan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control " id="pertanyaan" name="pertanyaan" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisatanya" class="text-danger"></span></div>
                        </div> 
                      </div>
                       
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Dapat Diakses Umum ?</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="akses_umum" id="akses_umum" required>
                                <option value="">Pilih  </option>
                                <option value="1">1. Ya</option>
                                <option value="2">2. Tidak</option>
                            </select>
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
 
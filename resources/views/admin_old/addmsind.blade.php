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
                <div class="card-header"><b>Add MS-IND </b></div>
                <form action="{{url('admin/post-addmsind')}}" method="POST" id="regForm" class="form-horizontal" enctype="multipart/form-data">
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
                        <label class="col-sm-3 col-form-label" for="inputFirstName">ID Indikator</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm  " id="idind" type="text" name="idind" value="{{ $uniqid }}" readonly required />
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Indikator</label>
                        <div class="col-sm-8">
                            <input class="form-control form-control-sm @error('namaind') is-invalid @enderror" id="namaind" type="text" name="namaind" placeholder="Nama Indikator" required />
                        </div> 
                      </div>   
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Konsep</label>
                        <div class="col-sm-8">
                            <input class="form-control form-control-sm @error('konsep') is-invalid @enderror" id="konsep" type="text" name="konsep" placeholder="Konsep" required />
                            {{-- <textarea class="form-control ket " id="konsep" name="konsep" rows="8" required>  </textarea> --}}
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
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Interpretasi</label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('interpretasi') is-invalid @enderror" id="interpretasi" type="text" name="interpretasi" placeholder="interpretasi" required /> --}}
                            <textarea class="form-control " id="interpretasi" name="interpretasi" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisaint" class="text-danger"></span></div>
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Metode/Rumus Penghitungan</label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('rumus') is-invalid @enderror" id="rumus" type="text" name="rumus" placeholder="rumus" required /> --}}
                            <textarea class="form-control " id="rumus" name="rumus" rows="8" required>  </textarea>
                            <div class="  font-weight-bold text-right">Sisa Karakter : <span id="sisarum" class="text-danger"></span></div>
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Upload Image/Gambar Rumus </label>
                        <div class="col-sm-5">
                         
                          <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="select_file">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                             
                            
                          </div>
                          <p class="font-italic small text-primary mt-1">*) tipe file: <b>jpeg,jpg,png;</b>  max size: <b>2 MB;</b>  dimension: <b> 300x300 pxl</b></p>
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Ukuran</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('ukuran') is-invalid @enderror" id="ukuran" type="text" name="ukuran" placeholder="ukuran" required />
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Satuan</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('satuan') is-invalid @enderror" id="satuan" type="text" name="satuan" placeholder="satuan" required />
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Klasifikasi Penyajian</label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('klasifikasi') is-invalid @enderror" id="klasifikasi" type="text" name="klasifikasi" placeholder="klasifikasi" required /> --}}
                            <textarea class="form-control " id="klasifikasi" name="klasifikasi" rows="8" required>  </textarea>
                            <div class="font-weight-bold text-right">Sisa Karakter : <span id="sisaklas" class="text-danger"></span></div>
                        </div> 
                      </div>    
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Indikator Komposit</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="ind_komposit" id="ind_komposit" required>
                                <option value="">Pilih Indikator Komposit</option>
                                <option value="1">1. Ya</option>
                                <option value="2">2. Tidak</option>
                            </select>
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Indikator Pembangunan <span class="text-primary">(Publikasi Ketersediaan)</span> </label>
                        <div class="col-sm-8">
                            <textarea class="form-control " id="ind_pembangunan_pub" name="ind_pembangunan_pub" rows="8">  </textarea>
                             
                            <div class="font-weight-bold text-right">Sisa Karakter : <span id="sisaindpub" class="text-danger"></span></div>
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Indikator Pembangunan <span class="text-primary">(Nama)</span> </label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('ind_pembangunan_nama') is-invalid @enderror" id="ind_pembangunan_nama" type="text" name="ind_pembangunan_nama" placeholder="Indikator pembangunan nama" required /> --}}
                            <textarea class="form-control " id="ind_pembangunan_nama" name="ind_pembangunan_nama" rows="8">  </textarea>
                             
                            <div class="font-weight-bold text-right">Sisa Karakter : <span id="sisaindnama" class="text-danger"></span></div>

                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Variabel Pembangunan <span class="text-danger">(Kegiatan Penghasil)</span> </label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('var_pembangunan_keghasil') is-invalid @enderror" id="var_pembangunan_keghasil" type="text" name="var_pembangunan_keghasil" placeholder="Variabel pembangunan Kegiatan" required />
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Variabel Pembangunan <span class="text-danger">(Kode Kegiatan)</span> </label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('var_pembangunan_kdkeg') is-invalid @enderror" id="var_pembangunan_kdkeg" type="text" name="var_pembangunan_kdkeg" placeholder="Variabel pembangunan Kode Kegiatan" required />
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Variabel Pembangunan <span class="text-danger">(Nama)</span> </label>
                        <div class="col-sm-8">
                            {{-- <input class="form-control form-control-sm @error('var_pembangunan_nama') is-invalid @enderror" id="var_pembangunan_nama" type="text" name="var_pembangunan_nama" placeholder="Variabel pembangunan Nama" required /> --}}
                            <textarea class="form-control " id="var_pembangunan_nama" name="var_pembangunan_nama" rows="8">  </textarea>
                             
                            <div class="font-weight-bold text-right">Sisa Karakter : <span id="sisavarnama" class="text-danger"></span></div>

                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Level Estimasi </label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('estimasi') is-invalid @enderror" id="estimasi" type="text" name="estimasi" placeholder=" estimasi" required />
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
 
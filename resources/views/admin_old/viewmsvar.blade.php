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
                <div class="card-header"><b>View MS-VAR </b>:: {{ $ind->namavar }}</div>
                <form action="#" method="POST" id="regForm" class="form-horizontal" enctype="multipart/form-data">
                  <div class="card-body">
                
										{{ csrf_field() }}
                    
                    <div class="form-group row border-bottom" id="idinsta">
                      <label for="inputEmail" class="col-sm-3 col-form-label"> Instansi/Perangkat Daerah  </label>
                      <div class="col-sm-6">
                        {{ $ind->getSKPD->namaskpd }}  
                      {{-- <select class="form-control form-control-sm" name="instansi" id="instansi" readonly disabled>
                        <option value="">Pilih Instansi</option>
                          @foreach ($skpd as $jd)  
                          <option value="{{ $jd->id }}" @if($jd->id==$ind->id_instansi) selected @endif>  {{ $jd->namaskpd }}</option>
                        
                        @endforeach
                        
                      </select> --}}
                      </div>
                  </div>
                  
                    <div class="form-group row border-bottom">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Unit Kerja</label>
                      <div class="col-sm-5">
                        {{ $ind->getUK->nama_unitkerja }}  
                        {{-- <select class="form-control form-control-sm" name="unitkerja" id="unitkerja" readonly disabled >
                            <option value="">Pilih Unit Kerja</option>
                            @foreach ($unit as $bid)  
                            <option class="<?php echo $bid->id_instansi?>" value="{{ $bid->id }}" @if($bid->id==$ind->id_unitkerja) selected @endif>  {{ $bid->nama_unitkerja }} </option>
                          @endforeach   
                          </select> --}}
                        </div>
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Kode Kegiatan</label>
                        <div class="col-sm-8">
                            {{ $ind->getKEG->kdkeg }}  
                           
                        </div>          
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            {{ $ind->getKEG->namakeg }}  
                            {{-- <select class="form-control form-control-sm" name="kegiatan" id="kegiatan" required readonly disabled >
                                <option value="">Pilih  Kegiatan</option>
                                @foreach ($keg as $kg)  
                                <option class="<?php echo $kg->id_unitkerja?> <?php echo $kg->id_instansi?> " value="{{ $kg->id }}" @if($kg->id==$ind->id_kegiatan) selected @endif> {{ $kg->kdkeg }}. {{ $kg->namakeg }} </option>
                              @endforeach   
                                
                          </select> --}}
                        </div>          
                    </div>
                    
                     
                     
                    <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Tahun Anggaran</label>
                        <div class="col-sm-1">
                            {{ $ind->tahun }}
                            {{-- <input class="form-control form-control-sm  " id="tahun" type="text" name="tahun" value="{{ $thnna }}" readonly required />
                            <select class="form-control form-control-sm " name="tahun" id="tahun" required readonly disabled >
                                <option value="">Pilih Tahun</option>
                                @for($i=2019; $i<=2030; $i++)
                                <option class=" " value="{{ $i }}" @if($i==$ind->tahun) selected @endif> {{ $i }} </option>
                                @endfor   
                                
                          </select> --}}
                        </div> 
                      </div> 
                    <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">ID Variabel</label>
                        <div class="col-sm-2">
                            {{ $ind->alias }}
                            {{-- <input class="form-control form-control-sm  " id="idind" type="text" name="idind" value="{{ $ind->alias }}" readonly required /> --}}
                        </div> 
                      </div> 
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="">2. Nama Variabel</label>
                        <div class="col-sm-9">
                            {{ $ind->namavar }}
                            {{-- <input class="form-control form-control-sm @error('namaind') is-invalid @enderror" id="namaind" type="text" name="namaind" value="{{ $ind->namaind }}" required readonly disabled  /> --}}
                        </div> 
                      </div>   
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">3. Alias</label>
                        <div class="col-sm-9">
                            {{ $ind->alias }} 
                            {{-- <input class="form-control form-control-sm @error('konsep') is-invalid @enderror" id="konsep" type="text" name="konsep" value="{{ $ind->konsep }}" required />
                            <textarea class="form-control ket " id="konsep" name="konsep" rows="8" required> {{ $ind->konsep }} </textarea> --}}
                        </div> 
                      </div>   
                      
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">4. Konsep</label>
                        <div class="col-sm-9">
                            {!! $ind->konsep !!}
                            {{-- <input class="form-control form-control-sm @error('definisi') is-invalid @enderror" id="definisi" type="text" name="definisi" value="{{ $ind->definisi }}" required />
                            <textarea class="form-control ket " id="definisi" name="definisi" rows="8" required> {{ $ind->definisi }} </textarea> --}}
                        </div> 
                      </div>  
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">5. Definisi</label>
                        <div class="col-sm-9">
                            {!! $ind->definisi !!}
                            {{-- <input class="form-control form-control-sm @error('interpretasi') is-invalid @enderror" id="interpretasi" type="text" name="interpretasi" value="{{ $ind->interpretasi }}" required />
                            <textarea class="form-control ket " id="interpretasi" name="interpretasi" rows="8" required> {{ $ind->interpretasi }} </textarea> --}}
                        </div> 
                      </div>  
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">6. Referensi Pemilihan</label>
                        <div class="col-sm-8">
                            {!! $ind->refpilihan !!}
                            {{-- <input class="form-control form-control-sm @error('rumus') is-invalid @enderror" id="rumus" type="text" name="rumus" value="{{ $ind->rumus }}"  /> --}}
                        </div> 
                      </div>  
                       
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">7. Referensi Waktu</label>
                        <div class="col-sm-6">
                            {!! $ind->refwaktu !!}
                            {{-- <input class="form-control form-control-sm @error('ukuran') is-invalid @enderror" id="ukuran" type="text" name="ukuran" value="{{ $ind->ukuran }}" required /> --}}
                        </div> 
                      </div>
                      <div class="form-group row border-bottom" >
                        <label class="col-sm-3 col-form-label" for="inputFirstName">8. Tipedata</label>
                        <div class="col-sm-6">
                            {{ $ind->tipedata }}
                            {{-- <input class="form-control form-control-sm @error('satuan') is-invalid @enderror" id="satuan" type="text" name="satuan" value="{{ $ind->satuan }}" required /> --}}
                        </div> 
                      </div>
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">9. Klasifikasi Isian</label>
                        <div class="col-sm-6">
                            {!! $ind->klasifikasi !!}
                            {{-- <input class="form-control form-control-sm @error('klasifikasi') is-invalid @enderror" id="klasifikasi" type="text" name="klasifikasi" value="{{ $ind->klasifikasi }}" required /> --}}
                        </div> 
                      </div>    
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">10. Aturan Validasi</label>
                        <div class="col-sm-6">
                            {!! $ind->aturan !!}
                        </div> 
                      </div>  
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">11. Kalimat Pertanyaan </label>
                        <div class="col-sm-8">
                            {!! $ind->pertanyaan !!}
                            {{-- <textarea class="form-control ket " id="ind_pembangunan_pub" name="ind_pembangunan_pub" rows="8"> {{ $ind->ind_pembangunan_pub }} </textarea> --}}
                        </div> 
                      </div>  
                       
                      <div class="form-group row border-bottom">
                        <label class="col-sm-3 col-form-label" for="">12. Dapat Diakses Umum ?</label>
                        <div class="col-sm-2">
                            @if($ind->akses_umum==1)
                            Ya
                        @else
                            TIdak
                        @endif
                            {{-- <select class="form-control form-control-sm" name="akses_umum" id="akses_umum" readonly disabled>
                                <option value="">Pilih  </option>
                                <option value="1" @if($ind->akses_umum==1) selected @endif>1. Ya</option>
                                <option value="2" @if($ind->akses_umum==2) selected @endif>2. Tidak</option>
                            </select> --}}
                        </div> 
                      </div>  



                    
                     
                     
                </div>
                
                <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{$idna}}" >
                    <a href="<?= url('/admin/msvar'); ?>" class="btn btn-dark"><< Kembali</a>
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
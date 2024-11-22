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
                <div class="card-header"><b>Edit Data Nine Box</b></div>
                <form action="{{url('admin/post-editninebox')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
					{{ csrf_field() }}
                     
                   
                    <div class="form-group row  ">
                        <label class="col-sm-3 col-form-label" for="nip">N.I.P </label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm  " id="nip" type="number" name="nip" value="{{$ib->nip}}"  required   />
                        </div> 
                    </div> 
                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="namapeg">Nama Pegawai </label>
                        <div class="col-sm-5">
                            <input class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama" type="text" name="nama" value="{{$ib->nama}}" required />
                        </div> 
                    </div> 
                    <div class="form-group row  ">
                        <label class="col-sm-3 col-form-label" for="namapeg">Instansi/Unit Kerja </label>
                        <div class="col-sm-5">
                            <input class="form-control form-control-sm @error('namainstansi') is-invalid @enderror" id="namainstansi" type="text" name="namainstansi" value="{{$ib->nama_instansi}}" required readonly />
                        </div> 
                    </div>  

                    <div class="form-group row  ">
                        <label class="col-sm-3 col-form-label" for="namapeg">Nama Jabatan </label>
                        <div class="col-sm-5">
                            <input class="form-control form-control-sm @error('namajabatan') is-invalid @enderror" id="namajabatan" type="text" name="namajabatan" value="{{$ib->jabatan}}" required readonly />
                        </div> 
                    </div>  
                    <div class="form-group row  ">
                        <label class="col-sm-3 col-form-label" for="jenisjabatan">Jenis Jabatan</label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm " name="id_jenis_jabatan" id="id_jenis_jabatan"  required>
                            <option value=""> Pilih  Jenis Jabatan </option>
                            <option value="1" @if($ib->id_jenis_jabatan==1) selected @endif>1. JPT</option>
                            <option value="2" @if($ib->id_jenis_jabatan==2) selected @endif>2. Administrator</option>
                            <option value="3" @if($ib->id_jenis_jabatan==3) selected @endif>3. Pengawas</option>
                            <option value="4" @if($ib->id_jenis_jabatan==4) selected @endif>4. Pelaksana</option>
                            <option value="5" @if($ib->id_jenis_jabatan==5) selected @endif>5. Fungsional</option>
                            
                          </select>
                        </div> 
                    </div>
                     
                      {{-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nilai Inovasi</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm @error('nilai_inovasi') is-invalid @enderror" id="nilai_inovasi" type="number" name="nilai_inovasi" value="{{$np->nilai_inovasi}}" step=".01"  required />
                        </div> 
                      </div>   
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nilai Prestasi</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm @error('nilai_prestasi') is-invalid @enderror" id="nilai_prestasi" type="number" name="nilai_prestasi" value="{{$np->nilai_prestasi}}" step=".01" required />
                        </div> 
                      </div>     --}}
                      
                    <div class="row">
                        <div class="col-sm-5 bg-light border p-0 mx-1">
                            <div class="col-sm-12 text-danger bg-dark p-2"> <b>SUMBU X</b> [KINERJA]</div>
                            <div class="col-sm-12 p-2">
                                <div class="form-group row border-bottom ">
                                    <label class="col-sm-5 col-form-label" for=" ">Nilai SKP </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_skp') is-invalid @enderror" id="nilai_skp" type="number" name="nilai_skp" value="{{$ib->nilai_skp}}" step=".01" required />
                                    </div> 
                                </div> 
                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label" for=" ">Nilai Inovasi </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_inovasi') is-invalid @enderror" id="nilai_inovasi" type="number" name="nilai_inovasi" value="{{$ib->nilai_inovasi}}" step=".01" required />
                                    </div> 
                                </div>
                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label" for=" ">Nilai Prestasi </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_prestasi') is-invalid @enderror" id="nilai_prestasi" type="number" name="nilai_prestasi" value="{{$ib->nilai_prestasi}}" step=".01" required />
                                    </div> 
                                </div>
                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label text-danger" for=" ">Riwayat Indisipliner </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_indisipliner') is-invalid @enderror" id="nilai_indisipliner" type="number" name="nilai_indisipliner" value="{{$ib->nilai_indisipliner}}" step=".01" required />
                                    </div> 
                                </div>

                            </div>
                            
                        </div>
                        <div class="col-sm-5 bg-light border p-0 mx-1">
                            <div class="col-sm-12 text-danger bg-dark p-2"> <b>SUMBU Y</b> [POTENSI]</div>
                            <div class="col-sm-12 p-2">
                                <div class="form-group row border-bottom ">
                                    <label class="col-sm-5 col-form-label" for=" ">Nilai Kompetensi </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_kompetensi') is-invalid @enderror" id="nilai_kompetensi" type="number" name="nilai_kompetensi" value="{{$ib->nilai_kompetensi}}" step=".01" required />
                                    </div> 
                                </div> 
                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label" for=" ">Nilai Kualifikasi </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_kualifikasi') is-invalid @enderror" id="nilai_kualifikasi" type="number" name="nilai_kualifikasi" value="{{$ib->nilai_kualifikasi}}" step=".01" required />
                                    </div> 
                                </div>
                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label" for=" ">Riwayat Jabatan </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_riwayat_jabatan') is-invalid @enderror" id="nilai_riwayat_jabatan" type="number" name="nilai_riwayat_jabatan" value="{{$ib->nilai_riwayat_jabatan}}" step=".01" required />
                                    </div> 
                                </div>

                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label" for=" ">Riwayat Diklat </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_riwayat_diklat') is-invalid @enderror" id="nilai_riwayat_diklat" type="number" name="nilai_riwayat_diklat" value="{{$ib->nilai_riwayat_diklat}}" step=".01" required />
                                    </div> 
                                </div>
                                <div class="form-group row border-bottom">
                                    <label class="col-sm-5 col-form-label" for=" ">Nilai Kecerdasan Umum </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm @error('nilai_kecerdasan') is-invalid @enderror" id="nilai_kecerdasan" type="number" name="nilai_kecerdasan" value="{{$ib->nilai_kecerdasan}}" step=".01" required />
                                    </div> 
                                </div>

                            </div>
                            
                        </div>
                    </div>

                                             
                    
                     
                     
                </div>
                
                <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{$ib->id}}">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
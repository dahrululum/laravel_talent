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
                <div class="card-header"><b>Edit Nilai Inovasi/Prestasi </b></div>
                <form action="{{url('admin/post-editnipotinpres')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
					{{ csrf_field() }}
                     
                   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="nip">N.I.P </label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm  " id="nip" type="number" name="nip" value="{{$np->nip}}"  required />
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="namapeg">Nama Pegawai </label>
                        <div class="col-sm-5">
                        <input class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama" type="text" name="nama" value="{{$np->nama}}" required />
                        
                        
                        </div> 
                      </div>   
                      <hr>
                      <div class="form-group row">
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
                      </div>    
                      <hr>
                      <div class="form-group row  p-1">
                        
                        <div class="col-sm-6  border border-light p-1">
                        <div class="col-sm-12 text-danger bg-dark p-2">NOTE:</div>
                            <table class="table table-sm table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center">Nilai Inovasi/Prestasi</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td @class(['text-center text-bold col-sm-2'])>10</td>
                                        <td @class(['text-left col-sm-5 '])>Tk. Nasional</td>
                                    </tr>
                                    <tr>
                                        <td @class(['text-center text-bold col-sm-2', 'font-bold' => true])>7.5</td>
                                        <td @class(['text-left col-sm-5 '])>Tk. Daerah</td>
                                    </tr>
                                     <tr>
                                        <td @class(['text-center text-bold col-sm-2'])>5</td>
                                        <td @class(['text-left col-sm-5 '])>Tk. PD</td>
                                    </tr>
                                     <tr>
                                        <td @class(['text-center text-bold col-sm-2'])>0</td>
                                        <td @class(['text-left col-sm-5 '])>Tidak Ada</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         


                      </div>                       
                    
                     
                     
                </div>
                
                <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{$np->id}}">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
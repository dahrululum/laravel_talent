@extends($layout)
@section('styles')
 
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts') 
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
                <div class="card-header"><b>Add Unit Kerja </b></div>
                <form action="{{url('admin/post-addunitkerja')}}" method="POST" id="regForm" class="form-horizontal">
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
                    <label class="col-sm-3 col-form-label" for="inputFirstName">ID Unit Kerja</label>
                    <div class="col-sm-2">
                    <input class="form-control form-control-sm  " id="idunit" type="text" name="idunit" value="{{ $uniqid }}" readonly required />
                    
                    
                    </div> 
                  </div> 
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Unit Kerja</label>
                      <div class="col-sm-5">
                            <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="nama" type="text" name="nama" placeholder="Nama unitkerja" required />
                            @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>
                    </div>
                                             
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Eselon</label>
                      <div class="col-sm-2">
                        <select class="form-control form-control-sm" name="eselon" id="eselon" required>
                          <option value="">Pilih Eselon</option>
                          <option value="2">Eselon II</option>
                          <option value="3">Eselon III</option>
                          <option value="4">Eselon IV</option>
                          
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
 
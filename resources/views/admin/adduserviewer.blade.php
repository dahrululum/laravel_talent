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
                <div class="card-header"><b>Add User Viewer </b></div>
                <form action="{{url('admin/post-addviewer')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
                
										{{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label"> Level User</label>
                      <div class="col-sm-2">
                        <select class="form-control form-control-sm " name="level" id="level" readonly required>
                         
                          <option value="3">Viewer/Pimpinan </option>
                          {{-- <option value="3">Operator PD </option>
                          <option value="4">Viewer </option> --}}
                        </select>
                      </div>
                      
                    </div>
                    {{-- <div class="form-group row" id="idinsta">
                      <label for="inputEmail" class="col-sm-3 col-form-label"> Instansi/Perangkat Daerah  </label>
                      <div class="col-sm-6">
                      <select class="form-control form-control-sm" name="instansi" id="instansi" required>
                        <option value="">Pilih Instansi</option>
                          @foreach ($allpd as $jd)  
                          <option value="{{ $jd->id }}">  {{ $jd->namaskpd }}</option>
                        
                        @endforeach
                        
                      </select>
                      </div>
                    </div> --}}
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Lengkap</label>
                      <div class="col-sm-5">
                            <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nama Lengkap" required />
                            @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">N.I.P </label>
                        <div class="col-sm-2">
                              <input class="form-control form-control-sm @error('nip') is-invalid @enderror" id="nip" type="text" name="nip" placeholder="Nomor Induk Pegawai " />
                              @if ($errors->has('nip'))
                              <span class="error">{{ $errors->first('nip') }}</span>
                              @endif  
                          </div>
                    </div>
                                             
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputEmailAddress">Email/username</label>
                      <div class="col-sm-3">
                            <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" required />
                            @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                                  @endif
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputPassword">Password</label>
                      <div class="col-sm-3">
                            <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Enter password" required />
                            <p class="help-block text-orange small"> *) Min. 6 Karakter </p>
                            @if ($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                                  @endif
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
 
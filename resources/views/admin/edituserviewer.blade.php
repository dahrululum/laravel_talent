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
        <form action="{{url('admin/post-editviewer')}}" method="POST" id="regForm">
										{{ csrf_field() }}
            <div class="card card-solid card-info">
                <div class="card-header"><b>Edit User Viewer</b></div>

                <div class="card-body">
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label text-info">Level User  </label>
                        <div class="col-sm-2">
                        <select class="form-control form-control-sm " name="level" id="level"  readonly required>
                           
                          <option value="3" <?php if($user->level=="3"){echo"selected";}?>>Viewer  </option>
                          
                        </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row" >
                        <label for="inputEmail" class="col-sm-3 col-form-label">Pilih Instansi  </label>
                        <div class="col-sm-6">
                        <select class="form-control form-control-sm select2 " name="instansi" id="instansi" required>
                          <option value="">Pilih Instansi</option>
                            @foreach ($allpd as $jd)  
                            <option value="{{ $jd->id }}" <?php if($user->id_instansi==$jd->id){echo"selected";}?>>  {{ $jd->namaskpd }}</option>
                          
                          @endforeach
                          
                        </select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                      <label class=" col-sm-3 col-form-label" for="inputFirstName">Nama Lengkap</label>
                        <div class="col-sm-5">
                            <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{$user->name}}" />
                            @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">N.I.P </label>
                        <div class="col-sm-2">
                              <input class="form-control form-control-sm @error('nip') is-invalid @enderror" id="nip" type="text" name="nip" placeholder="Nomor Induk Pegawai " value="{{$user->nip}}" />
                              @if ($errors->has('nip'))
                              <span class="error">{{ $errors->first('nip') }}</span>
                              @endif  
                          </div>
                      </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputEmailAddress">Email</label>
                                  <div class="col-sm-5">
                        <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" value="{{$user->email}}" readonly />
                          @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                          @endif
                                  </div>
                    </div>
                   
                    
                         
                </div>
             
            <div class="card-footer">
                    <button class="btn btn-primary " type="submit">Edit</button>
            </div>
        </div> 
        </form>
    </div>
</div>
@endsection
 
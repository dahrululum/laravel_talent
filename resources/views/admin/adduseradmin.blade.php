@extends($layout)

@section('content')
<div class="row p-3">

	<div class="col-md-8">
            <div class="card card-solid card-primary">
                <div class="card-header h5">Add User Administrator</div>
                <form action="{{url('admin/post-adduseradmin')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
                
										{{ csrf_field() }}
                    <div class="form-group row">
                      <label class=" col-sm-2" for="inputFirstName">Nama Lengkap</label>
                      <input class="form-control form-control-sm  col-sm-5 @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nama Lengkap" />
                        @if ($errors->has('name'))
                          <span class="error">{{ $errors->first('name') }}</span>
                          @endif  
                    </div>
                    <div class="form-group row">
                      <label class=" col-sm-2 text-danger" for="">NIP </label>
                      <input class="form-control form-control-sm col-sm-4 @error('nip') is-invalid @enderror" id="nip" type="number" name="nip" placeholder="N.I.P Lengkap" />
                        @if ($errors->has('nip'))
                          <span class="error">{{ $errors->first('nip') }}</span>
                          @endif  
                    </div>                        
                    <div class="form-group row">
                      <label class="col-sm-2 text-danger" for="inputEmailAddress">Email</label>
                      <input class="form-control form-control-sm col-sm-3 @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" />
                      @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                                  @endif
                    </div>
                    <div class="form-group row">
                      <label class=" col-sm-2 text-danger" for="inputusername">Username</label>
                      <input class="form-control form-control-sm col-sm-4 @error('username') is-invalid @enderror" id="username" type="text" aria-describedby="usernamehelp" name="username" placeholder="Enter Username" />
                      @if ($errors->has('username'))
                        <span class="error">{{ $errors->first('username') }}</span>
                                  @endif
                    </div>
                    <div class="form-group row">
                      <label class=" col-sm-2 text-danger" for="inputPassword">Password</label>
                      <input class="form-control form-control-sm col-sm-4 @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                      @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                                  @endif
                    </div>
                     
                </div>
                <div class="card-footer">
                    <input class="form-control" id="level" type="hidden" name="level" value="1" />
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
  </div>
  <div class="col-md-4  ">
     <div class="card card-info card-solid  ">
      <div class="card-header">Note:</div>
      <div class="card-body">
       <p> <b>N.I.P</b> tidak boleh kosong, dikarenakan NIP tersebut sebagai sarana untuk login langsung ke Menu admin Assessment   </p>
        <hr>

      </div>
     </div>
  </div>
</div>
@endsection
 
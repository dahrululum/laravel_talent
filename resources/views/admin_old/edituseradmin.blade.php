@extends($layout)

@section('content')
<form action="{{url('admin/post-edituseradmin')}}" method="POST" id="regForm">
  {{ csrf_field() }}
 
            <div class="card card-solid card-primary">
                <div class="card-header h5">Edit User Administrator</div>

                <div class="card-body">
                  
                        <div class="form-group">
                          <label class=" mb-1" for="inputFirstName">Nama Lengkap</label>
                          <input class="form-control form-control-sm col-sm-6 @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{$user->name}}" />
                          @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>
                        <div class="form-group">
                          <label class=" mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control form-control-sm col-sm-4 @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" value="{{$user->email}}" readonly />
                              @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                              @endif
                        </div>
                        <div class="form-group">
                          <label class=" mb-1 text-danger" for="inputPassword">Password</label>
                          <input class="form-control form-control-sm col-sm-3 @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                          @if ($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                                      @endif
                                      <span class="small text-danger">*) Minimal 6 karakter</span>
                        </div>
                        {{-- <div class="form-group">
                        <label class=" mb-1 text-danger" for="inputusername">Username</label>
                        <input class="form-control @error('username') is-invalid @enderror" id="inputusername" type="username" aria-describedby="usernamehelp" name="username" placeholder="Enter Username" value="{{$user->username}}" />
                            @if ($errors->has('username'))
                                <span class="error">{{ $errors->first('username') }}</span>
                            @endif
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="inputEmail" class=" mb-1">Level</label>
                            <select class="form-control" name="level" id="level" required>
                              <option value="1">Administrator </option>
                            </select>
                        </div> --}}
                        
                  
                </div>
                <div class="card-footer">
                  <div class="form-group ">
                    <input type="hidden" id="level" name="level" value="1">
                    <input type="hidden" id="idna" name="idna" value="{{ $user->id }}">
                    
                    <button class="btn btn-primary " type="submit">Edit User</button>
                  </div>
                </div>
            </div>

 
</form>
@endsection
 
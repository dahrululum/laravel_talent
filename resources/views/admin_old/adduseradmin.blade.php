@extends($layout)

@section('content')
 
            <div class="card card-solid card-primary">
                <div class="card-header h5">Add User Administrator</div>
                <form action="{{url('admin/post-adduseradmin')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
                
										{{ csrf_field() }}
                    <div class="form-group">
                      <label class=" mb-1" for="inputFirstName">Nama Lengkap</label>
                      <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nama Lengkap" />
                        @if ($errors->has('name'))
                          <span class="error">{{ $errors->first('name') }}</span>
                          @endif  
                    </div>
                                             
                    <div class="form-group">
                      <label class=" mb-1 text-danger" for="inputEmailAddress">Email</label>
                      <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" />
                      @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                                  @endif
                    </div>
                    <div class="form-group">
                      <label class=" mb-1 text-danger" for="inputusername">Username</label>
                      <input class="form-control @error('username') is-invalid @enderror" id="username" type="text" aria-describedby="usernamehelp" name="username" placeholder="Enter Username" />
                      @if ($errors->has('username'))
                        <span class="error">{{ $errors->first('username') }}</span>
                                  @endif
                    </div>
                    <div class="form-group">
                      <label class=" mb-1 text-danger" for="inputPassword">Password</label>
                      <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Enter password" />
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
 
@endsection
 
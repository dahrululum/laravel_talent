@extends($layout)

@section('content')
<div class="">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card card-solid card-primary">
                <div class="card-header"><h5><b>Reset Password</b></h5></div>

                <div class="card-body">
                <form action="{{url('admin/post-changepass')}}" method="POST" id="regForm">
										{{ csrf_field() }}
                                         
                                            <div class="form-group">
												<label class=" mb-1" for="inputFirstName">Nama Lengkap</label>
												<input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{$user->name}}" />
												 @if ($errors->has('name'))
												  <span class="error">{{ $errors->first('name') }}</span>
												  @endif  
											</div>
                                             
                                            <div class="form-group">
												<label class=" mb-1" for="inputEmailAddress">Email</label>
												<input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" value="{{$user->email}}" readonly />
												@if ($errors->has('email'))
												  <span class="error">{{ $errors->first('email') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label class=" mb-1 " for="inputPassword">Password Lama</label>
												<input class="form-control " id="inputPassword" type="text" name="passwordold" value="{{$user->password}}" readonly />
												@if ($errors->has('password'))
												  <span class="error">{{ $errors->first('password') }}</span>
												@endif
											</div>
                                            <div class="form-group">
												<label class="text-info mb-1" for="inputPassword">Password Baru</label>
												<input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="text" name="password" value="" required  /> <p class="text-danger">*) Min. 6 karakter</p>
												@if ($errors->has('password'))
												  <span class="error">{{ $errors->first('password') }}</span>
												@endif
											</div>
                                            <div class="form-group mt-4 mb-0">
                                            
								                <button class="btn btn-primary btn-block" type="submit">Reset</button>
											</div>
                                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
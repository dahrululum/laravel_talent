@extends('site.index')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
<div class="">
    <div class="row justify-content-center p-1">
        
        <div class="col-md-10 alert alert-danger alert-dismissible">
            <form method="POST" action="{{url('admin/postlogin')}}" class="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email" class="text-light">{{ __('Username / Email ') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="text-light">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                 
                <div class="form-group">
                    
                        <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    
                </div>
            </form>
            
            
        </div>
        <div class="col-md-12 mb-1">
            <img src="{{url('images/access_denied.png')}}" class=" img-fluid rounded mx-auto d-block">
        </div>
        {{-- <div class="col-md-12 mb-1">
            <img src="{{url('images/bg-login-gub.jpg')}}" class=" img-fluid rounded mx-auto d-block">
        </div> --}}
    </div>
@endsection
 
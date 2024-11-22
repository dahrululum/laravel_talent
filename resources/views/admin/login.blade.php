<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Administrator Talentpool :: Talentpool</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loginadmin.css') }}" rel="stylesheet">

</head>
<body class="login-page">
<?php $ynow=date('Y');?>
<div class="login-box">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card blur border-light mb-2">
                <div class="card-header blur">
                    <img src="{{ asset('images/logobabel.png') }}" class="avatarImg">
                    <h3 class="text-center text-light mt-3 ml-4"> Admin :: Talentpool  </h3>
                </div>

                <div class="card-body ">
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
                <div class="card-footer bg-light">
                
                    <small>Copyright @ BKPSDMD Provinsi Bangka Belitung  </small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('lte/dist/js/adminlte.js') }}"></script>
</body>

</html>

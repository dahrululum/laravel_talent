<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Peserta Talenta</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/loginpeserta.css') }}" rel="stylesheet">

</head>
<body class="login-page">
    
<div class="login-box">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card blur border-light mb-2">
                <div class="card-header blur">
                    <img src="{{ asset('images/iconbabel.png') }}" class="avatarImg">
                    <h3 class="text-center text-light mt-5"> LOGIN PESERTA TALENT </h3>
                    <h6 class="text-center text-light">Assessment Primadona</h6>
                </div>
                <div class="col-12 mt-2">
                    @if ($message = Session::get('error'))
       
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="d-flex">
                            <div>
                                <h4 class="alert-title">Maaf...</h4>
                                <div class="text-white">{{ $message }}.</div>
                            </div>
                            </div>
                                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                        </div>
                    @endif
                 
                </div>
                <div class="card-body ">
                    <form method="POST" action="{{url('postloginpeserta')}}" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="username" class="text-light">{{ __('Username  ') }}</label>

                            <div class="">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>

                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-light">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                               
                            </div>
                        </div>

                         
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>
                                    {{ __('Login') }} Peserta
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
                <?php 
                    $thn=date('Y');
                ?>
                    <small>Copyright @ BKPSDMD Prov Bangka Belittung <?=$thn?></small>
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

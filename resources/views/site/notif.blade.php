@extends('site.index')

@section('content')
<div class="p-2">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block mt-4">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
 @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block mt-4">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
</div>

<div class="">
    <div class="row justify-content-center p-1">
        
        <div class="col-md-10 alert alert-danger alert-dismissible">
             <h4>Halaman  kosong, silahkan ulangi kembali</h4>
            
        </div>
        <div class="col-md-12 mb-1">
            <img src="{{url('images/access_denied.png')}}" class=" img-fluid rounded mx-auto d-block">
        </div>
        {{-- <div class="col-md-12 mb-1">
            <img src="{{url('images/bg-login-gub.jpg')}}" class=" img-fluid rounded mx-auto d-block">
        </div> --}}
    </div>
@endsection
 
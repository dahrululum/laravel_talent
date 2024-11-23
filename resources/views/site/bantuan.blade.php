@extends('site.index')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
<div class=" mt-5">
    <div class="row justify-content-center p-1">
            <div class="col-md-12">
                
                <img src="{{url('images/bann2.jpeg')}}" class="col-md-12">
            </div>    
            {{-- <div class="col-md-5">
                <div class="card card-danger ">
                    <div class="card-header">Bantuan</div>
                    <div class="card-body">
                      <p>
                        <b>Sekretariat :</b>  Telp.(0717) 439314, Fax (0717) 439315 <br>
                        <b>Email :</b>  bkpsdmd@babelprov.go.id <br> <b>Website :</b>  bkpsdmd.babelprov@go.id
                      </p>
                      
                    </div>
                </div>
            </div> --}}
            
        </div>
    </div>
@endsection
 
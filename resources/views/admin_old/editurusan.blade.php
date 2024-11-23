@extends($layout)

@section('content')
<div class=" ">
    <div class=" ">
	
        <div class="col-md-12">
            <div class="card card-solid card-primary">
                <div class="card-header">Edit Urusan</div>
                    <form action="{{url('admin/post-editurusan')}}" method="POST" id="regForm">
				    {{ csrf_field() }}
                    <div class="card-body">
                
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">ID Urusan</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control form-control-sm" id="kdurusan" name="kdurusan" value="{{$kdurusan}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">No.Urut Urusan</label>
                        <div class="col-sm-1">
                          <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" class="form-control form-control-sm"  id="nourut" name="nourut" value="{{$pd->nourut}}"  >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Urusan </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="namaurusan" name="namaurusan" value="{{$pd->namaurusan}}" >
                        </div>
                      </div>
                      
                   
                    </div>
                    <div class="card-footer">
                    <input type="hidden" class="form-control" id="idna" name="idna" value="{{$pd->id}}" readonly>
                    <button class="btn btn-primary " type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
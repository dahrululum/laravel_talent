@extends($layout)

@section('content')
<div class=" ">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">Edit Instansi / Perangkat Daerah</div>
                    <form action="{{url('admin/post-editinstansi')}}" method="POST" id="regForm">
				    {{ csrf_field() }}
                    <div class="card-body">
                
                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Kode PD</label>
                        <div class="col-sm-1">
                          <input type="text" class="form-control" id="kdskpd" name="kdskpd" value="{{$pd->kdskpd}}" readonly >
                        </div>
                      </div> --}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Perangat Daerah / Unit Kerja</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namaskpd" name="namaskpd" value="{{$pd->namaskpd}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Eselon</label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm" name="eselon" id="eselon" required>
                            <option value="">Pilih Eselon</option>
                            <option value="2" @if($pd->eselon==2) selected @endif>Eselon II</option>
                            <option value="3" @if($pd->eselon==3) selected @endif>Eselon III</option>
                            <option value="4" @if($pd->eselon==4) selected @endif>Eselon IV</option>
                            
                        </select>
                        </div>
                      </div>
                   
                    </div>
                    <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{$pd->id}}" >
                    <button class="btn btn-primary " type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
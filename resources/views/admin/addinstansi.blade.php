@extends($layout)

@section('content')
<div class=" ">
    <div class=" ">
	
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"><b>Add Instansi/Perangkat Daerah</b> </div>
                    <form action="{{url('admin/post-addinstansi')}}" method="POST" id="regForm">
				    {{ csrf_field() }}
                    <div class="card-body">
                
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Kode PD</label>
                        <div class="col-sm-1">
                          <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" class="form-control form-control-sm" id="kdskpd" name="kdskpd" value="{{$nextid}}" required  >
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Perangkat Daerah / Instansi</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="namaskpd" name="namaskpd" value=" " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Eselon</label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm" name="eselon" id="eselon" required>
                            <option value="">Pilih Eselon</option>
                            <option value="2">Eselon II</option>
                            <option value="3">Eselon III</option>
                            <option value="4">Eselon IV</option>
                            
                        </select>
                        </div>
                      </div>
                       
                   
                    </div>
                    <div class="card-footer">
                    
                        <button class="btn btn-primary " type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
@extends($layout)

@section('content')
<div class=" ">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">Edit Unit Kerja</div>
                    <form action="{{url('admin/post-editunitkerja')}}" method="POST" id="regForm">
				    {{ csrf_field() }}
                    <div class="card-body">
                
                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Kode PD</label>
                        <div class="col-sm-1">
                          <input type="text" class="form-control" id="kdskpd" name="kdskpd" value="{{$pd->kdskpd}}" readonly >
                        </div>
                      </div> --}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Perangat Daerah / Instansi</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="instansi" id="instansi" required>
                                <option value="">Pilih Instansi</option>
                                  @foreach ($skpd as $jd)  
                                  <option value="{{ $jd->id }}" @if($jd->id==$kg->id_instansi) selected @endif> {{ $kg->id_instansi }} {{ $jd->namaskpd }}</option>
                                
                                @endforeach
                                
                              </select>
                        </div>
                      </div>
                     
                      <hr>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">ID Unit Kerja</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm  " id="idunit" type="text" name="idunit" value="{{ $uniqid }}" readonly required />
                        
                        
                        </div> 
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Unit Kerja</label>
                        <div class="col-sm-6">
                        <input class="form-control form-control-sm @error('namakeg') is-invalid @enderror" id="namaunitkerja" type="text" name="namaunitkerja" value="{{ $kg->nama_unitkerja }}" required />
                        
                        
                        </div> 
                      </div>  
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Eselon</label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm" name="eselon" id="eselon" required>
                            <option value="">Pilih Eselon</option>
                            <option value="2" @if($kg->eselon==2) selected @endif>Eselon II</option>
                            <option value="3" @if($kg->eselon==3) selected @endif>Eselon III</option>
                            <option value="4" @if($kg->eselon==4) selected @endif>Eselon IV</option>
                            
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{$kg->id}}" >
                    <button class="btn btn-primary " type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
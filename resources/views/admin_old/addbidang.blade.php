@extends($layout)

@section('content')
<div class="container">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
        <form action="{{url('admin/post-addbidang')}}" method="POST" id="regForm" class="form-horizontal">
                {{ csrf_field() }}
            <div class="card card-solid card-primary ">
                <div class="card-header"><b>Add Bidang </b></div>
               
                  <div class="card-body">
                   
                    <?php
                            $namaurusan="";
                            $kdurusan="";
                            $kdsuburusan=""; 
                    ?>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Kode Bidang</label>
                      <div class="col-sm-2">
                      <input class="form-control form-control-sm" id="kdbidang" type="text" name="kdbidang" value="{{$uniqid}}"  required readonly/>
                       
                      </div> 
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Urusan</label>
                        <div class="col-sm-3">
                        <select class="form-control form-control-sm" name="kdurusan" id="kdurusan" required>
                            <option value="">Pilih Urusan </option>
                            @foreach ($urus as $ju)  
                            <option value="{{ $ju->kdurusan }}"> {{ $ju->nourut }}. {{ $ju->namaurusan }} </option>
                          @endforeach   
                          </select>
                        </div>          
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">No. Urut Bidang</label>
                      <div class="col-sm-1">
                      <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" class="form-control form-control-sm" id="nourut"name="nourut"  required />
                       
                      </div> 
                    </div>
                    
                                             
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputEmailAddress">Nama Bidang</label>
                      <div class="col-sm-6">
                        <input class="form-control text-sm" id="namabidang" type="text" name="namabidang" placeholder="Nama Bidang tanpa nomor" />
                         
                      </div>
                    </div>
                     
                     
                     
                </div>
                <div class="card-footer">
                     
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
              
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
 
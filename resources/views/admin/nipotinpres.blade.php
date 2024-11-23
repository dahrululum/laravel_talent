@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
<!-- DataTables --> 

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable({ "pageLength": 100 });
    })
</script>

@endsection

 

@section('content')
 
   
     <form action="{{url('admin/post-importnipotinpres')}}" method="POST" id="FormUpload" enctype="multipart/form-data">
    {{ csrf_field() }}                   
    <div class="card card-info card-solid">
        <div class="card-header ">
            <h3 class="card-title">Import Data Inovasi dan Prestasi Pegawai </h3>
        </div>    
        <div class="card-body" >
             
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Upload File Excel </label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="filexls">
                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                    </div>
                  <p class="font-italic small text-primary mt-1">*) tipe file: <b>excel :: xls,xlsx;</b>  max size: <b>2 MB;</b> </p>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 border rounded p-2 bg-dark">
                
                    <p class="font-italic font-weight-bold text-white mt-1">*) NOTE: </p>
                    <p>Download File Excel Inovasi Prestasi</p>
                    <a href="{{ URL::to('/admin/exportnipotinpres') }}" class="btn btn-success btn-sm float-none" download> <i class="fa fa-table"></i>  Excel Inovasi Prestasi </a>
                </div>
            </div> 
            
        </div>
        <div class="card-footer"> 
             <button class="btn btn-primary btn-lg" type="submit" id="btnpilih"> <i class="fa fa-download"></i> Import</button>
            
             
        </div>
                   
    </div>
</form>
    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Nilai Potensi Inovasi dan Prestasi </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addnipotinpres')}}"><i class="fa fa-user"></i> Tambah Data </a>
                        <br><br>

                            <table class="table table-sm  table-hover table-bordered  " id="tablena">
                                <thead  class="bg-gray">
                                <tr>
                                    <th> No. </th>
                                    <th> NIP </th>
                                    <th> Nama Pegawai </th>
                                    <th> Nilai Inovasi </th>
                                    <th> Nilai Prestasi </th>
                                    <th> Status </th>
                                     
                                    <th class=" "> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0;?>
                                   @foreach ($ms as $pd)
                                     <?php 
                                        $no++; 
                                    ?>
                                    <tr bgcolor="">
                                        
                                        
                                        
                                        <td>{{ $pd->id }}</td>
                                        <td>{{ $pd->nip }}</td>
                                        <td>{{ $pd->nama }}</td>
                                        <td>{{ $pd->nilai_inovasi }}</td>
                                        <td>{{ $pd->nilai_prestasi }}</td>
                                        <td>{{ $pd->created_at }}</td>
                                        
                                        <td>
                                            
                                                <a class="btn btn-info btn-xs  p-1" href="{{ URL::to('/admin/editnipotinpres/'.$pd->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            
                                                <a class="btn btn-danger btn-xs  p-1" onClick="if(!confirm('Anda yakin Akan Hapus Data ini !'))return false;" href="{{ URL::to('/admin/delnipotinpres/'.$pd->id) }}"><i class="fa fa-trash"></i> Del</a>
                                        
                                        </td> 
                                        
                                        
                                    </tr>
                            

                                    @endforeach

                                     
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-12 col-xl-12">
                            <div class="d-flex justify-content-center">
                                    {!! $ms->links() !!}
                            </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>

@endsection

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
        $('#tablena').DataTable();
    })
</script>

@endsection

 

@section('content')
 
   
     
    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar MS-KEGIATAN </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addmskeg')}}"><i class="fa fa-user"></i> Tambah MS-KEG</a>
                        <br><br>

                            <table class="table table-sm table-hover  " id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Tahun </th>
                                    <th> Instansi/Unitkerja </th>
                                    <th> Kegiatan </th>
                                    
                                    
                                    <th class="col-2"> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ms as $pd)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pd->tahun }}</td>
                                        <td > <b>{{ $pd->getSKPD->namaskpd }}</b> 
                                            <div class="ml-2">{{ $pd->getUK->nama_unitkerja }}</div>
                                            
                                        </td>
                                        <td >  {{ $pd->getKEG->namakeg }} <span class="badge badge-dark">{{ $pd->alias }}</span> </td>
                                        
                                        <td><a class="btn btn-success " href="{{ URL::to('/admin/editmskeg/'.$pd->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                           
                                            <a class="btn btn-info" href="#" data-toggle="tooltip" data-placement="top" title="Copy"><i class="fa fa-copy"></i></a>
                                            <a class="btn btn-danger " data-toggle="tooltip" data-placement="top" title="Delete" onClick="if(!confirm('Anda yakin Akan Hapus Data ini !'))return false;" href="{{ URL::to('/admin/delmskeg/'.$pd->id) }}"><i class="fa fa-trash"></i></a>
                                             </td>
                                    </tr>
                                      

                                    @endforeach

                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

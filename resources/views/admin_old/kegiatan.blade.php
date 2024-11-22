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
 
   
     
    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Referensi Kegiatan </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addkegiatan')}}"><i class="fa fa-user"></i> Tambah Kegiatan</a>
                        <br><br>

                            <table class="table table-sm table-hover  " id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    
                                    <th> Instansi </th>
                                    <th> Nama Unit Kerja </th>
                                    <th> Nama Kegiatan </th>
                                    
                                    <th class="col-2"> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allpd as $pd)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td colspan="3"> <b>{{ $pd->namaskpd }}</b> </td>
                                         
                                        <td></td>
                                         
                                        
                                        
                                    </tr>
                                    @if(count($pd->getUK))
                                        @foreach($pd->getUK as $uk)
                                        <tr bgcolor="#eee">
                                            <td></td>
                                            <td colspan="2"><div class="ml-2"><b>Unit Kerja:</b>  {{ $uk->nama_unitkerja }}</div> </td>
                                            <td></td>
                                            <td></td>
                                            
                                            
                                            
                                        </tr>
                                        @if(count($uk->getKEG))
                                        @foreach($uk->getKEG as $kg)
                                        <tr bgcolor="#ddd">
                                            <td></td>
                                            <td colspan="2" >
                                                <div class=" ml-4">{{ $kg->getURUSAN->namaurusan }} <i>{{ $kg->getBIDANG->namabidang }}</i></div>
                                            </td>
                                            <td >  {{ $kg->namakeg }} <span class="badge badge-primary p-1">{{ $kg->kdkeg }}</span> <span class="badge badge-dark p-1">{{ $kg->alias }}</span></td>
                                             
                                            <td><a class="btn btn-success  " href="{{ URL::to('/admin/editkegiatan/'.$kg->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                       
                                                <a class="btn btn-danger  " onClick="if(!confirm('Anda yakin Akan Hapus Data ini !'))return false;" href="{{ URL::to('/admin/delkegiatan/'.$kg->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                                 </td>
                                            
                                            
                                            
                                        </tr>


                                        
                                        @endforeach
                                    @endif  


                                        @endforeach
                                    @endif  

                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

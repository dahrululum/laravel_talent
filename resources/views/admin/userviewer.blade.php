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
                            <h3 class="card-title">Daftar User Viewer/Pimpinan </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addviewer')}}"><i class="fa fa-user"></i> Tambah User Viewer / Pimpinan</a>
                        <br><br>

                            <table class="table table-sm table-hover  " id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    
                                    <th> Nama Lengkap </th>
                                    <th> Email </th>
                                     
                                    <th> NIP</th>
                                     
                                    
                                    <th> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelamars as $pelamar)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $pelamar->name }}</td>
                                        <td>{{ $pelamar->email }}</td>
                                       
                                        <td>{{ $pelamar->nip }}</td>
                                         
                                        
                                        <td><a class="btn btn-success " href="{{ URL::to('/admin/editviewer/'.$pelamar->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-info " href="{{ URL::to('/admin/resetpass/'.$pelamar->id) }}"><i class="fa fa-retweet"></i> Reset Pass</a>
                                        
                                        <a class="btn btn-danger " href="{{ URL::to('/admin/deluser/'.$pelamar->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

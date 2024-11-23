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
                            <h3 class="card-title">Daftar Operator </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addoperator')}}"><i class="fa fa-user"></i> Tambah User Operator</a>
                        <br><br>

                            <table class="table table-sm table-hover  " id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    
                                    <th> Username </th>
                                    <th> Email </th>
                                     
                                    <th> SKPD</th>
                                     
                                    
                                    <th> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelamars as $pelamar)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $pelamar->name }}</td>
                                        <td>{{ $pelamar->email }}</td>
                                       
                                        <td>{{ $pelamar->getSKPD->namaskpd }}</td>
                                         
                                        
                                        <td><a class="btn btn-success btn-block" href="{{ URL::to('/admin/editoperator/'.$pelamar->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <!--<a class="btn btn-info btn-xs" href="{{ URL::to('/admin/resetuser/'.$pelamar->id) }}"><i class="fa fa-retweet"></i> Reset Pass</a>
                                        !-->
                                        <a class="btn btn-danger btn-block" href="{{ URL::to('/admin/deluser/'.$pelamar->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

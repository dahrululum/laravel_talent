@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
<!-- DataTables -->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>

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
                            <h3 class="card-title">Daftar Setting URUSAN</h3>
                        </div>    
                    <div class="">
                        <div class="card-body table-responsive p-2" >
                            <a class="btn btn-success mb-2" href="{{ URL::to('/admin/addurusan')}}"><i class="fa fa-plus"></i> Tambah Urusan</a>

                          <table class="table table-hover table-bordered  table-head-fixed " id="tablena">
                                <thead>
                                <tr>
                                    <th width="130"> Proses </th>
                                    <th> No. Urut</th>
                                    <th> Kode Urusan</th>
                                    <th> Nama Urusan</th>
                                    
                                    
                                   

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0;?>
                                    @foreach ($skpd as $pd)
                                    
                                    <tr bgcolor="#eee">
                                    <td>
                                        <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editurusan/'.$pd->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/delurusan/'.$pd->id) }}" onclick="return confirm('Apakah Anda yakin akan menghapus Urusan ini?')"><i class="fa fa-trash"></i> Delete</a> 
                                          
                                    </td>
                                    <td>{{ $pd->nourut }}</td> 
                                    <td>{{ $pd->kdurusan }}</td>
                                    <td >{{ $pd->namaurusan }}</td>
                                         
                                        
                                        
                                    </tr>
                                      

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

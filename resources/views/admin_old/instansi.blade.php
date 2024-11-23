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
        $('#tablenas').DataTable();
    })
</script>

@endsection

 

@section('content')
 
     
     
    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">Daftar Instansi</h3>
                        </div>    
                    <div class="">
                        <div class="card-body table-responsive p-2" >
                        <a class="btn btn-success" href="{{ URL::to('/admin/addinstansi')}}"><i class="fa fa-plus"></i> Tambah Instansi</a>
                        <br><br>

                          <table class="table table-hover table-bordered text-nowrap table-head-fixed " id="tablena">
                                <thead>
                                <tr>
                                    <th width="130"> Proses </th>
                                    
                                    <th> Kdskpd</th>
                                    <th> Nama Instansi </th>
                                    <th> Eselon </th>
                                    
                                    

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0;?>
                                    @foreach ($skpd as $pd)
                                    
                                    <tr bgcolor="#eee">
                                    <td><a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editinstansi/'.$pd->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                         
                                        <a class="btn btn-danger btn-xs" onClick="if(!confirm('Anda yakin Akan Hapus Data ini !'))return false;" href="{{ URL::to('/admin/delinstansi/'.$pd->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                         
                                        <td>{{ $pd->kdskpd }}</td>
                                        <td >{{ $pd->namaskpd }}</td>
                                        <td >
                                            @if($pd->eselon==2)
                                            Eselon II
                                            @elseif($pd->eselon==3)
                                             Eselon III   
                                            @elseif($pd->eselon==4)
                                            Eselon IV
                                            @else
                                            Can aya
                                            @endif
                                            </td>
                                         
                                        
                                        
                                    </tr>
                                      

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

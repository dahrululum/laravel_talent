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
                            <h3 class="card-title">Daftar Unit Kerja </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addunitkerja')}}"><i class="fa fa-user"></i> Tambah Unit Kerja</a>
                        <br><br>

                            <table class="table table-sm  border " id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Instansi </th>
                                    <th> Nama Unit Kerja </th>
                                    <th> Eselon</th>
                                    <th> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allpd as $pd)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td colspan="2"> <b>{{ $pd->namaskpd }}</b> </td>
                                        <td class="font-weight-bold">@if($pd->eselon==2)
                                            Eselon II
                                            @elseif($pd->eselon==3)
                                             Eselon III   
                                            @elseif($pd->eselon==4)
                                            Eselon IV
                                            @else
                                            Can aya
                                            @endif
                                        </td>
                                        <td></td>
                                    </tr>
                                    @if(count($pd->getUK))
                                        @foreach($pd->getUK as $uk)
                                        <tr bgcolor="#eee">
                                            <td></td>
                                            <td colspan="2"><div class="ml-4"> {{ $uk->nama_unitkerja }} <span class="badge badge-info p-1">{{ $uk->alias }}</span></div> </td>
                                            <td>
                                                @if($uk->eselon==2)
                                                    Eselon II
                                                    @elseif($uk->eselon==3)
                                                    Eselon III   
                                                    @elseif($uk->eselon==4)
                                                    Eselon IV
                                                    @else
                                                    Can aya
                                                    @endif
                                            </td>
                                            <td><a class="btn btn-success " href="{{ URL::to('/admin/editunitkerja/'.$uk->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                       
                                                <a class="btn btn-danger " onClick="if(!confirm('Anda yakin Akan Hapus Data ini !'))return false;" href="{{ URL::to('/admin/delunitkerja/'.$uk->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                                 </td>
                                        </tr>
                                        @endforeach
                                    @endif  

                                    @endforeach

                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

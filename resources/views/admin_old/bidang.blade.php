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
        $('#tablena').DataTable( {
        "order": [[ 2, "asc" ]]
        });
    })
</script>

@endsection

 

@section('content')
   
    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Setting Bidang</h3>
                        </div>    
                    <div class="">
                        <div class="card-body table-responsive p-1" style=" ">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addbidang')}}"><i class="fa fa-plus"></i> Tambah Bidang</a>
                        <br><br>

                          <table class="table table-hover table-bordered  table-head-fixed " id="tablena">
                                <thead>
                                <tr>
                                    <th width="130"> Proses </th>
                                    <th> No. Urut</th>
                                    <th>  Urusan</th>
                                    <th> Kode Bidang</th>
                                    <th> Nama Bidang</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0;?>
                                    @foreach ($skpd as $pd)
                                    <?php 
                                          $urus = App\Models\Urusan::where('kdurusan', $pd->kdurusan)->first();
                                    ?>
                                    <tr bgcolor="#eee">
                                    <td><a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editbidang/'.$pd->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/delbidang/'.$pd->id) }}" onclick="return confirm('Apakah Anda yakin akan menghapus Bidang ini?')"><i class="fa fa-trash"></i> Delete</a>
                                        
                                          </td>
                                        <td>{{ $pd->nourut }}</td> 
                                        <td><b>{{ $urus->nourut }}. {{ $urus->namaurusan }}</b> <i class="text-sm text-danger">[{{ $pd->kdurusan }}]</i></td>
                                        <td>{{ $pd->kdbidang }}</td>
                                        <td >{{ $pd->namabidang }}</td>
                                         
                                        
                                        
                                    </tr>
                                      

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

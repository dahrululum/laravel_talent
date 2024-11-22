@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
 
<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{url('lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable();
        // $("input[data-bootstrap-switch]").each(function(){

            
        //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
        // });
    })
</script>
{{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
<script>
       
    
        $("[name='response']").on('change.bootstrapSwitch', function(e) {
            var idna = $(this).attr("value");
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'get',
                url: "{{url('admin/status-page-pegawai')}}",
                data: {
                    'statuspage': e.target.checked,
                    'idna'  : idna
                    
                },
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    window.location.reload();
                }
            });
        });
    
    //$("[name='response']").bootstrapSwitch();
     
</script>
@endsection
 

 
 

@section('content')
 
     
    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Navigasi Talent::Pegawai</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        

                            <table class="table table-sm table-hover text-nowrap" id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Nama Menu </th>
                                    <th> Status </th>
                                    <th> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($navs as $nav)
                                    <tr>
                                        <td>{{ $nav->id }}</td>
                                        <td>{{ $nav->nama_navigasi }}</td>
                                        <td>
                                            @if($nav->status==1)
                                               <span class="text-primary">Aktif</span> 
                                            @else
                                                <span class="text-danger">Tidak Aktif</span> 
                                            @endif
                                             </td>
                                        <td>
                                            <input id="toggle-event" name="response" type="checkbox" data-toggle="toggle" data-on-color="Aktif" data-off-color="Non Aktif" data-onstyle="success" data-offstyle="danger" data-width="100" data-size="small" @if($nav->status==1) checked @endif value="{{ $nav->id }}" >
                                            {{-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"> --}}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection

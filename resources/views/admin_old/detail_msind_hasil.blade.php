   
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
 
<!-- DataTables --> 

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        //$('#tablena').DataTable();
        $('#table1').DataTable( {
          "order": [[ 0, "asc" ]]
        });
        $('#table2').DataTable( {
          "order": [[ 0, "asc" ]]
        });

       
            
    })
</script>
 
 

 
<?php 
    if(Auth::guard('admin')->user()->level=="1")
    {
        $namalevel="Admin";
    }else{
        $namalevel="Operator";
    } 
    ?>

 
   
 
     
<div class="card card-dark card-solid">
    <div class="card-header ">
        <h3 class="card-title">Daftar Hasil MS-IND {{ $skpd1->namaskpd }} - {{ $unit1->nama_unitkerja }} </h3>
    </div>    
     
    <div class="card-body table-responsive p-0" >
        <table class="table table-hover table-bordered table-head-fixed " id="tablena">
            <thead>
                <tr >
                    <th class="bg-gray"> No.</th>
                    
                    <th class="bg-gray col-md-3"> Nama Indikator</th>
                    <th class="bg-gray col-md-2"> Konsep</th>
                    <th class="bg-gray col-md-2"> Definisi </th>
                    <th class="bg-gray col-md-2"> Interpretasi </th>
                    <th class="bg-gray col-md-2"> Metode/Rumus Penghitungan </th>
                      
                    <th class="bg-gray col-md-1"> Tahun </th>
                    
                    
                    

                </tr>
            </thead>
            <tbody>
                @if(count($ms))
                    @foreach ($ms as $pd)
                    <tr bgcolor="#eee">
                    <td colspan="7">
                        <div class="font-weight-bold">{{ $pd->getSKPD->namaskpd }}</div> 
                        <div class="font-italic">{{ $pd->getUK->nama_unitkerja }}</div> 
                        
                    </tr>
                    <tr bgcolor="#f7f7f7">
                    <td colspan="6">
                        <div class="font-weight-normal ">{{ $pd->getKEG->namakeg }}</div> 
                    </td>
                    <td class="col-md-1"> <a href="{{ URL::to('/admin/print_msind/'.$pd->getKEG->alias) }}" target="_blank" class="btn btn-success btn-block"> <i class="fa fa-print"></i> Print </a> </td>
                    </tr>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        
                        <td >{{ $pd->namaind }}</td>
                        <td>{{ $pd->konsep }}</td>
                        <td>{{ $pd->definisi }}</td>
                        <td>{{ $pd->interpretasi }}</td>
                        <td class="">@if(!empty($pd->file_rumus)) <img src="{{ asset('/uploads/'.$pd->file_rumus) }}" class="col-md-12"> @endif</td>
                        <td>{{ $pd->tahun }}</td>
                    </tr>
                    

                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Null</td>
                    </tr>
                @endif
            </tbody>
        </table>
    
</div>
</div>
 

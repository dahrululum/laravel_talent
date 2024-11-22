 
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
 
 
<!-- DataTables -->  
 <!-- Select2 --> 
<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    

    $ ( function () {
        $('#tablena').DataTable();
        $('.select2').select2();
    });
  
</script>

 
 
<div class="col-sm-12">
    <table class="table table-sm table-hover table-bordered " id="tablena">
        <thead  class="bg-dark">
        <tr>
            <th> No. </th>
            <th> NIP </th>
            <th> Nama Pegawai </th>
            <th> Jabatan </th>
            <th> SKP </th>
            <th> Inovasi </th>
            <th> Prestasi </th>
            <th> Indisipliner </th>
            <th> Kompetensi </th>
            <th> Kualifikasi </th>
            <th> Riwayat Jabatan </th>
            <th> Riwayat Diklat </th>
            <th> Kecerdasan Umum </th>
            <th> Nilai X</th>
            <th> Nilai Y </th>
            <th class=""> box </th>

        </tr>
        </thead>
        <tbody>
             
            <?php $no=0;?>
             
                @foreach ($indbox as $ib)
                        <?php 
                        $no++; 
                        // $peg =  (object) $pegs;
                        if($ib->id_jenis_jabatan=="1"){
                            $jenjab="JPT";
                        }elseif($ib->id_jenis_jabatan=="2"){
                            $jenjab="Administrator";
                        }elseif($ib->id_jenis_jabatan=="3"){
                            $jenjab="Pengawas";
                        }elseif($ib->id_jenis_jabatan=="4"){
                            $jenjab="Pelaksana";
                        }elseif($ib->id_jenis_jabatan=="5"){
                            $jenjab="Fungsional";
                        }else{
                            $jenjab="Non Job";
                        }

                        //ninebox
                        if(($ib->nilai_tb == 1) ){
                            $nilaitb="1";
                            $stylena="bg-danger";
                            
                        }elseif($ib->nilai_tb == 2){
                            $nilaitb="2";
                            $stylena="bg-danger";
                            
                        }elseif($ib->nilai_tb == 3){
                            $nilaitb="3";
                            $stylena="bg-danger";
                            
                        }elseif($ib->nilai_tb == 4){
                            $nilaitb="4";
                            $stylena="bg-warning";
                                
                        }elseif($ib->nilai_tb == 5){
                            $nilaitb="5";
                            $stylena="bg-warning";
                            
                        }elseif($ib->nilai_tb == 6){
                            $nilaitb="6";
                            $stylena="bg-warning";
                                
                        }elseif($ib->nilai_tb == 7){
                            $nilaitb="7";
                            $stylena="bg-success";
                            
                        }elseif($ib->nilai_tb == 8){
                            $nilaitb="8";
                            $stylena="bg-success";
                            
                        }elseif($ib->nilai_tb == 9){
                            $nilaitb="9";
                            $stylena="bg-primary";
                            
                        }else{
                            $nilaitb="-";
                            $stylena="bg-danger";
                            
                        }
                        ?>
                    <tr bgcolor="">
                        <td class="text-center"> {{ $no }}</td>
                        <td class="text-left"> {{ $ib->nip }}</td>
                        <td class="text-left"> {{ $ib->nama }}</td>
                        <td class="text-left"> {{ $ib->jabatan }} <em>[{{ $jenjab }}]</em></td>
                        <td class="text-center"> {{ $ib->nilai_skp }}</td>
                        <td class="text-center"> {{ $ib->nilai_inovasi }}</td>
                        <td class="text-center"> {{ $ib->nilai_prestasi }}</td> 
                        <td class="text-center"> {{ $ib->nilai_indisipliner }}</td> 
                        <td class="text-center"> {{ $ib->nilai_kompetensi }}</td>
                        <td class="text-center"> {{ $ib->nilai_kualifikasi }}</td> 
                        <td class="text-center"> {{ $ib->nilai_riwayat_jabatan }}</td>
                        <td class="text-center"> {{ $ib->nilai_riwayat_diklat }}</td>
                        <td class="text-center"> {{ $ib->nilai_kecerdasan }}</td> 
                        <td class="text-center"> {{ $ib->nilai_x }}</td>
                        <td class="text-center"> {{ $ib->nilai_y }}</td>
                        <td class="text-center p-2 mx-2"><div class="{{ $stylena }} text-center h3 p-2 ">{{ $nilaitb }}</div></td>
                        
                        
                    </tr>
            
    
                    @endforeach
        
               
           
             
        </tbody>
    </table>
</div>

 
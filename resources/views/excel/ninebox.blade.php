<table class="table table-bordered  " id="tableninebox">
    <thead  >
        <tr>
            <th> No. </th>
            <th> NIP </th>
            <th> Nama Pegawai </th>
            <th> Jenis Jabatan </th>
            <th> Jabatan </th>
            <th> Instansi/Unit Kerja </th>
            <th> SKP </th>
            <th> Inovasi </th>
            <th> Prestasi </th>
            <th> Indisipliner </th>
            <th> Kompetensi </th>
            <th> Kualifikasi </th>
            <th> Riwayat Jabatan </th>
            <th> Riwayat Diklat </th>
            <th> Kecerdasan Umum </th>
            <th> Nilai X </th>
            <th> Nilai Y </th>
            <th> Talent Box </th>
            
            
             
            

        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($model as $ib) { 
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
            <tr>
                <td>{{ $no }}</td>
                <td class="small"> {{  "`".$ib->nip }}</td>
                <td class="small"> {{ $ib->nama }}</td>
                <td>
                    @if($ib->id_jenis_jabatan==1)
                        JPT
                    @elseif ($ib->id_jenis_jabatan==2)
                        Administrator
                    @elseif ($ib->id_jenis_jabatan==3)
                        Pengawas
                    @elseif ($ib->id_jenis_jabatan==4)
                        Pelaksana
                    @elseif ($ib->id_jenis_jabatan==5)
                        Fungsional
                    @else
                        -
                    @endif
                    
                </td>
                <td class="small">{{ strtoupper($ib->detPeg->JABATAN)}}</td>
                <td class="small">{{ strtoupper($ib->detPeg->Instansi)}}</td>
                <td class="text-center">{{$ib->nilai_skp}}</td>
                <td class="text-center">{{$ib->nilai_inovasi}}</td>
                <td class="text-center">{{$ib->nilai_prestasi}}</td>
                <td class="text-center">{{$ib->nilai_indisipliner}}</td>
                <td class="text-center">{{$ib->nilai_kompetensi}}</td>
                <td class="text-center">{{$ib->nilai_kualifikasi}}</td>
                <td class="text-center">{{$ib->nilai_riwayat_jabatan}}</td>
                <td class="text-center">{{$ib->nilai_riwayat_diklat}}</td>
                <td class="text-center">{{$ib->nilai_kecerdasan}}</td>
                <td class="text-center">{{$ib->nilai_x}}</td>
                <td class="text-center">{{$ib->nilai_y}}</td>
                <td class="text-center p-2 mx-2"><div class="{{ $stylena }} text-center h3 p-2 ">{{ $nilaitb }}</div></td>
                
            </tr>
            

        <?php $no++; ?>
        <?php } ?>
         
    </tbody>
</table>
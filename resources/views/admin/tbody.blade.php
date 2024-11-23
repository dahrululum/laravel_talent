<tbody>
    <tr>
        <td>JPT {{ $idinsta }}</td>
        @for ($i=1; $i<=9; $i++)
        <?php 
            if(!empty($idinsta)){
                $jbox1=App\Models\IndikatorBox::where('nilai_tb',$i)
                    ->where('id_instansi',$idinsta)
                    ->where('id_jenis_jabatan',1)
                    ->count();
            }else{
                $jbox1=App\Models\IndikatorBox::where('nilai_tb',$i)
                    
                    ->where('id_jenis_jabatan',1)
                    ->count();
            }
        ?>
            <td class="text-center">  {{ $jbox1 }}</td>
        @endfor
        
         

    </tr>
    <tr>
        <td>Administrator</td>
        @for ($i=1; $i<=9; $i++)
        <?php 
           if(!empty($idinsta)){
                $jbox2=App\Models\IndikatorBox::where('nilai_tb',$i)
                    ->where('id_instansi',$idinsta)
                    ->where('id_jenis_jabatan',2)
                    ->count();
            }else{
                $jbox2=App\Models\IndikatorBox::where('nilai_tb',$i)
                    
                    ->where('id_jenis_jabatan',2)
                    ->count();
            }
        ?>
            <td class="text-center"> {{ $jbox2 }}</td>
        @endfor
         

    </tr>
    <tr>
        <td>Pengawas</td>
        @for ($i=1; $i<=9; $i++)
        <?php 
            if(!empty($idinsta)){
                $jbox3=App\Models\IndikatorBox::where('nilai_tb',$i)
                    ->where('id_instansi',$idinsta)
                    ->where('id_jenis_jabatan',3)
                    ->count();
            }else{
                $jbox3=App\Models\IndikatorBox::where('nilai_tb',$i)
                    
                    ->where('id_jenis_jabatan',3)
                    ->count();
            }
        ?>
            <td class="text-center"> {{ $jbox3 }}</td>
        @endfor

    </tr>
    <tr>
        <td>Pelaksana</td>
        @for ($i=1; $i<=9; $i++)
        <?php 
            if(!empty($idinsta)){
                $jbox4=App\Models\IndikatorBox::where('nilai_tb',$i)
                    ->where('id_instansi',$idinsta)
                    ->where('id_jenis_jabatan',4)
                    ->count();
            }else{
                $jbox4=App\Models\IndikatorBox::where('nilai_tb',$i)
                    
                    ->where('id_jenis_jabatan',4)
                    ->count();
            }
        ?>
            <td class="text-center"> {{ $jbox4 }}</td>
        @endfor

    </tr>
    <tr>
        <td>Fungsional</td>
        @for ($i=1; $i<=9; $i++)
        <?php 
           if(!empty($idinsta)){
                $jbox5=App\Models\IndikatorBox::where('nilai_tb',$i)
                    ->where('id_instansi',$idinsta)
                    ->where('id_jenis_jabatan',5)
                    ->count();
            }else{
                $jbox5=App\Models\IndikatorBox::where('nilai_tb',$i)
                    
                    ->where('id_jenis_jabatan',5)
                    ->count();
            }
        ?>
            <td class="text-center"> {{ $jbox5 }}</td>
        @endfor

    </tr>
     
</tbody>
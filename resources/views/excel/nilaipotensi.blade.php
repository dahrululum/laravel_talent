<table class="table table-bordered  " id="tablenilaipotensi">
    <thead>
    <tr>
        <th> NIP </th>
        <th> Nama </th>
        <th> Nilai Inovasi</th>
        <th> Nilai Prestasi</th>
        
    </tr>
    </thead>
    <tbody>
        <?php $no=0;?>
        @foreach ($ms as $pd)
        <?php 
        $no=$no+1; 
            
        ?>
        
        <tr>
            
            <td>{{ "`".$pd->nip }}</td>
            <td>{{ $pd->nama }}</td>
            <td>{{ $pd->nilai_inovasi }}</td>
            <td>{{ $pd->nilai_prestasi }}</td>
                
        </tr>
        @endforeach
    </tbody>
</table>
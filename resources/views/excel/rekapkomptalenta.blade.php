<table class="table table-hover  table-bordered " id="tablena">
    <thead>
        <tr class="bg-white">
            <th rowspan="2">No.</th>
            <th rowspan="2">Nama </th> 
            <th rowspan="2">N.I.P </th> 
            <th rowspan="2">Gol</th> 
            <th rowspan="2">Jabatan </th> 
            <th rowspan="2">Level SKJ </th> 
            <th colspan="11" class="text-center">Kompetensi Manajerial dan Sosial Kultural</th>
            <th colspan="9" class="text-center">Indikator Talent Box</th>
            <th rowspan="2"> <b style="writing-mode: tb-rl; transform: rotate(-180deg);">Nilai X (Potensial)</b></th>
            <th rowspan="2"> <b style="writing-mode: tb-rl; transform: rotate(-180deg);">Nilai Y (Kinerja)</b></th>
            <th rowspan="2" class="text-center">Kotak Talenta</th>
            <th rowspan="2" class="text-center">Saran Pengembangan</th>
            
        </tr>
        <tr class="bg-white">
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Integritas</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kerjasama</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Komunikasi</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Orientasi <br> Pada Hasil</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pelayanan Publik</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pengembangan Diri <br>dan Orang Lain</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Mengelola Perubahan</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pengambilan Keputusan</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Perekat Bangsa</b></th> 
            <th><b style="">JPM </b></th> 
            <th><b style="">Status Kompetensi</b></th> 
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">SKP</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Inovasi</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Prestasi</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Indisipliner</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kompetensi</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kualifikasi</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Pengalaman Jabatan</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Riwayat Diklat</b></th>
            <th><b style="writing-mode: tb-rl; transform: rotate(-180deg);">Kecerdasan Umum</b></th> 
        </tr>
           
    </thead>
    <tbody class="small">
        <?php $no = 1; ?>
        @foreach ($model as $ib)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $ib->nama }}</td>
            <td>{{"'".$ib->nip }}</td>
            <td>{{ $ib->detPeg->GOL }}</td>
            <td>{{ $ib->jabatan }}</td>
            <td class="text-center">{{ $ib->getKompetensi->levelskj }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_integritas }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_kerjasama }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_komunikasi }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_orientasi }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_pelayanan }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_pengembangan }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_perubahan }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_keputusan }}</td>
            <td class="text-center">{{ $ib->getKompetensi->nilai_perekat }}</td>
            <td class="text-center">{{ $ib->getKompetensi->jpm }}</td>
            <td class="text-center">{{ $ib->getKompetensi->kategori }}</td>
            <td class="text-center">{{ $ib->nilai_skp }}</td>
            <td class="text-center">{{ $ib->nilai_inovasi }}</td>
            <td class="text-center">{{ $ib->nilai_prestasi }}</td>
            <td class="text-center">{{ $ib->nilai_indisipliner }}</td>
            <td class="text-center">{{ $ib->nilai_kompetensi }}</td>
            <td class="text-center">{{ $ib->nilai_kualifikasi }}</td>
            <td class="text-center">{{ $ib->nilai_riwayat_jabatan }}</td>
            <td class="text-center">{{ $ib->nilai_riwayat_diklat }}</td>
            <td class="text-center">{{ $ib->nilai_kecerdasan }}</td>
            <td class="text-center">{{ $ib->nilai_x}}</td>
            <td class="text-center">{{ $ib->nilai_y }}</td>
            <td class="text-center">{{ $ib->nilai_tb }}</td>
            <td class="text-center">{{ $ib->uraian_tb }}</td>
        </tr>
        <?php $no++; ?>
        @endforeach
    </tbody>
</table>
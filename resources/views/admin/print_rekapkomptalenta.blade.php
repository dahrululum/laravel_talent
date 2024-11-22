<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PrintOut Rekap Kompetensi Talenta</title>

        <!-- Fonts -->
         <!-- Font Awesome -->
        <link rel="stylesheet" href="{{url('lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
          <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{url('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
          <!-- Theme style -->
        <link rel="stylesheet" href="{{ url ('lte/dist/css/adminlte_print.css') }}">
  <!-- overlayScrollbars -->
        <!-- Styles -->
        <style>
            body {
              font-size: 80%;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

          

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            @media print{
                
                .printna {
                    display:none;
                    }
            }
            
        </style>
        <script type="text/javascript"> 
          //  window.addEventListener("load", window.print());
        </script>
    </head>
    <body>
        
       
        <div class="flex-center position-top">
            
            <div class=" " style="border:0px double #000; padding:8px;">
                <div class="row printna fixed-top bg-dark mb-5">
                    <div class="col-md-12 p-1 ">
                       <a href="#" class="btn btn-primary float-left mx-2" onclick="window.print();return false;"><i class="fa fa-print"></i> Print</a>
                       <a href="{{ URL::to('/admin/export_rekapkomptalenta'.$arr_params) }}" class="btn btn-success float-left" ><i class="fa fa-print"></i> Excel</a>
                    </div>
                    <!-- /.col -->
                  </div> 
                <div class="row mt-5">     
                    <div class="col-sm-12 text-center ">
                    <div style="border:0px solid #000; width:100%; padding:4px;" class=" text-center mt-1">
                        <h3> <b>REKAPITULASI HASIL PEMETAAN KOMPETENSI DAN TALENTA PEGAWAI</b></h3>
                        <h5> PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG </h5>
                        {{-- <span><b> Total Pegawai :  {{ $jmpeg }}  </b> Orang</span> --}}
                    </div>
                    </div>
                </div>  
                 
                 
                <div class="row">
                   
                   <div class="col-md-12 table-responsive ">
                     
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
                         
                   </div>
                </div> 
                <div class="row">
                           
                    <div class="col-md-12 col-xl-12">
                      <div class="d-flex justify-content-center">
                           
                      </div>
                    </div>
                </div>
                  
            </div>
           
        
        </div>
        <br>
          
    </body>
</html>

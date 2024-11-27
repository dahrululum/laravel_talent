@extends('site.index_asn_admin')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
<div class=" ">
    <div class="row justify-content-center p-1">
                
            <div class="col-md-12">
                <div class="card card-info ">
                     
                    <div class="card-body ">
                        <div class="small-box bg-light mb-4">
                            <div class="inner border">
                                <h3>Kuadran Kotak Talenta Anda : {{ $indi->nilai_tb }} </h3>
                                <p class="text-primary">{{ $indi->uraian_tb }}</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="h4 text-center text-dark">
                                INDIKATOR DAN PEMBOBOTAN NINE BOX MANAJEMEN TALENTA
                            </div>
                            <div class="h5 text-center text-dark">
                                PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG  
                            </div>
                        </div>            
                        <div>
                            <table class="table table-bordered table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO.</th>
                                        <th>INDIKATOR</th>
                                        <th class="col-2">BOBOT/NILAI MAKSIMAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">1.</td>
                                        <td class="font-weight-bold">SUMBU X (POTENSIAL)</td>
                                        <td class="font-weight-bold text-center">  {{ $indi->nilai_x }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">1. Kompetensi (Predikat Hasil Asesmen)</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_kompetensi }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">2. Kualifikasi (Jenjang Pendidikan Formal)</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_kualifikasi }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">3. Pengalaman Kerja (Masa Kerja)</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_riwayat_jabatan }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">4. Riwayat Diklat </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_riwayat_diklat }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">5. Kecerdasan Umum</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_kecerdasan }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">2.</td>
                                        <td class="font-weight-bold">SUMBU Y (KINERJA)</td>
                                        <td class="font-weight-bold text-center"> {{ $indi->nilai_y }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">1. Predikat SKP Tahun Terakhir</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_skp }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">2. Inovasi</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_inovasi }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal">3. Prestasi (Status Pegawai Berprestasi)</td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_prestasi }} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold"></td>
                                        <td class="font-weight-normal text-danger ">4. Hukuman Disiplin </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_indisipliner }} </td>
                                    </tr>
                                  
                                </tbody>

                            </table>

                        </div>    
                        <div class=" bg-dark p-2"><h5>Deskripsi Kompetensi</h5></div>
                        <div>
                            <table border="0" class="table table-bordered table-sm p-2">

                                
                                <tr class=" ">
                                    <td align="center" colspan="2" class="text-uppercase font-weight-bold">Kompetensi</td>
                                     
                                    <td align="center" class="text-uppercase font-weight-bold">Level</td>
                                    <td align="center" class="text-uppercase font-weight-bold">Deskripsi</td>
                                </tr>
                                <tr class="bg-white">
                                    <td align="" colspan="4" class="text-uppercase font-weight-bold">MANAJERIAL</td>
                                     
                                </tr>
                                <tr>
                                    <td align="center" width="40">1.</td> 
                                    <td class="font-weight-normal" >Integritas</td>
                                    <td align="center">{{ $datak->nilai_integritas }}</td>
                                    <td align=""> {{ $desk1->desk_level }} </td>
                                </tr>
                                <tr>
                                    <td align="center">2.</td> 
                                    <td class="font-weight-normal">Kerjasama</td>
                                     
                                    <td align="center">{{ $datak->nilai_kerjasama }}</td>
                                    <td align="">{{ $desk2->desk_level }}</td>
                                </tr>
                                <tr>
                                    <td align="center">3.</td> 
                                    <td class="font-weight-normal">Komunikasi </td>
                                     
                                    <td align="center">{{ $datak->nilai_komunikasi }}</td>
                                    <td align="">{{ $desk3->desk_level }}</td>
                                </tr>
                                <tr>
                                    <td align="center" width="40">4.</td> 
                                    <td class="font-weight-normal" >Orientasi Pada Hasil</td>
                                    
                                    <td align="center">{{ $datak->nilai_orientasi }}</td>
                                    <td align="">{{ $desk4->desk_level }}</td>
                                </tr>
                                <tr>
                                    <td align="center">5.</td> 
                                    <td class="font-weight-normal">Pelayanan publik </td>
                                     
                                    <td align="center">{{ $datak->nilai_pelayanan }}</td>
                                    <td align="">{{ $desk5->desk_level }}</td>
                                </tr>
                                <tr>
                                    <td align="center">6.</td> 
                                    <td class="font-weight-normal">Pengembangan diri dan oranglain </td>
                                     
                                    <td align="center">{{ $datak->nilai_pengembangan }}</td>
                                    <td align="">{{ $desk6->desk_level }}</td>
                                </tr>
                                <tr>
                                    <td align="center" width="40">7.</td> 
                                    <td class="font-weight-normal" >Mengelola perubahan </td>
                                     
                                    <td align="center">{{ $datak->nilai_perubahan }}</td>
                                    <td align="">{{ $desk7->desk_level }}</td>
                                </tr>
                                <tr>
                                    <td align="center">8.</td> 
                                    <td class="font-weight-normal">Pengambilan keputusan </td>
                                     
                                    <td align="center">{{ $datak->nilai_keputusan }}</td>
                                    <td align="">{{ $desk8->desk_level }}</td>
                                </tr>
                                <tr class="bg-white">
                                    <td align="" colspan="4" class="text-uppercase font-weight-bold">SOSIAL KULTURAL</td>
                                     
                                </tr>
                                <tr>
                                    <td align="center">9.</td> 
                                    <td class="font-weight-normal">Perekat Bangsa</td>
                                     
                                    <td align="center">{{ $datak->nilai_perekat }}</td>
                                    <td align="">{{ $desk9->desk_level }}</td>
                                </tr>
                                
                                   
                                 
                                 
                             
                            </table>    
                        </div>   
                        <!-- indikator !-->             
                       
                        <div class="bg-dark p-2 "><h5 class="text-capitalize">Tabel Nilai Indikator Talenta</h5></div>
                        <div>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SKP</th>
                                        <th>Inovasi</th>
                                        <th>Prestasi</th>
                                        <th>Indisipliner</th>
                                        <th>Kompetensi</th>
                                        <th>Kualifikasi</th>
                                        <th>Riwayat Jabatan</th>
                                        <th>Riwayat Diklat</th>
                                        <th>Kecerdasan Umum</th>
                                        <th>Nilai X</th>
                                        <th>Nilai Y</th>
                                       
                                        <th class="col-2">Nilai TB</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <tr>
                                         
                                        <td class="font-weight-normal text-center ">{{ $indi->nilai_skp }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_inovasi }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_prestasi }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_indisipliner }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_kompetensi }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_kualifikasi }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_riwayat_jabatan }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_riwayat_diklat }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_kecerdasan }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_x }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_y }} </td>
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_tb }} </td>
                                      
                                    </tr>
                                  
                                </tbody>

                            </table>

                        </div>
                        <!-- web !-->             
                       
                        <div class="bg-dark p-2 pagebreak1"><h5 class="text-capitalize">Diagram Jaring laba-laba Kompetensi</h5></div>
                        <div class="border">
                            <div id="radarchart"></div>
                        </div>
                           
                    </div>
                     
                     
                    <div class=" ">
                       
                        <div class=" ">
                            
                        </div>
                    </div> 
                    <div class="card-footer">
                      <p>
                         
                        <b>Email :</b>  bkpsdmd@babelprov.go.id <br> <b>Website :</b>  bkpsdmd.babelprov@go.id
                      </p>
                      
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="{{ url('charts/highcharts.js') }}"></script>
    <script src="{{ url('charts/highcharts-more.js') }}"></script>
    <script src="{{ url('charts/modules/exporting.js') }}"></script>
    <script src="{{ url('charts/modules/export-data.js') }}"></script>
    <script src="{{ url('charts/modules/accessibility.js') }}"></script>
    
    <script>
        Highcharts.chart('radarchart', {

            chart: {
                polar: true,
                type: 'line'
            },

            accessibility: {
                description: ''
            },

            title: {
                text: 'DIAGRAM KOMPETENSI INDIVIDUAL  ',
                x: -80
            },

            pane: {
                size: '80%'
            },

            xAxis: {
                categories: ['Integritas', 'Kerjasama', 'Komunikasi', 'Orientasi Pada Hasil', 'Pelayanan Publik ', 'Pengembangan diri dan Oranglain','Mengelola Perubahan','Pengambilan Keputusan','Perekat Bangsa'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },

            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },

            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b> {point.y:,.0f}</b><br/>'
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            series: [{
                name: 'Standar',
                data: [<?=$stk->integritas_level?>, <?=$stk->kerjasama_level?>, <?=$stk->komunikasi_level?>, <?=$stk->orientasi_level?>, <?=$stk->pelayanan_level?>, <?=$stk->pengembangan_level?>, <?=$stk->perubahan_level?>, <?=$stk->keputusan_level?>, <?=$stk->perekat_level?>],
                pointPlacement: 'on'
            }, {
                name: 'Personal',
                data: [<?=$datak->nilai_integritas?>, <?=$datak->nilai_kerjasama?>, <?=$datak->nilai_komunikasi?>, <?=$datak->nilai_orientasi?>, <?=$datak->nilai_pelayanan?>, <?=$datak->nilai_pengembangan?>, <?=$datak->nilai_perubahan?>, <?=$datak->nilai_keputusan?>, <?=$datak->nilai_perekat?>],
                pointPlacement: 'on'
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            align: 'center',
                            verticalAlign: 'bottom',
                            layout: 'horizontal'
                        },
                        chart: {
                                height: 300
                            },
                        pane: {
                            size: '80%'
                        }
                    }
                }]
            }
        });
        </script>
@endsection
 
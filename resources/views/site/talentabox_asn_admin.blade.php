@extends('site.index_asn_admin')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
 <?php 
 $urlfoto="https://simadig.babelprov.go.id/web/uploads/pegawai/berkas-foto/kecil/";
 $urlnofoto="https://primadona.babelprov.go.id/talent/public/images/nofoto.png";

 $file_exist = @fopen($urlfoto.$bio->detPeg->Berkas_foto, 'r');

//  $remote_file_url = $urlfoto.$bio->detPeg->Berkas_foto;

// // Initialize a cURL session
// $curl = curl_init($remote_file_url);

// // Set CURLOPT_NOBODY true to exclude body from output
// curl_setopt($curl, CURLOPT_NOBODY, true);

// //Execute the current cURL session
// curl_exec($curl);

// // Get an HTTP response code
// $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// // Close cURL session
// curl_close($curl);
// echo $remote_file_url;
// echo"<br>";
// // Check if file exists on remote server
// if($response_code == 200){
//     echo 'Remote file exists.';
// }else{
//     echo 'Remote file is not found!';
// }

 ?>
 <style>
.coverimg {
    height: 120px;
    padding:2px;
    margin-top:0px;
    overflow: hidden;
}

 </style>
<div class=" ">
    <div class="row justify-content-center p-1">
             
            <div class="col-md-12">
                <div class="card card-info ">
                    <div class="card-body">
                         
                           
                            <div class="row border">
                                <div class="bg-dark p-2 col-md-12"><h5 class="text-capitalize">Biodata   </h5></div>
                                {{-- <div class="col-md-3 bg-white p-2">
                                    @if(!empty($bio->detPeg->Berkas_foto))
                                        <img src="{{ $urlfoto.$bio->detPeg->Berkas_foto }}" class="img-thumbnail rounded  " width="200px">
                                        <div class="small">Nama file foto : {{ $bio->detPeg->Berkas_foto }}</div> 
                                    @else
                                        Null
                                    @endif
                                </div> --}}
                                <div class="col-md-12 p-1">
                                    <table class="bg-white ">
                                        <tr>
                                            <td class="col-2 border-bottom">Nama</td>
                                             
                                            <td class="col-4  border-bottom">{{ $bio->nama }}</td> 
                                            <td rowspan="4" class="col-1 p-1 border bg-light" >@if(!empty($bio->detPeg->Berkas_foto))
                                                <div class="coverimg  ">
                                                    
                                                    {{-- @if($file_exist)
                                                    aya
                                                    @else
                                                    eweh
                                                    @endif --}}

                                                    <img src="{{ $urlfoto.$bio->detPeg->Berkas_foto }}" class="img-fluid mx-auto d-block  " style="width:100px;" >
                                                </div>
                                                
                                                {{-- <div class="small">Nama file foto : {{ $bio->detPeg->Berkas_foto }}</div>  --}}
                                            @else
                                            <img src="{{ $urlnofoto }}" class="img-thumbnail rounded  " >
                                            @endif</td>   
                                        </tr> 
                                        <tr>
                                            <td class="col-2 border-bottom ">NIP</td>
                                            
                                            <td class="col-4  border-bottom">{{ $bio->nip }}</td>    
                                        </tr>    
                                        <tr>
                                            <td class="col-2 border-bottom ">Jabatan</td>
                                             
                                            <td class="col-6 border-bottom">{{ $bio->jabatan }}</td>    
                                        </tr> 
                                        <tr>
                                            <td class="col-2 border-bottom ">Instansi/Unit Kerja</td>
                                             
                                            <td class="col-6 border-bottom">{{ $indi->nama_instansi }}</td>    
                                        </tr> 
                                    </table>    
                                </div>
                                
                                
                            </div>
                        
                    </div>
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
                                         
                                        <td class="font-weight-normal text-center">{{ $indi->nilai_skp }} </td>
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
                            <div id="radarchart" ></div>
                        </div>
                           
                        <!-- saran !-->
                         
                        
                            <div class="row p-2 ">
                                <div class="col-sm-12 text-center  bg-primary ">
                                    <div style="" class="text-center  p-1 text-uppercase  "><h5> <b>PROFIL KOMPETENSI </b></h5></div>
                                </div>
                                <div class="col-md-12 mb-0 p-0 ">
                                    <table class="table table-sm table-bordered col-sm-12">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold text-center">NO.</th>
                                                <th class="font-weight-bold text-center ">KOMPETENSI </th>
                                                <th class="font-weight-bold text-center ">STANDARD</th>
                                                <th class="font-weight-bold text-center ">PERSON</th>
                                                <th class="font-weight-bold text-center ">GAP</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $totkomp=0; 
                                                $totskj=0;
                                                $idkomp="";
                                                $ketkomp="";
                                            ?>
                                        @foreach($refso as $rf)
                                        <?php 
                                            $totskj=$totskj+$stk->integritas_level;
                                            if($rf->no_komp==1){
                                                $nilaikomp=$datak->nilai_integritas;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==2){
                                                $nilaikomp=$datak->nilai_kerjasama;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==3){
                                                $nilaikomp=$datak->nilai_komunikasi;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==4){
                                                $nilaikomp=$datak->nilai_orientasi;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==5){
                                                $nilaikomp=$datak->nilai_pelayanan;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==6){
                                                $nilaikomp=$datak->nilai_pengembangan;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==7){
                                                $nilaikomp=$datak->nilai_perubahan;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==8){
                                                $nilaikomp=$datak->nilai_keputusan;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            if($rf->no_komp==9){
                                                $nilaikomp=$datak->nilai_perekat;
                                                $gap=$nilaikomp-$stk->integritas_level;
                                            }
                                            $totnilai=$datak->nilai_integritas+$datak->nilai_kerjasama+$datak->nilai_komunikasi+$datak->nilai_orientasi+$datak->nilai_pelayanan+$datak->nilai_pengembangan+$datak->nilai_perubahan+$datak->nilai_keputusan+$datak->nilai_perekat;    
                                        ?>
                                        <tr>
                                                <td class="text-center">{{ $rf->no_komp }}.</td>
                                                <td class="">{{$rf->nama_kompetensi}}</td>
                                                <td class="text-center">{{ $stk->integritas_level }}  </td>
                                                <td class="text-center "> 
                                                    
                                                <?php
                                                 
                                                echo $nilaikomp;
                                               
    
     
                                                ?>       
                                            
                                                                          
                                                </td>
                                                <td valign="top" class="text-center " >
                                                    <?php 
                                                   
                                                     echo $gap;    
                                                     if($gap<0){
                                                        $idkomp.=$rf->no_komp;
                                                        $idkomp.=", ";
                                                        $ketkomp.=$rf->desk_kompetensi;
                                                        $ketkomp.=", ";
                                                        //echo"<br>";
                                                        //echo $ketkomp;
                                                    }        
                                                   
                                                    ?>
                                                </td>
                                        </tr>
                                         @endforeach
                                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-center"> </td>
                                                <td class="text-center">Total</td>
                                                <td class="text-center">{{ $totskj }}</td>
                                                <td class="text-center">{{ $totnilai }}</td>
                                                <td class="text-center">
                                                <?php 
                                                     $ketsaran=rtrim($ketkomp, ', ');
                                                     //   echo $ketsaran;
                                                ?>    
                                                </td>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-sm-8 mt-1 bg-light p-2 border">
                                    <?php 
                                        $njob=($totnilai/$totskj) * 100;    
                                        $jpm=number_format($njob,2);
                                        if($jpm < "68"){
                                            $labeljpm="Kurang Memenuhi Syarat";
                                            $mutu="Belum ";
                                            $ketjpm="";
                                            $cssna="text-danger";
                                        }elseif($jpm >"68.00" and $jpm <= "79" ){
                                            $labeljpm="Masih Memenuhi Syarat";
                                            $mutu="Cukup ";
                                            $ketjpm="";
                                            $cssna="text-danger";
                                        }elseif($jpm >= "80" ){
                                            $labeljpm="Memenuhi Syarat";
                                            $mutu="Sudah ";
                                            $ketjpm="";
                                            $cssna="text-primary";
                                        }else{
                                            $labeljpm="...";
                                            $mutu="-";
                                            $ketjpm="";
                                        }
                                    ?>
                                    <b>JOB PER MATCH</b> : <span class="ml-2 h5 {{ $cssna }}">{{ number_format($njob,2) }}</span>  <span class="ml-3 h6  {{ $cssna }} font-italic">{{  $labeljpm }}</span> 
                                </div>
                                <div class=" col-md-12 mb-3 mt-2" >
                                    <div class=" ">
                                        <div class="col-md-12"><u>KATEGORI</u> </div> 
                                        <div class="col-md-12 "><u>></u>  80% Kompetensi Standar Minimal SKJ : Memenuhi </div> 
                                        
                                        <div  class="col-md-12 ">79% - 68% Kompetensi Standar Minimal SKJ : Masih Memenuhi </div> 
                                         
                                        <div  class="col-md-12 ">< 68 Kompetensi Standar Minimal SKJ : Kurang Memenuhi </div>
                                        
                                    </div>
                                 
                                  
                                </div>
                            <div class="col-sm-12 text-center  bg-primary ">
                                <div style="" class="text-center  p-1 text-uppercase  "><h5> <b>DESKRIPSI KOMPETENSI </b></h5></div>
                            </div>
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
                         
                                <div class="col-sm-12 text-center  p-1 text-uppercase   bg-primary ">
                                    <h5> <b>SARAN PENGEMBANGAN </b></h5>
                                </div>
                                <div class="col-md-12 bg-white border p-2">
                                    <b>Feedback :</b><br>
                                    <p class="mt-1">Sdr/Sdr.  <b>{{ strtoupper($datak->nama) }}</b> {{ $mutu }} menampilkan hasil yang optimal pada seluruh aspek kompetensi yang dipersyaratkan. Peningkatan aspek kompetensi dapat dilakukan dengan melibatkan atasan yang kompeten dengan memberikan pembinaan serta couching akan membantu dalam pengembangan diri ybs.</p>
                                    <p>&nbsp;</p>
                                    @if(!empty($idkomp)) 
                                    <b>Pengembangan kompetensi yang disarankan :</b><br>
                                    <p class="mt-1">
                                        Kepada Sdr/Sdri. <b>{{ $datak->nama }}</b> dapat disarankan untuk mengikuti pelatihan yang terkait dengan <b>{{ $ketsaran }}</b>   untuk meningkatkan kompetensinya.
                                        </p>
                                    
                                   @endif
                                    
                                </div>
                            
    
                            </div> 
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
                align: 'center',
                verticalAlign: 'bottom',
                layout: 'horizontal'
            },

            // series: [{
            //     name: 'Standar',
            //     data: [<?=$stk->integritas_level?>, <?=$stk->kerjasama_level?>, <?=$stk->komunikasi_level?>, <?=$stk->orientasi_level?>, <?=$stk->pelayanan_level?>, <?=$stk->pengembangan_level?>, <?=$stk->perubahan_level?>, <?=$stk->keputusan_level?>, <?=$stk->perekat_level?>],
            //     pointPlacement: 'on'
            // }, {
            //     name: 'Personal',
            //     data: [<?=$datak->nilai_integritas?>, <?=$datak->nilai_kerjasama?>, <?=$datak->nilai_komunikasi?>, <?=$datak->nilai_orientasi?>, <?=$datak->nilai_pelayanan?>, <?=$datak->nilai_pengembangan?>, <?=$datak->nilai_perubahan?>, <?=$datak->nilai_keputusan?>, <?=$datak->nilai_perekat?>],
            //     pointPlacement: 'on'
            // }],
            series: [{
                name: 'Standar',
                data: [{{ $stk->integritas_level }}, {{ $stk->kerjasama_level }}, {{ $stk->komunikasi_level }}, {{ $stk->orientasi_level }}, {{ $stk->pelayanan_level }}, {{ $stk->pengembangan_level }}, {{ $stk->perubahan_level }}, {{ $stk->keputusan_level }}, {{ $stk->perekat_level }}],
                pointPlacement: 'on'
            }, {
                name: 'Personal',
                data: [{{ $datak->nilai_integritas }}, {{ $datak->nilai_kerjasama }}, {{ $datak->nilai_komunikasi }}, {{ $datak->nilai_orientasi }}, {{ $datak->nilai_pelayanan }}, {{ $datak->nilai_pengembangan }}, {{ $datak->nilai_perubahan }}, {{ $datak->nilai_keputusan }}, {{ $datak->nilai_perekat }}],
                pointPlacement: 'on'
            }],    

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 600
                    },
                    chartOptions: {
                        legend: {
                            align: 'center',
                            verticalAlign: 'top',
                            layout: 'horizontal'
                        },
                        chart: {
                                height: 400
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
 
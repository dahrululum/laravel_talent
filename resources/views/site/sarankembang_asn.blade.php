@extends('site.index_asn')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
 <?php
    $jpm=number_format($datak->jpm);
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
<div class=" ">
    <div class="row justify-content-center p-1">
                
            <div class="col-md-12">
                <div class="card card-info ">
                     
                    <div class="card-body border-top">
                         
                        
                            
                        <div class="row p-3">
                            <div class="col-sm-12 text-center  bg-primary ">
                                <div style="" class="text-center  p-2 text-uppercase  "><h4> <b>PROFIL KOMPETENSI </b></h4></div>
                            </div>
                            <div class="col-md-12 mb-0 p-0 ">
                                <table class="table table-xs table-bordered col-sm-12">
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
                                            // $nm_komp=strtolower($rf->nama_kompetensi);
                                            // $nkomp="nilai_".$nm_komp;
                                            // echo $nkomp;
                                            // $nilaikomp=$datak->$nkomp;
                                            // echo "-".$nilaikomp;
                                            // if($rf->no_komp==1){
                                            //     echo $datak->nilai_integritas;
                                            // }
                                            // if($rf->no_komp==2){
                                            //     echo $datak->nilai_kerjasama;
                                            // }
                                            // if($rf->no_komp==3){
                                            //     echo $datak->nilai_komunikasi;
                                            // }
                                            // if($rf->no_komp==4){
                                            //     echo $datak->nilai_orientasi;
                                            // }
                                            // if($rf->no_komp==5){
                                            //     echo $datak->nilai_pelayanan;
                                            // }
                                            // if($rf->no_komp==6){
                                            //     echo $datak->nilai_pengembangan;
                                            // }
                                            // if($rf->no_komp==7){
                                            //     echo $datak->nilai_perubahan;
                                            // }
                                            // if($rf->no_komp==8){
                                            //     echo $datak->nilai_keputusan;
                                            // }
                                            // if($rf->no_komp==9){
                                            //     echo $datak->nilai_perekat;
                                            // }
                                            echo $nilaikomp;
                                           


                                            // if(!empty($datak->id)){
                                            //         $nkomp="nilai_komp".$rf->no_komp;
                                            //         $nilaikomp=$vank->$nkomp;
                                            //         $nevi="nilai_evi".$rf->no_komp;
                                            //         $nilaievi=$vank->$nevi;
                                            //         //echo $nilaikomp;
                                            //     }else{
                                            //         $nilaikomp=0;
                                            //         $nilaievi=0;
                                                    
                                            //     } 
                                            //     $totkomp=$totkomp+$nilaikomp;
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
                                <div class="row">
                                    <div class="col-md-12"><u>KATEGORI</u> </div> 
                                    <div class="col-md-4 "><u>></u>  80% Kompetensi Standar Minimal SKJ </div> 
                                    <div class="col-md-8">: Memenuhi</div>
                                    <div  class="col-md-4 ">79% - 68% Kompetensi Standar Minimal SKJ </div> 
                                    <div class="col-md-8">: Masih Memenuhi</div>
                                    <div  class="col-md-4 ">< 68 Kompetensi Standar Minimal SKJ </div>
                                    <div class="col-md-8">: Kurang Memenuhi</div> 
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
                            </div>
                            <div class="col-sm-12 text-center  p-2 text-uppercase   bg-primary ">
                                <h4> <b>SARAN PENGEMBANGAN </b></h4>
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
 
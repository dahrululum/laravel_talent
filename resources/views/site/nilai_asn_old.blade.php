@extends('site.index_asn')

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
                    <div class="card-header"><b>PERFORMA  </b></div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-lg-8">
                            {{-- <p>{{ $bio->detPeg }}</p> --}}
                            <div class="row border-bottom">
                                <div class="col-md-3 bg-info">Nama Lengkap</div>
                                <div class="col-md-9">{{ $bio->detPeg->NAMA }}</div>
                                
                            </div>
                            <div class="row border-bottom">
                                <div class="col-md-3 bg-info">NIP</div>
                                <div class="col-md-9">{{ $bio->detPeg->NIPBR }}</div>
                                
                            </div>
                            <div class="row border-bottom">
                                <div class="col-md-3 bg-info">Jabatan</div>
                                <div class="col-md-9">
                                @php
                                if(isset($bio->detPeg->JABATAN)){
                                                echo strtoupper($bio->detPeg->JABATAN);
                                            }else{
                                                echo"-";
                                            }  
                                @endphp
                                </div>
                                
                            </div>
                            <div class="row border-bottom">
                                <div class="col-md-3 bg-info">Instansi / Unit Kerja</div>
                                <div class="col-md-9">
                                @php
                                if(isset($bio->detPeg->Instansi)){
                                                echo strtoupper($bio->detPeg->Instansi);
                                            }else{
                                                echo"-";
                                            }
                                @endphp  
                                </div>
                                
                            </div>
                            <div class="row border-bottom">
                                <div class="col-md-3 bg-primary p-2">Assessment</div>
                                <div class="col-md-9 p-2">
                                 
                                @if(isset($bio->detJpm->idtoken))
                                <?php 
                                  
                                        $dates = Carbon::parse($bio->detJpm->detSesi->periode, 'Asia/Jakarta');
                                        //echo $regdate;
                                        $tglpes = $dates->isoFormat('D MMMM Y');
                                         
                                ?>
                                    <b>Periode: {{ $tglpes }}</b>

                                   <div class=""> {{ $bio->detJpm->detSesi->namasesi }}</div>      
                                   <span class="badge badge-info border rounded p-1">{{  $bio->detJpm->idtoken }}</span>   
                                    
                                @endif
                                
                                </div>
                                
                            </div>
                          
                                
                            </div>
                            <div class="col-lg-4 text-center">
                            <img src="{{ url ('images/logo_asnprimadona.png') }}" class="img-box col-lg-8 " >
                            </div>
      
                        </div>
                    </div>
                    
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-sm-6 mr-2">
                                <div class="row border  ">
                                    <div class="col-sm-12 bg-navy  p-2">KINERJA</div>
                                    {{-- <div class="col-sm-5 bg-primary p-2 ">Nilai Kinerja</div>
                                    <div class="col-sm-7 bg-light  text-center  p-2">
                                        @if(!empty($bio->detSkpSimadig->total_nilai_integrasi))
                                            <h4>{{ $bio->detSkpSimadig->total_nilai_integrasi }}</h4>
                                            
                                        @else
                                            <span class="text-danger font-italic">Kosong</span>
                                        @endif
                                    </div> --}}
                                   
                                    
                                </div>
                                <div class="row border">
                                    <div class="col-sm-5 bg-primary p-2 ">Predikat</div>
                                    <div class="col-sm-7 bg-light  text-center  p-2">
                                        @if($bio->detSkpSimadig->total_nilai_integrasi >= 110)
                                            <span class="font-weight-bold text-primary">Sangat Baik</span>
                                         @elseif($bio->detSkpSimadig->total_nilai_integrasi >= 90 && $bio->detSkpSimadig->total_nilai_integrasi < 110)
                                            <span class="font-weight-bold text-success">Baik</span>
                                         @else
                                         <span class="font-weight-bold text-warning">Cukup</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row border  ">
                                    <div class="col-sm-12 bg-dark  p-2">POTENSIAL</div>
                                    {{-- <div class="col-sm-5 bg-primary p-2 ">Nilai JPM</div>
                                    <div class="col-sm-7 bg-white  p-2 text-center"  >
                                        @if(!empty($bio->detJpm->jpm))
                                        <h4>{{ $bio->detJpm->jpm }}</h4>
                                    @else
                                        <span class="text-danger font-italic">Kosong</span>
                                    @endif    
                                    </div> --}}
                                   
                                    
                                    
                                </div>
                                <div class="row border">
                                    <div class="col-sm-5 bg-primary p-2 ">Kategori</div>
                                    <div class="col-sm-7 bg-light  text-center  p-2">
                                        @if(!empty($bio->detJpm->kategori))
                                            <b>{{ $bio->detJpm->kategori }}</b>
                                        @else
                                            <span class="text-danger font-italic">Kosong</span>
                                        @endif   
                                    </div>
                                </div>
                                

                            </div>
                            
                        </div>
                    </div>
                    <?php 
                        if(!empty($bio->detSkpSimadig->total_nilai_integrasi)){
                            $nskp=$bio->detSkpSimadig->total_nilai_integrasi;
                        }else{
                            $nskp=0;
                        }
                        if(!empty($bio->detJpm->jpm)){
                            $njpm=$bio->detJpm->jpm;
                        }else{
                            $njpm=0;
                        }
                        
                        
                        //$nskp=90;
                        //$njpm=68;
                        
                        if(($nskp < 90) and ($njpm < 68)){
                            $nilaitb="1";
                            $stylena="bg-danger";
                            $uraianna="Kinerja di bawah ekspektasi dan potensi rendah";
                        }elseif(($nskp >= 90 && $nskp < 110) and ($njpm < 68)){
                            $nilaitb="2";
                            $stylena="bg-danger";
                            $uraianna="Kinerja sesuai ekspektasi dan potensi rendah";
                        }elseif(($nskp < 90) and ($njpm >= 68 && $njpm < 79)){
                            $nilaitb="3";
                            $stylena="bg-danger";
                            $uraianna="Kinerja di bawah ekspektasi dan potensi menengah";
                        }elseif(($nskp >= 110) and ($njpm < 68 )){
                            $nilaitb="4";
                            $stylena="bg-warning";
                            $uraianna="Kinerja di atas ekspektasi dan potensi rendah";
                        }elseif(($nskp >= 90 && $nskp < 110) and ($njpm >= 68 && $njpm < 79)){
                            $nilaitb="5";
                            $stylena="bg-warning";
                            $uraianna="Kinerja sesuai ekspektasi dan potensi menengah";
                        }elseif(($nskp < 90 ) and ($njpm >= 80)){
                            $nilaitb="6";
                            $stylena="bg-warning";
                            $uraianna="Kinerja di bawah ekspektasi dan potensi tinggi";
                        }elseif(($nskp >= 110 ) and ($njpm >= 68 && $njpm < 79)){
                            $nilaitb="7";
                            $stylena="bg-success";
                            $uraianna="Kinerja di atas ekspektasi dan potensi menengah";
                        }elseif(($nskp >= 90 && $nskp < 110 ) and ($njpm >= 80 )){
                            $nilaitb="8";
                            $stylena="bg-success";
                            $uraianna="Kinerja sesuai ekspektasi dan potensi tinggi";
                        }elseif(($nskp >= 110 ) and ($njpm >= 80)){
                            $nilaitb="8";
                            $stylena="bg-primary";
                            $uraianna="Kinerja di atas ekspektasi dan potensi tinggi";
                        }else{
                            $nilaitb="";
                            $stylena="bg-danger";
                            $uraianna="";
                        }

                    ?>
                    <div class="card-body border-top">
                        <span class="border-bottom font-weight-bold">KOTAK TALENTA ANDA</span>
                        <div class="row p-2">
                            <div class="border border-dark rounded text-center col-md-1 {{ $stylena }}">
                                <h1>{{ $nilaitb }}</h1>
                            </div>
                            <div class="ml-2 col-md-8 border rounded p-3 font-weight-bold">  {{ $uraianna }}  </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        {{-- <table class="table table-bordered col-sm-11">
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
                                $totskj=$totskj+$bio->detJpm->levelskj;
                             ?>
                            <tr>
                                <td>{{ $rf->no_komp }}</td>
                                <td>{{ $rf->nama_kompetensi }}</td>
                                <td class="text-center">{{ $bio->detJpm->levelskj }}</td>
                                <td class="text-center">
                                    <?php 
                                        if(!empty($bio->detJpm->id)){
                                            $nkomp="nilai_komp".$rf->no_komp;
                                            $nilaikomp=$bio->detJpm->$nkomp;
                                             
                                            //echo $nilaikomp;
                                        }else{
                                            $nilaikomp="";
                                            $nilaievi="";
                                                        
                                        } 
                                            $totkomp=$totkomp+$nilaikomp;    
                                    ?>
                                     {{ $nilaikomp }}
                                </td>
                                <td class="text-center">
                                    <?php 
                                        $gap=$nilaikomp-$bio->detJpm->levelskj;
                                        echo $gap;    

                                        //$gap.$rf->no_komp= $gap;
                                        $ngap="gap".$rf->no_komp;
                                        $vgap=$ngap.':'.$gap;
                                        //echo"<br>";
                                        //echo $vgap;
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
                                    <td class="text-center">{{ $totkomp }}</td>
                                    <td class="text-center">
                                    <?php 
                                         $ketsaran=rtrim($ketkomp, ', ');
                                            //echo rtrim($ketkomp, ', ');   
                                            //echo"<br>";
                                    ?>    
                                    </td>
                                    
                                </tr>
                            </tfoot>
                        </table> --}}
                        <?php 
                                $totkomp=0; 
                                $totskj=0;
                                $idkomp="";
                                $ketkomp="";    
                            foreach($refso as $rf){
                                $totskj=$totskj+$bio->detJpm->levelskj;
                                if(!empty($bio->detJpm->id)){
                                    $nkomp="nilai_komp".$rf->no_komp;
                                    $nilaikomp=$bio->detJpm->$nkomp;
                                        
                                    //echo $nilaikomp;
                                }else{
                                    $nilaikomp="";
                                    $nilaievi="";
                                                
                                } 
                                $totkomp=$totkomp+$nilaikomp;   
                                $gap=$nilaikomp-$bio->detJpm->levelskj;
                                //    echo $gap;    

                                    //$gap.$rf->no_komp= $gap;
                                    $ngap="gap".$rf->no_komp;
                                    $vgap=$ngap.':'.$gap;
                                    //echo"<br>";
                                    //echo $vgap;
                                    if($gap<0){
                                        $idkomp.=$rf->no_komp;
                                        $idkomp.=", ";
                                        $ketkomp.=$rf->desk_kompetensi;
                                        $ketkomp.=", ";
                                        //echo"<br>";
                                        //echo $ketkomp;
                                    } 

                            }
                            $ketsaran=rtrim($ketkomp, ', ');

                            //$jpm=$bio->detJpm->jpm;
                                if($bio->detJpm->jpm < "68"){
                                    $labeljpm="Kurang Memenuhi Syarat";
                                    $mutu="Belum ";
                                    $ketjpm="";
                                    $cssna="text-danger";
                                }elseif($bio->detJpm->jpm >"68.00" and $bio->detJpm->jpm <= "79" ){
                                    $labeljpm="Masih Memenuhi Syarat";
                                    $mutu="Cukup ";
                                    $ketjpm="";
                                    $cssna="text-danger";
                                }elseif($bio->detJpm->jpm >= "80" ){
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
                            
                        @if(!empty($idkomp)) 
                         <div class="my-2">
                            <span class="border-bottom font-weight-bold">SARAN PENGEMBANGAN KOMPETENSI</span>
                         </div>
                         @endif
                         <div class="col-md-12 bg-white border p-2">
                            
                            
                            @if(!empty($idkomp)) 
                            <b>Pengembangan kompetensi yang disarankan :</b><br>
                            <p>
                                Kepada Sdr/Sdri. <b>{{ $bio->nama }}</b> dapat disarankan untuk mengikuti pelatihan yang terkait dengan <b>{{ $ketsaran }}</b>   untuk meningkatkan kompetensinya.
                                </p>
                            
                           @endif
                               
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
@endsection
 
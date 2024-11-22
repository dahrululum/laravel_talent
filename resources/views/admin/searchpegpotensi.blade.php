@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
<!-- DataTables --> 

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable({ "pageLength": 100 });
    })
</script>

@endsection

 

@section('content')
 
   
<form method="get" id="FormCari" enctype="multipart/form-data">
                 
    <div class="card card-info card-solid">
        <div class="card-header ">
            <h3 class="card-title">Pencarian Pegawai Potensi Untuk Menempati Jabatan</h3>
        </div>    
        <div class="card-body" >
            <div class="form-group ">
                <label for="key" class="col-sm-6 col-form-label">Masukkan Kata Kunci Jabatan </label>
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="key" id="key" value="{{ @$params['key'] }}">
                    
                </div>
                
                <div class="row mt-2 mx-1">
                 
                    <div class="col-sm-2">
                        <div class="icheck-primary mt-2">
                            <input type="checkbox" id="checkboxPrimary1" name="box9" @if(@$params['box9']=="on") checked @endif>
                            <label for="checkboxPrimary1"> Box 9 </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="icheck-primary mt-2">
                            <input type="checkbox" id="checkboxPrimary2" name="box8" @if(@$params['box8']=="on") checked @endif>
                            <label for="checkboxPrimary2"> Box 8 </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="icheck-primary mt-2">
                            <input type="checkbox" id="checkboxPrimary3" name="box7" @if(@$params['box7']=="on") checked @endif >
                            <label for="checkboxPrimary3"> Box 7 </label>
                        </div>
                    </div>
                </div>
                    
                             
               
                 
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button class="btn btn-success" type="submit" name="submit" value="1">
                        <i class="fa fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </div>
        
                   
    </div>
</form>
    <?php 
     if(isset($_GET["submit"])){
     //   $key=$_GET['key'];
        
    ?>
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Hasil Pencarian Pegawai Potensi  </h3>
        </div>
        <div class="card-body">
            <div class="my-1 mx-2">Kata Kunci :  {{ $key }}</div>
            <div class="table-responsive p-1">
                        

                <table class="table table-sm  table-hover table-bordered  " id="tablena1">
                    <thead  class="bg-gray">
                    <tr>
                        <th> No. </th>
                        <th> NIP </th>
                        <th> Nama Pegawai </th>
                        <th> Jenis Jabatan </th>
                        <th> Jabatan </th>
                        <th> Instansi/Unit Kerja </th>
                         
                        <th> Talent Box </th>
                        <th> Pendidikan</th>
                        <th> Pengalaman Jabatan </th>
                        <th> Pengalaman Pelatihan </th>
                        <th> Sertifikasi Kompetensi </th>
                        <th> # </th>
                        
                        
                         
                            
                        

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
                            if(!empty($key)){
                        
                            if( (count($ib->detPeg->cariKualifikasi) > 0) or (count($ib->detPeg->cariJabatan) > 0) or (count($ib->detPeg->cariDiklatTeknis) > 0) or (count($ib->detPeg->cariDiklatFungsional) > 0) or (count($ib->detPeg->cariSertifikatKomp) > 0)){
                        ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td class="small"> {{ $ib->nip }} <b>{{ $ib->detPeg->News_ID }}</b>  
                                   
                                </td>
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
                                <td class="small">{{ $ib->jabatan }}  </td>
                                <td class="small"> {{ $ib->nama_instansi }}</td>
                                
                                <td class="text-center p-2 mx-2">
                                   

                                    {{-- <div class="{{ $stylena }} text-center h3 p-2 ">{{ $nilaitb }}</div> --}}
                                    <?php
                                    if($nilaitb=="9"){
                                        $nilaitalenta="60";
                                    }elseif($nilaitb=="8"){
                                        $nilaitalenta="55";
                                    }elseif($nilaitb=="7"){
                                        $nilaitalenta="50";
                                    }elseif($nilaitb=="6"){
                                        $nilaitalenta="45";
                                    }elseif($nilaitb=="5"){
                                        $nilaitalenta="40";
                                    }elseif($nilaitb=="4"){
                                        $nilaitalenta="30";
                                    }elseif($nilaitb=="3"){
                                        $nilaitalenta="20";
                                    }elseif($nilaitb=="2"){
                                        $nilaitalenta="10";
                                    }elseif($nilaitb=="1"){
                                        $nilaitalenta="0";
                                    }else{
                                        $nilaitalenta="0";
                                    }    
                                    ?>
                                     {{ $nilaitalenta }}
                                </td>
                                <td class="text-center small">
                                    <?php 
                                         if(count($ib->detPeg->cariKualifikasi) > 0){
                                            $tkpend_terakhir=str_replace(['.','-'],'',$ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir);

                                            if($tkpend_terakhir=="S3"){
                                                $nilaikualifikasi="10";
                                            }elseif($tkpend_terakhir=="S2"){
                                                $nilaikualifikasi="7.5";
                                            }elseif(($tkpend_terakhir=="S1") or ($tkpend_terakhir=="D.IV")){
                                                $nilaikualifikasi="5";
                                            }else{
                                                $nilaikualifikasi="0";
                                            }
                                         }else{
                                            $nilaikualifikasi="0";
                                         }   
                                    ?>
                                    {{ $nilaikualifikasi }}
                                    {{-- <div>{{ $ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir }}</div> --}}
                                </td>
                                <td class="small text-center">  
                                    <?php 
                                         if(count($ib->detPeg->cariJabatan) > 0){
                                            $njab = count($ib->detPeg->cariJabatan);
                                            if($njab >="3"){
                                                $nilaijabatan="10";
                                            }elseif($njab=="2"){
                                                $nilaijabatan="7.5";
                                            }elseif($njab=="1"){
                                                $nilaijabatan="5";
                                            }else{
                                                $nilaijabatan="0";
                                            }
                                         }else{
                                            $nilaijabatan="0";
                                         }
                                    ?>
                                    {{ $nilaijabatan }}
                                    {{-- <div>{{ $ib->detPeg->cariJabatan }}</div> --}}
                                </td>
                                <td class="small text-center">  
                                    <?php
                                        //nilai diklat teknis
                                        
                                        if(count($ib->detPeg->cariDiklatTeknis) > 0){
                                            $nilaidiktek = count($ib->detPeg->cariDiklatTeknis);
                                         }else{
                                            $nilaidiktek="0";
                                         }
                                         //nilai diklat fungsional
                                        if(count($ib->detPeg->cariDiklatFungsional) > 0){
                                            $nilaidikfung = count($ib->detPeg->cariDiklatFungsional);
                                         }else{
                                            $nilaidikfung="0";
                                         }
                                        
                                        $npel=$nilaidiktek+$nilaidikfung;


                                        if($npel >="5"){
                                                $nilaipelatihan="10";
                                        }elseif($npel=="4"){
                                                $nilaipelatihan="8";
                                        }elseif($npel=="3"){
                                                $nilaipelatihan="6";
                                        }elseif($npel=="2"){
                                                $nilaipelatihan="4";
                                        }elseif($npel=="1"){
                                                $nilaipelatihan="2";
                                        }else{
                                                $nilaipelatihan="0";
                                        }

                                    ?>
                                    {{ $nilaipelatihan }}
                                    {{-- <div>{{ $ib->detPeg->cariDiklatTeknis }}</div>
                                    <div>{{ $ib->detPeg->cariDiklatFungsional }}</div> --}}
                                    
                                </td>
                                <td class="small text-center">  
                                    <?php 
                                         if(count($ib->detPeg->cariSertifikatKomp) > 0){
                                            $nsertf = count($ib->detPeg->cariSertifikatKomp);
                                            if($nsertf >="1"){
                                                $nilaisertkomp="10";
                                            }else{
                                                $nilaisertkomp="0";
                                            }
                                         }else{
                                            $nilaisertkomp="0";
                                         }
                                    ?>
                                    {{ $nilaisertkomp }}
                                    {{-- <div>{{ $ib->detPeg->cariSertifikatKomp }}</div> --}}
                                </td>
                                <td class="small">Detail</td>
                            </tr>
                            

                        <?php }  
                            
                        }else{
                        ?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td class="small"> {{ $ib->nip }} <b>{{ $ib->detPeg->News_ID }}</b>  
                               
                            </td>
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
                            <td class="small">{{ $ib->jabatan }}  </td>
                            <td class="small"> {{ $ib->nama_instansi }}</td>
                            
                            <td class="text-center p-2 mx-2">
                               

                                {{-- <div class="{{ $stylena }} text-center h3 p-2 ">{{ $nilaitb }}</div> --}}
                                <?php
                                if($nilaitb=="9"){
                                    $nilaitalenta="60";
                                }elseif($nilaitb=="8"){
                                    $nilaitalenta="55";
                                }elseif($nilaitb=="7"){
                                    $nilaitalenta="50";
                                }elseif($nilaitb=="6"){
                                    $nilaitalenta="45";
                                }elseif($nilaitb=="5"){
                                    $nilaitalenta="40";
                                }elseif($nilaitb=="4"){
                                    $nilaitalenta="30";
                                }elseif($nilaitb=="3"){
                                    $nilaitalenta="20";
                                }elseif($nilaitb=="2"){
                                    $nilaitalenta="10";
                                }elseif($nilaitb=="1"){
                                    $nilaitalenta="0";
                                }else{
                                    $nilaitalenta="0";
                                }    
                                ?>
                                 {{ $nilaitalenta }}
                            </td>
                            <td class="text-center small">
                                <?php 
                                     if(count($ib->detPeg->cariKualifikasi) > 0){
                                        $tkpend_terakhir=str_replace(['.','-'],'',$ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir);

                                        if($tkpend_terakhir=="S3"){
                                            $nilaikualifikasi="10";
                                        }elseif($tkpend_terakhir=="S2"){
                                            $nilaikualifikasi="7.5";
                                        }elseif(($tkpend_terakhir=="S1") or ($tkpend_terakhir=="D.IV")){
                                            $nilaikualifikasi="5";
                                        }else{
                                            $nilaikualifikasi="0";
                                        }
                                     }else{
                                        $nilaikualifikasi="0";
                                     }   
                                ?>
                                {{ $nilaikualifikasi }}
                                {{-- <div>{{ $ib->detPeg->cariKualifikasi }}</div> --}}
                            </td>
                            <td class="small text-center">  
                                <?php 
                                     if(count($ib->detPeg->cariJabatan) > 0){
                                        $njab = count($ib->detPeg->cariJabatan);
                                        if($njab >="3"){
                                            $nilaijabatan="10";
                                        }elseif($njab=="2"){
                                            $nilaijabatan="7.5";
                                        }elseif($njab=="1"){
                                            $nilaijabatan="5";
                                        }else{
                                            $nilaijabatan="0";
                                        }
                                     }else{
                                        $nilaijabatan="0";
                                     }
                                ?>
                                {{ $nilaijabatan }}
                                {{-- <div>{{ $ib->detPeg->cariJabatan }}</div> --}}
                            </td>
                            <td class="small text-center">  
                                <?php
                                    //nilai diklat teknis
                                    
                                    if(count($ib->detPeg->cariDiklatTeknis) > 0){
                                        $nilaidiktek = count($ib->detPeg->cariDiklatTeknis);
                                     }else{
                                        $nilaidiktek="0";
                                     }
                                     //nilai diklat fungsional
                                    if(count($ib->detPeg->cariDiklatFungsional) > 0){
                                        $nilaidikfung = count($ib->detPeg->cariDiklatFungsional);
                                     }else{
                                        $nilaidikfung="0";
                                     }
                                    
                                    $npel=$nilaidiktek+$nilaidikfung;


                                    if($npel >="5"){
                                            $nilaipelatihan="10";
                                    }elseif($npel=="4"){
                                            $nilaipelatihan="8";
                                    }elseif($npel=="3"){
                                            $nilaipelatihan="6";
                                    }elseif($npel=="2"){
                                            $nilaipelatihan="4";
                                    }elseif($npel=="1"){
                                            $nilaipelatihan="2";
                                    }else{
                                            $nilaipelatihan="0";
                                    }

                                ?>
                                {{ $nilaipelatihan }}
                                {{-- <div>{{ $ib->detPeg->cariDiklatTeknis }}</div>
                                <div>{{ $ib->detPeg->cariDiklatFungsional }}</div> --}}
                                
                            </td>
                            <td class="small text-center">  
                                <?php 
                                     if(count($ib->detPeg->cariSertifikatKomp) > 0){
                                        $nsertf = count($ib->detPeg->cariSertifikatKomp);
                                        if($nsertf >="1"){
                                            $nilaisertkomp="10";
                                        }else{
                                            $nilaisertkomp="0";
                                        }
                                     }else{
                                        $nilaisertkomp="0";
                                     }
                                ?>
                                {{ $nilaisertkomp }}
                                {{-- <div>{{ $ib->detPeg->cariSertifikatKomp }}</div> --}}
                            </td>
                            <td class="small">Detail</td>
                        </tr>
                        <?php
                        } $no++; 
                        ?>
                        <?php  
                        }  ?>


                             
                            
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{-- @if(empty($params["key"])) --}}
            <div class="row">
                <div class="col-sm-2 ">
                    Jumlah: <b>{!! $model->total() !!}</b>  Pegawai
                </div>
                <div class="col-sm-8 d-flex justify-content-center">
                    {!! $model->links() !!}
                </div>
                <div class="col-sm-2 text-right">
                    <?php 
                        $total = $model->total();
                        $currentPage = $model->currentPage();
                        $perPage = $model->perPage();

                        $from = ($currentPage - 1) * $perPage + 1;
                        $to = min($currentPage * $perPage, $total);

                        //echo "Showing {$from} to {$to} of {$total} entries";
                    ?>
                    <em>Showing {{ $from }}  to {{ $to }} of {{ $total }} entries</em>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
    <?php 
     }
    ?>
@endsection

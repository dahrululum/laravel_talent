@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts')
<!-- DataTables --> 
<script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>
<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        $('.select2').select2();
        $('#tablena1').DataTable({ "pageLength": 50,
        order: [[11, 'desc']]
    });
    })
</script>

@endsection

 

@section('content')
 
   
<form method="get" id="FormCari" enctype="multipart/form-data">
                 
    <div class="card card-info card-solid">
        <div class="card-header ">
            <h3 class="card-title">Pencarian Pegawai Potensi Untuk Menempati Jabatan via API SatamASN</h3>
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
                <div class="row mt-4 mx-1">
                    <div class="col-lg-2 border-right">
                        <div class="form-group">
                            <label for="">Jenis Jabatan</label>
                            <select name="id_jenjab" id="id_jenjab" class="form-control form-control-sm">
                                <option value="">--Pilih Jenis Jabatan--</option>
                                <option value="1" @if(@$params['id_jenjab']==1) selected @endif>JPT</option>
                                <option value="2" @if(@$params['id_jenjab']==2) selected @endif>Administrator</option>
                                <option value="3" @if(@$params['id_jenjab']==3) selected @endif>Pengawas</option>
                                <option value="4" @if(@$params['id_jenjab']==4) selected @endif>Pelaksana</option>
                                <option value="5" @if(@$params['id_jenjab']==5) selected @endif>Fungsional</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="form-group">
                            <label for="">Instansi/Unit Kerja</label>
                             <select id="idpd" name="idpd" class="form-control form-control-sm select2 " style="width: 100%;">
                             <option value=""  selected>Semua Instansi/Unit Kerja</option>
                                <?php 
                                        $level = 0;
                                        $strip = "--"; 
                                    ?>
                                    @foreach ($insta as $skpd)
                                    @php 
                                        $pd = (object) $skpd;
                                    @endphp
                                    
                                    
                                        @include('admin/sel-pd-ninebox',[
                                        'pd' => $pd,
                                        'level' => $level,
                                        'strip' =>$strip,
                                        ])

                                    
                                    @endforeach

                                
                            </select>
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
    <div class="border bg-white my-2">
        <img src="{{  asset('images/indikator_suksesor.png')  }}" alt="" class="col-md-4">
     </div>
</form>
    <?php 
     if(isset($_GET["submit"])){
        //$key=$_GET['key'];
        $key=strtoupper(@$params['key']);
    ?>
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Hasil Pencarian Pegawai Potensi  {{ $key }}</h3>
        </div>
        <div class="card-body">
            <div class="my-1 mx-2">Kata Kunci :  {{ @$params['key'] }}  </div>
            
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
                        <th> Score</th>
                        <th> # </th>
                        
                        
                         
                            
                        

                    </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($model as $ib) { 
                            if(!empty($key)){
                                //pendidikan
                              $datapend=json_decode($ib->data_api_pendidikan);
                              $rspend=collect($datapend);
                              $capend=$rspend->where('Jurusan',  'like', trim($key));
                              $jcapend=$capend->count();
                              //$capend = array_search(strtolower($key), array_map('strtolower', $rspend));
                              //jabatan
                              $datajab=json_decode($ib->data_api_jabatan);
                              $rsjab=collect($datajab);
                              $cajab=$rsjab->where('Nama_Jbtan',  'like', trim($key))->where('Unit_Krj',  'like', trim($key));
                              $jcajab=$cajab->count();
                              //pelatihan
                              $datadt=json_decode($ib->data_api_diklat_teknis);
                              $rsdt=collect($datadt);
                              $cadt=$rsdt->where('Nama_Kur',  'like', trim($key));
                              $jcadt=$cadt->count();

                              $datadf=json_decode($ib->data_api_diklat_fungsional);
                              $rsdf=collect($datadf);
                              $cadf=$rsdf->where('Nama_Kur',  'like', trim($key));
                              $jcadf=$cadf->count();

                              $npel=$jcadt+$jcadf;
                              
                              //sertifikasi
                              $dataser=json_decode($ib->data_api_sertifikasi);
                              $rsser=collect($dataser);
                              $caser=$rsser->where('Nama_Kur',  'like', trim($key));
                              $jcaser=$caser->count();
                            }else{
                                //pendidikan
                            
                              $jcapend=0;
                              //$capend = array_search(strtolower($key), array_map('strtolower', $rspend));
                              //jabatan
                            
                              $jcajab=0;
                              //pelatihan
                             
                              $jcadt=0;

                             
                              $jcadf=0;

                              $npel=$jcadt+$jcadf;
                              
                              //sertifikasi
                             
                              $jcaser=0;
                            }
                              

                        ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td class="small"> {{ $ib->nip }}  
                                    <div class="text-info">{{ $ib->detPeg->News_ID }}</div>
                                   
                                </td>
                                <td class="small"> {{ $ib->detPeg->NAMA }}</td>
                                <td class="small">
                                    
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
                                <td class="small">{{ strtoupper($ib->detPeg->JABATAN) }}  </td>
                                <td class="small"> {{ strtoupper($ib->detPeg->Instansi) }}</td>
                                <td class="small text-center">
                                   {{-- <div>{{ $ib->data_talentabox }}</div>  --}}
                                   <?php
                                    $nilaitb=$ib->data_talentabox;

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
                                <td class="small text-center" >
                                    {{-- hasilcari: {{ $jcapend }} --}}
                                    {{-- <div>{{ print_r($capend) }}</div> --}}
                                    <div>
                                        {{-- @foreach($datapend as $dpen)
                                        @php 
                                        $dp = (object) $dpen
                                        @endphp
                                        {{ $dp->Comment_ID }}
                                        @endforeach --}}
                                        @php 
                                        $nilaikualifikasi=0;
                                        if($jcapend != 0){
                                            foreach($capend as $dpen){
                                                $dp = (object) $dpen;
                                                $tkpend=str_replace(['.','-'],'',$dp->Tingkat);
                                                //echo $tkpend."<br>";
                                                if($tkpend=="S3"){
                                                    $nilaikualifikasi="10";
                                                }elseif($tkpend=="S2"){
                                                    $nilaikualifikasi="7.5";
                                                }elseif(($tkpend=="S1") or ($tkpend=="D.IV")){
                                                    $nilaikualifikasi="5";
                                                }elseif($tkpend=="D3"){
                                                    $nilaikualifikasi="1";
                                                }
                                                else{
                                                    $nilaikualifikasi="0";
                                                }
                                                
                                            }
                                            
                                        }
                                        @endphp
                                         {{ $nilaikualifikasi }}
                                    </div>
                                </td>
                                <td class="small text-center">
                                    {{-- hasilcari: {{ $cajab }} --}}
                                    {{-- <div>{{ print_r($datajab) }}</div> --}}
                                    <div>
                                        @php
                                        $nilaijabatan=0;
                                            if($jcajab >="3"){
                                            $nilaijabatan="10";
                                            }elseif($jcajab=="2"){
                                                $nilaijabatan="7.5";
                                            }elseif($jcajab=="1"){
                                                $nilaijabatan="5";
                                            }else{
                                                $nilaijabatan="0";
                                            }

                                        @endphp
                                        {{ $nilaijabatan }}
                                    </div>
                                </td>
                                <td class="small text-center">
                                    {{-- hasilcari: {{ $npel }} --}}
                                    <div>
                                        @php
                                        $nilaipelatihan=0;
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

                                        @endphp
                                        {{ $nilaipelatihan }}
                                    </div>
                                    
                                    {{-- <small>{{ $ib->data_api_pelatihan }}</small> --}}
                                </td>
                                 
                                <td class="small text-center">
                                    {{-- hasilcari: {{ $jcaser }} --}}
                                    <div>
                                        @php
                                        $nilaisertkomp=0;
                                        if($jcaser >="1"){
                                        $nilaisertkomp="10";
                                        }else{
                                            $nilaisertkomp="0";
                                        }

                                        @endphp
                                        {{ $nilaisertkomp }}
                                    </div>
                                      {{-- <small>{{ print_r($dataser) }}</small> --}}
                                   
                                </td>
                                <td class="small text-center">
                                    @php 
                                        $score=$nilaitalenta+$nilaikualifikasi+$nilaijabatan+$nilaipelatihan+$nilaisertkomp;
                                        echo $score;
                                    @endphp
                                </td>
                                <td class="small">Detail</td>
                            </tr>
                            

                        
                        <?php
                         $no++; 
                        ?>
                        <?php  
                        }  
                        ?>


                             
                            
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{-- @if(empty($params["key"])) --}}
            {{-- <div class="row">
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
            </div> --}}
            {{-- @endif --}}
        </div>
    </div>
    <?php 
     }
    ?>
@endsection

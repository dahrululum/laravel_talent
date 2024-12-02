@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Select2 -->
    <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts')
<!-- DataTables --> 
<script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>
<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable({ "pageLength": 100 });
         $('.select2').select2();
    })
</script>

@endsection

 

@section('content')


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Filter Data</h3>
    </div> 
    
        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 border-right">
                        <div class="form-group">
                            <label for="">Nama Pegawai</label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="{{ @$params['nama'] }}"   >
                        </div>
                    </div>
                    <div class="col-lg-2 border-right">
                        <div class="form-group">
                            <label for="">NIP Pegawai</label>
                            <input type="text" class="form-control form-control-sm" id="nip" name="nip"  value='{{ @$params['nip'] }}' >
                        </div>
                    </div>
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
                    <div class="col-lg-2 border-right">
                        <div class="form-group">
                            <label for="" class="text-primary">Talent Box</label>
                            <select name="id_box" id="id_box" class="form-control form-control-sm">
                                <option value="">-- Pilih Talent Box --</option>
                                <option value="1" @if(@$params['id_box']==1) selected @endif>Box 1</option>
                                <option value="2" @if(@$params['id_box']==2) selected @endif>Box 2</option>
                                <option value="3" @if(@$params['id_box']==3) selected @endif>Box 3</option>
                                <option value="4" @if(@$params['id_box']==4) selected @endif>Box 4</option>
                                <option value="5" @if(@$params['id_box']==5) selected @endif>Box 5</option>
                                <option value="6" @if(@$params['id_box']==6) selected @endif>Box 6</option>
                                <option value="7" @if(@$params['id_box']==7) selected @endif>Box 7</option>
                                <option value="8" @if(@$params['id_box']==8) selected @endif>Box 8</option>
                                <option value="9" @if(@$params['id_box']==9) selected @endif>Box 9</option>

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
             
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-search"></i> Filter
                        </button>
                    </div>
                </div>
            </div>

    

        </form>
    

</div>


   
     
    <?php
//    if(isset($_GET["submit"])){
//         $nama=$_GET['nama'];
//         $nip=$_GET['nip'];
//         $id_jenjab=$_GET['id_jenjab'];
//         $idpd=$_GET['idpd'];

//          $arrparam="nama=".$nama."&nip=".$nip."&id_jenjab=".$id_jenjab."&idpd=".$idpd;

//          print_r("array ".$arr_param);
//    }
   
    
       
        
    ?>
    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar TalentBox Pegawai  </h3>
                            <div class="card-tools">
                                <a href="{{ URL::to('/admin/export_ninebox'.$arr_param) }}" target="_blank" class="btn btn-success mr-3" id="getExport"> <i class="fas fa-1x fa-download"></i> Excel </a>
                                <a href="{{ URL::to('/admin/print_ninebox'.$arr_param) }}" target="_blank" class="btn btn-dark" id="getPrint"> <i class="fas fa-1x fa-print"></i> Print </a>
                            </div>
                        </div>    
                    <div class="card-body table-responsive p-1">
                        <div class="">
                        

                            <table class="table table-sm  table-hover table-bordered  " id="tablena1">
                                <thead  class="bg-gray">
                                <tr>
                                    <th> No. </th>
                                    <th> NIP </th>
                                    <th> Nama Pegawai </th>
                                    <th> Jenis Jabatan </th>
                                    <th> Jabatan </th>
                                    <th> Instansi/Unit Kerja </th>
                                    <th> SKP </th>
                                    <th> Inovasi </th>
                                    <th> Prestasi </th>
                                    <th> Indisipliner </th>
                                    <th> Kompetensi </th>
                                    <th> Kualifikasi </th>
                                    <th> Riwayat Jabatan </th>
                                    <th> Riwayat Diklat </th>
                                    <th> Kecerdasan Umum </th>
                                    <th> Nilai X </th>
                                    <th> Nilai Y </th>
                                    <th> Talent Box </th>
                                    
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

                                    ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td class="small"> {{ $ib->nip }}</td>
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
                                            <td class="small">{{ strtoupper($ib->detPeg->JABATAN)}}</td>
                                            <td class="small">{{ strtoupper($ib->detPeg->Instansi)}}</td>
                                            <td class="text-center">{{$ib->nilai_skp}}</td>
                                            <td class="text-center">{{$ib->nilai_inovasi}}</td>
                                            <td class="text-center">{{$ib->nilai_prestasi}}</td>
                                            <td class="text-center">{{$ib->nilai_indisipliner}}</td>
                                            <td class="text-center">{{$ib->nilai_kompetensi}}</td>
                                            <td class="text-center">{{$ib->nilai_kualifikasi}}</td>
                                            <td class="text-center">{{$ib->nilai_riwayat_jabatan}}</td>
                                            <td class="text-center">{{$ib->nilai_riwayat_diklat}}</td>
                                            <td class="text-center">{{$ib->nilai_kecerdasan}}</td>
                                            <td class="text-center">{{$ib->nilai_x}}</td>
                                            <td class="text-center">{{$ib->nilai_y}}</td>
                                            <td class="text-center p-2 mx-2"><div class="{{ $stylena }} text-center h3 p-2 ">{{ $nilaitb }}</div></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary mx-1 my-1" href="{{ URL::to('/admin/editninebox/'.$ib->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i>  </a>
                                                <a class="btn btn-danger mx-1 my-1" data-toggle="tooltip" data-placement="top" title="Delete" onClick="if(!confirm('Anda yakin Akan Hapus Data ini !'))return false;" href="{{ URL::to('/admin/delninebox/'.$ib->id) }}"><i class="fa fa-trash"></i>  </a>
                                            </td>
                                        </tr>
                                        

                                    <?php $no++; ?>
                                    <?php } ?>
                                     
                                </tbody>
                            </table>
                        </div>
                        
                        
                       
                    </div>
                    <div class="card-footer">
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
                        
                    </div>
                </div>

@endsection

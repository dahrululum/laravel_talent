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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable({ "pageLength": 10,  "paging": false });
         $('.select2').select2();
    })
</script>
@php 
 
//dd($jptbox1);
@endphp
<script>
  
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
                    <div class="col-lg-12 ">
                     
                        <div class="form-group">
                            <label for="">Instansi/Unit Kerja </label>
                             <select id="idpd" name="idpd" class="form-control form-control-sm select2 " style="width: 100%;">
                             <option value=""  selected>Semua Instansi/Unit Kerja</option>
                                <?php 
                                        $level = 0;
                                        $strip = "--"; 
                                    ?>
                                    @foreach ($insta as $skpd)
                                    
                                    
                                    
                                        @include('admin/sel-pd-ninebox',[
                                        'pd' => $skpd,
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
                        <button class="btn btn-success btn-flat" type="submit">
                            <i class="fa fa-search"></i> Filter
                        </button>
                    </div>
                </div>
            </div>

    

        </form>
    

</div>


    
      

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Rekap Kompetensi Talenta  </h3>
            <div class="card-tools">
                <a href="{{ URL::to('/admin/export_rekapkomptalenta'.$arr_param) }}" target="_blank" class="btn btn-success mr-3" id="getExport"> <i class="fas fa-1x fa-download"></i> Excel </a>
                <a href="{{ URL::to('/admin/print_rekapkomptalenta'.$arr_param) }}" target="_blank" class="btn btn-dark" id="getPrint"> <i class="fas fa-1x fa-print"></i> Print </a>
            </div>
        </div>    
        <div class="card-body table-responsive p-2 ">
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
                        <td>{{ $ib->nip }}</td>
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
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-2 ">
                    Jumlah: <b>{!! $model->total() !!}</b>  Pegawai
                </div>
                <div class="col-sm-8 d-flex justify-content-center">
                    {!! $model->appends($params)->links() !!}
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

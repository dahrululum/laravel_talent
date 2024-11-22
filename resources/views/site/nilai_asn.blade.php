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
                     
                    <div class="card-body border-top">
                        <div class="small-box bg-light mb-4">
                            <div class="inner">
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
                            <table class="table table-bordered">
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
                                        <td class="font-weight-normal text-center">  {{ $indi->nilai_skp }} </td>
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
 
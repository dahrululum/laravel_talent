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
                        <div class=" bg-dark p-2"><h4>DESKRIPSI KOMPETENSI</h4></div>
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
 
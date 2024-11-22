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
                         
                        <div class="">
                            <div class="h5 text-center text-dark">
                                Tabel Nilai Indikator Talenta
                            </div>
                            
                        </div>            
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
 
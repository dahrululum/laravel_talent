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
                <div class="card card-danger ">
                    <div class="card-header">{{ $sesi }}</div>
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
                          {{-- <p class="card-text">
                            Portal Sistem Informasi Layanan Aspirasi  Pengaduan Pelayanan Publik secara Online dan Responsif (SILAPOR) merupakan sarana bagi masyarakat Provinsi Kepulauan Bangka Belitung dalam menyampaikan aspirasi, pengaduan, masukan dan saran bagi Pemerintah Daerah agar terwujudnya Tata Kepemerintahan yang Baik.
                          </p> --}}
                         
                            
                        </div>
                        <div class="col-lg-4 text-center">
                          <img src="{{ url ('images/logo_asnprimadona.png') }}" class="img-box col-lg-8 " >
                        </div>
      
                    </div>
                    </div>
                    <div class="card-body">
                      <p>
                        <b>Sekretariat :</b>  Telp.(0717) 439314, Fax (0717) 439315 <br>
                        <b>Email :</b>  bkpsdmd@babelprov.go.id <br> <b>Website :</b>  bkpsdmd.babelprov@go.id
                      </p>
                      
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
 
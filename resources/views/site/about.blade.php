@extends('site.index')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
<div class=" mt-2">
    <div class="row justify-content-center p-1">
            <div class="col-md-12">
                
                <img src="{{url('images/bann1.jpeg')}}" class="col-md-12">
            </div>    
            {{-- <div class="col-md-5">
                <div class="card card-danger ">
                    <div class="card-header">Tentang Kami</div>
                    <div class="card-body">
                      <p>
                        <b>SiLapor ASN</b>  merupakan sarana yang dapat digunakan untuk mengelola pengaduan, pembinaan dan pengawasan terhadap indikasi, dugaan pelanggaran netralitas dan kode etik Aparatur Sipil Negara di lingkungan Pemerintah Provinsi Kepulauan Bangka Belitung secara efektif dan terintegrasi. 
                      </p>
                      <p>
                        Dalam rangka untuk mewujudkan good governance Pemerintah Provinsi Kepulauan Bangka Belitung membentuk SiLapor ASN dalam memberikan layanan penyampaian semua aspirasi dan pengaduan, pembinaan dan pengawasan di lingkungan Pemerintah Provinsi Kepulauan Bangka Belitung melalui kanal pengaduan pada <a href="https://lapor.babelprov.go.id/silaporasn/register" target="_blank">https://lapor.babelprov.go.id/silaporasn</a> 
                      </p> 
                    </div>
                </div>
            </div> --}}
            
        </div>
    </div>
@endsection
 
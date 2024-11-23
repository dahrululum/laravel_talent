<a href="{{ URL::to('/admin/print_biodata/'.$nip) }}" target="_blank" class="btn btn-info my-md-1 " id="getPrint"> <i class="fas fa-1x fa-print"></i> Print </a>
<div class="card card-dark">
    <div class="card-header ">Biodata Pegawai {{ $nip }}</div>
    <div class="card-body">
        <div class="row p-1">
            <div class="col-sm-3 border mr-4">
                <div>

                </div>
                <div class="mt-2 border-top text-center ">
                    <div class="">{{ $detpeg->NAMA }}</div>
                    <b> {{ $nip }}</b>
                    <div class="h6">{{ $detpeg->JABATAN }}</div>
                    <div class="h6">{{ $detpeg->Instansi }}</div>
                </div>
               
            </div>
            <div class="col-sm-8 border">{{ $nip }}</div>
        </div>
    </div>
</div>
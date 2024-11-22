              
 @extends('layouts.backend.preview')
 @section('styles')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
   <style>
    @media print{
        @page {size: landscape}
        .printna {
             display:none;
            }
    }
  </style>
 @endsection


 @section('content')
 <div class="row printna">
    <div class="col-12 p-2 bg-dark border">
       <a href="#" class="btn btn-primary float-right mx-2" onclick="window.print();return false;"><i class="fa fa-print"></i> Print</a>
       <a href="{{ URL::to('/admin/exporthasilmsvar/'.$keg->alias) }}" class="btn btn-success float-right" ><i class="fa fa-print"></i> Excel</a>
    </div>
    <!-- /.col -->
  </div>
 
 
  <div class="row p-2">
    <div class="col-sm-2 my-2">
        <img src="{{ asset('/images/logosdi_black.png') }}" class="col-md-12">
         
    </div>
    <div class="col-sm-8 my-2 text-center">
      
        <div class="h3 font-weight-normal mb-0"> METADATA VARIABEL</div>
        <div class="h4 font-weight-bold mt-0">INDIKATOR </div>
         
    </div>
    <div class="col-sm-1 my-2">
        <div class="h6 font-weight-bold text-center border border-dark border-1">MS-VAR</div>
        
    </div>
     
     
    
  </div>
  <div class="row p-2">
     
    <div class="col-sm-6 my-2 ">
        <div class="row">
            <div class="col-sm-3 p-2 bg-gray border-top border-dark  font-weight-bold text-center">Nama Kegiatan</div>
            <div class="col-sm-9 p-2 bg-white border-top border-dark border-right  font-weight-bold ">{{ $keg->namakeg }}</div>
            <div class="col-sm-3 p-2 bg-gray border-bottom border-top border-dark text-center"><b>Kode Kegiatan</b>  <br> <em>(diisi oleh petugas)</em></div>
            <div class="col-sm-9 p-2 bg-white border-bottom border-top border-dark border-right font-weight-bold ">{{ $keg->kdkeg }}</div>


        </div>

         
         
    </div>
    <div class="col-sm-6 my-2">
        <div class="row">
            <div class="col-sm-3 p-2 bg-gray border-top border-bottom border-dark font-weight-bold text-center " style="height: 132px;">Penyelenggara</div>
            <div class="col-sm-9 p-2 bg-white border border-dark   "> 
                <div class="row">
                    <div class="col-sm-4 border-bottom border-right">Instansi   </div>
                    <div class="col-sm-8 border-bottom">  {{ $keg->getSKPD->namaskpd }}</div>   
                </div>
                <div class="row">
                    <div class="col-sm-4 border-bottom border-right">Unit Kerja <em>( {{ $es_uk }} )</em>  </div>
                    <div class="col-sm-8 border-bottom">  {{ $keg->getUK->nama_unitkerja }}</div>   
                </div>
                

            </div>
        </div>
        
    </div>
     
     
    
  </div>

 
           
        <div class="p-0" >
            <table class="table table-bordered " id="sssd">
                <thead>
                    <tr >
                        <th class="" > No.</th>
                        
                        <th class="text-center"  > Nama Variabel</th>
                        <th class="text-center" > Alias</th>
                        <th class="text-center" > Konsep </th>
                        <th class="text-center" > Definisi </th>
                        <th class="text-center" > Referensi Pemilihan </th>
                        <th class="text-center" > Referensi Waktu </th>  
                        <th class="text-center" > Tipe Data </th>
                        <th class="text-center" > Klasifikasi Isian </th>
                        <th class="text-center" > Aturan Validasi </th>
                        <th class="text-center" > Kalimat Pertanyaan </th>
                        
                        <th class="text-center" > Apakah Kolom (2) <br> Dapat Diakses Umum? <br> <small>Ya - 1</small> <br> <small>Tidak - 2</small></th>
                        
                     
                    </tr>
                    
                    <tr >
                        <th class="" > <small>(1)</small></th>
                        <th class="text-center" ><small>(2)</small></th>
                        <th class="text-center" > <small>(3)</small></th>
                        <th class="text-center" > <small>(4)</small> </th>
                        <th class="text-center" > <small>(5)</small> </th>
                        <th class="text-center" > <small>(6)</small>  </th>
                        <th class="text-center" > <small>(7)</small> </th>  
                        <th class="text-center" > <small>(8)</small> </th>
                        <th class="text-center" > <small>(9)</small>  </th>
                        <th class="text-center" > <small>(10)</small></th>
                        <th class="text-center" > <small>(11)</small> </th>
                        <th class="text-center" > <small>(12)</small> </th>
                        
                     
                    </tr>
                </thead>
                 
                <tbody>
                    @if(count($ms))
                    @foreach ($ms as $pd)
                     
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        
                        <td >{{ $pd->namavar }}</td>
                        <td>{{ $pd->aliasvar }}  </td>
                        <td>{!! $pd->konsep !!}</td>
                        <td>{!! $pd->definisi !!}</td>
                        <td>{!! $pd->refpilihan !!}</td>
                        <td>{!! $pd->refwaktu !!}</td>
                        <td>{{ $pd->tipedata }}</td>
                        <td>{!! $pd->klasifikasi !!}</td>
                        <td>{!! $pd->aturan !!}</td>
                        
                        <td>{!! $pd->pertanyaan !!}</td>
                        
                        <td>{{ $pd->akses_umum }}</td>
                        


                    </tr>
                    

                    @endforeach
                @else
                    <tr>
                        <td colspan="12">Null</td>
                    </tr>
                @endif
                     
                </tbody>
               
            </table>
        </div>
         
        
  
@endsection
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
        $('#tablena').DataTable({ "pageLength": 100 });
         $('.select2').select2();
    })
</script>
@php 
 
//dd($jptbox1);
@endphp
<script>
    var ctx = document.getElementById('myPieChart');
     
 

var data = {
    labels: [
            'Memenuhi',
            'Masih Memenuhi',
            'Kurang Memenuhi',
            
             
            
        ],
      datasets: [
        {
            fill: true,
            backgroundColor: [
                'green',
                'blue',
                'red',
                'black',
            ],
            data: [{{ $kategori1 }}, {{ $kategori2 }}, {{ $kategori3 }}, ],
            // Notice the borderColor 
            borderColor: "#fff",
            borderWidth: [2,2]
        }
    ]
};

// Notice the rotation from the documentation.

var options = {
        title: {
                  display: true,
                  text: 'What happens when you lend your favorite t-shirt to a girl ?',
                  position: 'top'
              },
        rotation: -0.7 * Math.PI
};


// Chart declaration:
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});
//bar integritas
    const ctx1 = document.getElementById('integritasChart');
    var barChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'INTEGRITAS',
        data: [{{ $integritas3 }}, {{ $integritas2 }}, {{ $integritas1 }}],
        backgroundColor: "#0b88b2"
        }, ]
    }
    });
    const ctx2 = document.getElementById('kerjasamaChart');
    var barChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'KERJASAMA',
        data: [{{ $kerjasama3 }}, {{ $kerjasama2 }}, {{ $kerjasama1 }}],
        backgroundColor: "#0BB267"
        }, ]
    }
    });
    const ctx3 = document.getElementById('komunikasiChart');
    var barChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'KOMUNIKASI',
        data: [{{ $komunikasi3 }}, {{ $komunikasi2 }}, {{ $komunikasi1 }}],
        backgroundColor: "#910BB2"
        }, ]
    }
    });
    const ctx4 = document.getElementById('orientasiChart');
    var barChart = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'ORIENTASI PADA HASIL',
        data: [{{ $orientasi3 }}, {{ $orientasi2 }}, {{ $orientasi1 }}],
        backgroundColor: "#320BB2"
        }, ]
    }
    });
    const ctx5 = document.getElementById('pelayananChart');
    var barChart = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'PELAYANAN',
        data: [{{ $pelayanan3 }}, {{ $pelayanan2 }}, {{ $pelayanan1 }}],
        backgroundColor: "#11B20B"
        }, ]
    }
    });
    const ctx6 = document.getElementById('pengembanganChart');
    var barChart = new Chart(ctx6, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'PENGEMBANGAN',
        data: [{{ $pengembangan3 }}, {{ $pengembangan2 }}, {{ $pengembangan1 }}],
        backgroundColor: "#B2830B"
        }, ]
    }
    });
    const ctx7 = document.getElementById('perubahanChart');
    var barChart = new Chart(ctx7, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'PERUBAHAN',
        data: [{{ $perubahan3 }}, {{ $perubahan2 }}, {{ $perubahan1 }}],
        backgroundColor: "#0BB278"
        }, ]
    }
    });
    const ctx8 = document.getElementById('keputusanChart');
    var barChart = new Chart(ctx8, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'KEPUTUSAN',
        data: [{{ $keputusan3 }}, {{ $keputusan2 }}, {{ $keputusan1 }}],
        backgroundColor: "#AFB20B"
        }, ]
    }
    });
    const ctx9 = document.getElementById('perekatChart');
    var barChart = new Chart(ctx9, {
    type: 'bar',
    data: {
        labels: ["MELEBIHI STANDAR", "MEMENUHI STANDAR", "DIBAWAH STANDAR"  ],
        datasets: [{
        label: 'PEREKAT BANGSA',
        data: [{{ $perekat3 }}, {{ $perekat2 }}, {{ $perekat1 }}],
        backgroundColor: "#B20B0B"
        }, ]
    }
    });

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
            <h3 class="card-title">Grafik Kompetensi  </h3>
        </div>    
        <div class="card-body">
        <?php 
        
            
        ?>
            <div class="row align-items-center">
                 
                {{-- <div class="col-sm-5">
                    <div class="row my-0">
                        <div class="col-7 text-center p-2 bg-dark border-top border-bottom">Keterangan</div>
                        
                    </div>
                    <div class="row my-0">
                        <div class="col-1 text-center p-2 bg-light border-right border-bottom"> <i class="fa fa-circle " style="color:green"></i> </div>
                        <div class="col-4 text-left p-2 bg-light border-bottom">   Memenuhi  </div>
                        <div class="col-2 text-left p-2 bg-light border-bottom">   {{ $kategori1 }}   </div>
                    </div>
                    <div class="row my-0  ">
                        <div class="col-1 text-center p-2 bg-light border-right border-bottom"> <i class="fa fa-circle " style="color:blue"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Masih Memenuhi </div>
                        <div class="col-2 text-left p-2 bg-light border-bottom">   {{ $kategori2 }}    </div>
                    </div>
                    <div class="row  my-0 ">
                        <div class="col-1 text-center bg-light border-right border-bottom p-2"> <i class="fa fa-circle " style="color:red"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Kurang Memenuhi </div>
                        <div class="col-2 text-left p-2 bg-light border-bottom">   {{ $kategori3 }}    </div>
                    </div>
                    <div class="row  my-0 ">
                        <div class="col-1 text-center bg-light border-right border-bottom p-2"> <i class="fa fa-circle " style="color:black"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Null </div>
                        <div class="col-2 text-left p-2 bg-light border-bottom">   {{ $kategori4 }}    </div>
                    </div>
                    
                    <div class="mt-3">
                         
                    </div>
                    
                    
                </div> --}}
                <div class="col-sm-12 ">
                    <div class="p-2 border">
                        <canvas id="myPieChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                    </div>
                   
                </div>
                 
            </div>
            <div class="row mt-2">
                <div class="col-md-4 bg-light">
                    <div class="p-2 border">
                        <canvas id="integritasChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                    
                    {{-- {{$integritas1}}  {{$integritas2}}  {{$integritas3}} --}}
                     
                    
                </div>
                <div class="col-md-4 ">
                    <div class="p-2 border">
                        <canvas id="kerjasamaChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="p-2 border">
                        <canvas id="komunikasiChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="w-100 my-2"></div>
                <div class="col-sm-4 ">
                    <div class="p-2 border">
                        <canvas id="orientasiChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="p-2 border">
                        <canvas id="pelayananChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="p-2 border">
                        <canvas id="pengembanganChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="w-100 my-2"></div>
                <div class="col-sm-4 ">
                    <div class="p-2 border">
                        <canvas id="perubahanChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="p-2 border">
                        <canvas id="keputusanChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="p-2 border">
                        <canvas id="perekatChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
                 
            </div>
            
            
            
            

    
        </div>               
                     
    </div>

@endsection

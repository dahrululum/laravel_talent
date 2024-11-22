 

@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>
  
<script>
  const ctx = document.getElementById('myChart');
  var options = {
  tooltips: {
    enabled: false
  },
  plugins: {
    datalabels: {
      formatter: (value, ctx) => {
        const datapoints = ctx.chart.data.datasets[0].data
         const total = datapoints.reduce((total, datapoint) => total + datapoint, 0)
        const percentage = value / total * 100
        return percentage.toFixed(2) + "%";
      },
      color: '#fff',
    }
  }
};

  new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            'Box 1',
            'Box 2',
            'Box 3',
            'Box 4',
            'Box 5',
            'Box 6',
            'Box 7',
            'Box 8',
            'Box 9',
            
        ],
        datasets: [{
            label: 'Nine Box Talent ',
            data: [{{ $box1 }}, {{ $box2 }}, {{ $box3 }},{{ $box4 }},{{ $box5 }},{{ $box6 }},{{ $box7 }},{{ $box8 }},{{ $box9 }}],
            backgroundColor: [
            'red',
            'blue',
            'yellow',
            'green',
            'purple',
            'grey',
            'cyan',
            'orange',
            'black',
            ],
            borderColor: "#fff"
            }]
    },
    options:  options,
    plugins: [ChartDataLabels],
  });
  //barchart
  //jpt
  @php 
$jptbox1=App\Models\IndikatorBox::jpt($params,1)->count(); 
$jadmbox1=App\Models\IndikatorBox::jadm($params,1)->count(); 
$jpwsbox1=App\Models\IndikatorBox::jpws($params,1)->count(); 
$jpelbox1=App\Models\IndikatorBox::jpel($params,1)->count(); 
$jfungbox1=App\Models\IndikatorBox::jfung($params,1)->count(); 

$jptbox2=App\Models\IndikatorBox::jpt($params,2)->count(); 
$jadmbox2=App\Models\IndikatorBox::jadm($params,2)->count(); 
$jpwsbox2=App\Models\IndikatorBox::jpws($params,2)->count(); 
$jpelbox2=App\Models\IndikatorBox::jpel($params,2)->count(); 
$jfungbox2=App\Models\IndikatorBox::jfung($params,2)->count(); 

$jptbox3=App\Models\IndikatorBox::jpt($params,3)->count(); 
$jadmbox3=App\Models\IndikatorBox::jadm($params,3)->count(); 
$jpwsbox3=App\Models\IndikatorBox::jpws($params,3)->count(); 
$jpelbox3=App\Models\IndikatorBox::jpel($params,3)->count(); 
$jfungbox3=App\Models\IndikatorBox::jfung($params,3)->count(); 

$jptbox4=App\Models\IndikatorBox::jpt($params,4)->count(); 
$jadmbox4=App\Models\IndikatorBox::jadm($params,4)->count(); 
$jpwsbox4=App\Models\IndikatorBox::jpws($params,4)->count(); 
$jpelbox4=App\Models\IndikatorBox::jpel($params,4)->count(); 
$jfungbox4=App\Models\IndikatorBox::jfung($params,4)->count(); 

$jptbox5=App\Models\IndikatorBox::jpt($params,5)->count(); 
$jadmbox5=App\Models\IndikatorBox::jadm($params,5)->count(); 
$jpwsbox5=App\Models\IndikatorBox::jpws($params,5)->count(); 
$jpelbox5=App\Models\IndikatorBox::jpel($params,5)->count(); 
$jfungbox5=App\Models\IndikatorBox::jfung($params,5)->count(); 

$jptbox6=App\Models\IndikatorBox::jpt($params,6)->count(); 
$jadmbox6=App\Models\IndikatorBox::jadm($params,6)->count(); 
$jpwsbox6=App\Models\IndikatorBox::jpws($params,6)->count(); 
$jpelbox6=App\Models\IndikatorBox::jpel($params,6)->count(); 
$jfungbox6=App\Models\IndikatorBox::jfung($params,6)->count(); 

$jptbox7=App\Models\IndikatorBox::jpt($params,7)->count(); 
$jadmbox7=App\Models\IndikatorBox::jadm($params,7)->count(); 
$jpwsbox7=App\Models\IndikatorBox::jpws($params,7)->count(); 
$jpelbox7=App\Models\IndikatorBox::jpel($params,7)->count(); 
$jfungbox7=App\Models\IndikatorBox::jfung($params,7)->count(); 

$jptbox8=App\Models\IndikatorBox::jpt($params,8)->count(); 
$jadmbox8=App\Models\IndikatorBox::jadm($params,8)->count(); 
$jpwsbox8=App\Models\IndikatorBox::jpws($params,8)->count(); 
$jpelbox8=App\Models\IndikatorBox::jpel($params,8)->count(); 
$jfungbox8=App\Models\IndikatorBox::jfung($params,8)->count(); 

$jptbox9=App\Models\IndikatorBox::jpt($params,9)->count(); 
$jadmbox9=App\Models\IndikatorBox::jadm($params,9)->count(); 
$jpwsbox9=App\Models\IndikatorBox::jpws($params,9)->count(); 
$jpelbox9=App\Models\IndikatorBox::jpel($params,9)->count(); 
$jfungbox9=App\Models\IndikatorBox::jfung($params,9)->count(); 
//dd($jptbox1);
@endphp

  const ctx1 = document.getElementById('chartjpt');
    var barChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["Box 1", "Box 2", "Box 3", "Box 4", "Box 5", "Box 6", "Box 7", "Box 8", "Box 9" ],
        datasets: [{
        label: 'JPT',
        data: [{{ $jptbox1 }}, {{ $jptbox2 }}, {{ $jptbox3 }}, {{ $jptbox4 }}, {{ $jptbox5 }}, {{ $jptbox6 }}, {{ $jptbox7 }}, {{ $jptbox8 }}, {{ $jptbox9 }}],
        backgroundColor: "#0b88b2"
        }, ]
    }
    });
    const ctx2= document.getElementById('chartadm');
    var barChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ["Box 1", "Box 2", "Box 3", "Box 4", "Box 5", "Box 6", "Box 7", "Box 8", "Box 9" ],
        datasets: [{
        label: 'Administrator',
        data: [{{ $jadmbox1 }}, {{ $jadmbox2 }}, {{ $jadmbox3 }}, {{ $jadmbox4 }}, {{ $jadmbox5 }}, {{ $jadmbox6 }}, {{ $jadmbox7 }}, {{ $jadmbox8 }}, {{ $jadmbox9 }}],
        backgroundColor: "#0bb21f"
        }, ]
    }
    });
    const ctx3= document.getElementById('chartpws');
    var barChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ["Box 1", "Box 2", "Box 3", "Box 4", "Box 5", "Box 6", "Box 7", "Box 8", "Box 9" ],
        datasets: [{
        label: 'Pengawas',
        data: [{{ $jpwsbox1 }}, {{ $jpwsbox2 }}, {{ $jpwsbox3 }}, {{ $jpwsbox4 }}, {{ $jpwsbox5 }}, {{ $jpwsbox6 }}, {{ $jpwsbox7 }}, {{ $jpwsbox8 }}, {{ $jpwsbox9 }}],
        backgroundColor: "#890bb2"
        }, ]
    }
    });
    const ctx4= document.getElementById('chartpel');
    var barChart = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ["Box 1", "Box 2", "Box 3", "Box 4", "Box 5", "Box 6", "Box 7", "Box 8", "Box 9" ],
        datasets: [{
        label: 'Pelaksana',
        data: [{{ $jpelbox1 }}, {{ $jpelbox2 }}, {{ $jpelbox3 }}, {{ $jpelbox4 }}, {{ $jpelbox5 }}, {{ $jpelbox6 }}, {{ $jpelbox7 }}, {{ $jpelbox8 }}, {{ $jpelbox9 }}],
        backgroundColor: "#d5ce06"
        }, ]
    }
    });
    const ctx5= document.getElementById('chartfung');
    var barChart = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: ["Box 1", "Box 2", "Box 3", "Box 4", "Box 5", "Box 6", "Box 7", "Box 8", "Box 9" ],
        datasets: [{
        label: 'Fungsional',
        data: [{{ $jfungbox1 }}, {{ $jfungbox2 }}, {{ $jfungbox3 }}, {{ $jfungbox4 }}, {{ $jfungbox5 }}, {{ $jfungbox6 }}, {{ $jfungbox7 }}, {{ $jfungbox8 }}, {{ $jfungbox9 }}],
        backgroundColor: "#0ae6e9"
        }, ]
    }
    });
</script>
@endsection

@section('content')
 <div class="row">
    <div class="col-sm-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">GRAFIK KOTAK TALENTA </h3>
        
             
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9 my-2">
                        <canvas id="myChart" style="min-height: 420px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                    </div>
                    <div class="col-sm-3">
                        {{-- <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="bg-dark text-center">#</th>
                                    <th colspan="9" class="bg-dark text-center">BOX</th>
                                </tr>
                                <tr>
                                    
                                    <th class="text-center bg-danger">1</th>
                                    <th class="text-center bg-danger">2</th>
                                    <th class="text-center bg-danger">3</th>
                                    <th class="text-center bg-warning">4</th>
                                    <th class="text-center bg-warning">5</th>
                                    <th class="text-center bg-warning">6</th>
                                    <th class="text-center bg-success">7</th>
                                    <th class="text-center bg-success">8</th>
                                    <th class="text-center bg-primary">9</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jumlah Pegawai  </td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                        $boxna="box".$i;
                                    ?>
                                        <td class="text-center">  {{ $$boxna }}</td>
                                    @endfor
                                    
                                     
                            
                                </tr>
                                 
                                 
                            </tbody>
                            <tfoot>
                                 
                            </tfoot>
                        </table> --}}
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="col-sm-6">Talenta Box</th>
                                    <th>Jumlah Pegawai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Box 1</td>
                                    <td class="text-center">{{ $box1 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 2</td>
                                    <td class="text-center">{{ $box2 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 3</td>
                                    <td class="text-center">{{ $box3 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 4</td>
                                    <td class="text-center">{{ $box4 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 5</td>
                                    <td class="text-center">{{ $box5 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 6</td>
                                    <td class="text-center">{{ $box6 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 7</td>
                                    <td class="text-center">{{ $box7 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 8</td>
                                    <td class="text-center">{{ $box8 }}</td>
                                </tr>
                                <tr>
                                    <td>Box 9</td>
                                    <td class="text-center">{{ $box9 }}</td>
                                </tr>
                            </tbody>
                         </table>
                    </div>
                </div>
                
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-sm-12">
       
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"> POSISI BOX TALENT PER JENJANG JABATAN</h3>
        
              
            </div>
            <div class="card-body p-2">
                <div class="row p-1">
                    <div class="col-sm-3 border mx-1 my-1 bg-light">
                        <canvas id="chartjpt" style="min-height: 420px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                    </div>
                    <div class="col-sm-4 border mx-1 my-1">
                        <canvas id="chartadm" style="min-height: 420px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                    </div>
                    <div class="col-sm-4 border mx-1 my-1">
                        <canvas id="chartpws" style="min-height: 420px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                    </div>
                    <div class="col-sm-4 border mx-1 my-1">
                        <canvas id="chartpel" style="min-height: 420px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                    </div>
                    <div class="col-sm-4 border mx-1 my-1">
                        <canvas id="chartfung" style="min-height: 420px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                    </div>
                </div>
                
                 {{-- <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="col-sm-6">Talenta Box</th>
                            <th>Jumlah Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Box 1</td>
                            <td class="text-center">{{ $box1 }}</td>
                        </tr>
                        <tr>
                            <td>Box 2</td>
                            <td class="text-center">{{ $box2 }}</td>
                        </tr>
                        <tr>
                            <td>Box 3</td>
                            <td class="text-center">{{ $box3 }}</td>
                        </tr>
                        <tr>
                            <td>Box 4</td>
                            <td class="text-center">{{ $box4 }}</td>
                        </tr>
                        <tr>
                            <td>Box 5</td>
                            <td class="text-center">{{ $box5 }}</td>
                        </tr>
                        <tr>
                            <td>Box 6</td>
                            <td class="text-center">{{ $box6 }}</td>
                        </tr>
                        <tr>
                            <td>Box 7</td>
                            <td class="text-center">{{ $box7 }}</td>
                        </tr>
                        <tr>
                            <td>Box 8</td>
                            <td class="text-center">{{ $box8 }}</td>
                        </tr>
                        <tr>
                            <td>Box 9</td>
                            <td class="text-center">{{ $box9 }}</td>
                        </tr>
                    </tbody>
                 </table> --}}
            </div>

            <!-- /.card-body -->
        </div>

    </div>
 </div>

 
  @stop

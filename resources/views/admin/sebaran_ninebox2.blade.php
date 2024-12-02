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
<script> 
    $ ( function () {
        $('#tablena').DataTable({ "pageLength": 100 });
         $('.select2').select2();
    })
</script>
@php 
 
//dd($jptbox1);

$box1=App\Models\IndikatorBox::boxque($params,1)->count();
$box2=App\Models\IndikatorBox::boxque($params,2)->count();
$box3=App\Models\IndikatorBox::boxque($params,3)->count();
$box4=App\Models\IndikatorBox::boxque($params,4)->count();
$box5=App\Models\IndikatorBox::boxque($params,5)->count();
$box6=App\Models\IndikatorBox::boxque($params,6)->count();
$box7=App\Models\IndikatorBox::boxque($params,7)->count();
$box8=App\Models\IndikatorBox::boxque($params,8)->count();
$box9=App\Models\IndikatorBox::boxque($params,9)->count();
@endphp
<script>
    // Create an XY Plotter
    let ninebox1 = new XYPlotter("canvasninebox1");
    
    // Create random XY Points
    jbox1 = {{ $box1 }};
    const xjbox1 = Array(jbox1).fill(0).map(function(){return Math.random() * ninebox1.xMax});
    const yjbox1 = Array(jbox1).fill(0).map(function(){return Math.random() * ninebox1.yMax});
    
     
    
    // Plot the Points
    ninebox1.plotPoints(jbox1, xjbox1, yjbox1, "grey");
   
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius = 5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>

<script>
    // Create an XY Plotter
    let ninebox2 = new XYPlotter("canvasninebox2");
    
    // Create random XY Points
    jbox2 = {{ $box2 }};
    const xjbox2 = Array(jbox2).fill(0).map(function(){return Math.random() * ninebox2.xMax});
    const yjbox2 = Array(jbox2).fill(0).map(function(){return Math.random() * ninebox2.yMax});
    
     
    
    // Plot the Points
    ninebox2.plotPoints(jbox2, xjbox2, yjbox2, "grey");
    
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>

<script>
    // Create an XY Plotter
    let ninebox3 = new XYPlotter("canvasninebox3");
    
    // Create random XY Points
    jbox3 = {{ $box3 }};
    const xjbox3 = Array(jbox3).fill(0).map(function(){return Math.random() * ninebox3.xMax});
    const yjbox3 = Array(jbox3).fill(0).map(function(){return Math.random() * ninebox3.yMax});
    
     
    ninebox3.plotPoints(jbox3, xjbox3, yjbox3, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>
<script>
    // Create an XY Plotter
    let ninebox4 = new XYPlotter("canvasninebox4");
    
    // Create random XY Points
    jbox4 = {{ $box4 }};
    const xjbox4 = Array(jbox4).fill(0).map(function(){return Math.random() * ninebox4.xMax});
    const yjbox4 = Array(jbox4).fill(0).map(function(){return Math.random() * ninebox4.yMax});
    
    
    ninebox4.plotPoints(jbox4, xjbox4, yjbox4, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>
<script>
    // Create an XY Plotter
    let ninebox5 = new XYPlotter("canvasninebox5");
    
    // Create random XY Points
    jbox5 = {{ $box5 }};
    const xjbox5 = Array(jbox5).fill(0).map(function(){return Math.random() * ninebox5.xMax});
    const yjbox5 = Array(jbox5).fill(0).map(function(){return Math.random() * ninebox5.yMax});
    
   
    ninebox5.plotPoints(jbox5, xjbox5, yjbox5, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>

<script>
    // Create an XY Plotter
    let ninebox6 = new XYPlotter("canvasninebox6");
    
    // Create random XY Points
    jbox6 = {{ $box6 }};
    const xjbox6 = Array(jbox6).fill(0).map(function(){return Math.random() * ninebox6.xMax});
    const yjbox6 = Array(jbox6).fill(0).map(function(){return Math.random() * ninebox6.yMax});
    
    ninebox6.plotPoints(jbox6, xjbox6, yjbox6, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>
<script>
    // Create an XY Plotter
    let ninebox7 = new XYPlotter("canvasninebox7");
    
    // Create random XY Points
    jbox7 = {{ $box7 }};
    const xjbox7 = Array(jbox7).fill(0).map(function(){return Math.random() * ninebox7.xMax});
    const yjbox7 = Array(jbox7).fill(0).map(function(){return Math.random() * ninebox7.yMax});
   
    ninebox7.plotPoints(jbox7, xjbox7, yjbox7, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius = 5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>
<script>
    // Create an XY Plotter
    let ninebox8 = new XYPlotter("canvasninebox8");
    
    // Create random XY Points
    jbox8 = {{ $box8 }};
    const xjbox8 = Array(jbox8).fill(0).map(function(){return Math.random() * ninebox8.xMax});
    const yjbox8 = Array(jbox8).fill(0).map(function(){return Math.random() * ninebox8.yMax});
     
    ninebox8.plotPoints(jbox8, xjbox8, yjbox8, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =5) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>
<script>
    // Create an XY Plotter
    let ninebox9 = new XYPlotter("canvasninebox9");
    
    // Create random XY Points
    jbox9 = {{ $box9 }};
    const xjbox9 = Array(jbox9).fill(0).map(function(){return Math.random() * ninebox9.xMax});
    const yjbox9 = Array(jbox9).fill(0).map(function(){return Math.random() * ninebox9.yMax});
     
    ninebox9.plotPoints(jbox9, xjbox9, yjbox9, "grey");
    
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =4) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script>

{{-- <script>
    // Create an XY Plotter
    let myPlotter = new XYPlotter("myCanvas");
    
    // Create random XY Points
    numPoints = 10;
    const xPoints = Array(numPoints).fill(0).map(function(){return Math.random() * myPlotter.xMax});
    const yPoints = Array(numPoints).fill(0).map(function(){return Math.random() * myPlotter.yMax});
    
    numPoints2 = 40;
    const xPoints2 = Array(numPoints2).fill(0).map(function(){return Math.random() * myPlotter.xMax});
    const yPoints2 = Array(numPoints2).fill(0).map(function(){return Math.random() * myPlotter.yMax});
    
    numPoints3 = 30;
    const xPoints3 = Array(numPoints2).fill(0).map(function(){return Math.random() * myPlotter.xMax});
    const yPoints3 = Array(numPoints2).fill(0).map(function(){return Math.random() * myPlotter.yMax});
    
    // Plot the Points
    myPlotter.plotPoints(numPoints, xPoints, yPoints, "blue");
    myPlotter.plotPoints(numPoints2, xPoints2, yPoints2, "red");
    myPlotter.plotPoints(numPoints3, xPoints3, yPoints3, "green");
    // Plotter Object
    function XYPlotter(id) {
    
    this.canvas = document.getElementById(id);
    this.ctx = this.canvas.getContext("2d");
    this.xMin = 0;
    this.yMin = 0;
    this.xMax = this.canvas.width;
    this.yMax = this.canvas.height;
    
    // Plot Points Function
    this.plotPoints = function(n, xArr, yArr, color, radius =4) {
      for (let i = 0; i < n; i++) {
        this.ctx.fillStyle = color;
        this.ctx.beginPath();
        this.ctx.ellipse(xArr[i], yArr[i], radius, radius, 0, 0, Math.PI * 2);
        this.ctx.fill();
      }
    }
    
    } // End Plotter Object
</script> --}}
@endsection

 

@section('content')


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Filter Data</h3>
    </div> 
    
        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-lg-2 border-right">
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
                    </div> --}}
                    <div class="col-lg-3 border-right">
                        <div class="form-group">
                            <label for="">Jenis Jabatan</label>
                            <select name="id_jenjab" id="id_jenjab" class="form-control form-control-sm">
                                <option value="">--Semua Jenis Jabatan--</option>
                                <option value="1" @if(@$params['id_jenjab']==1) selected @endif>JPT</option>
                                <option value="2" @if(@$params['id_jenjab']==2) selected @endif>Administrator</option>
                                <option value="3" @if(@$params['id_jenjab']==3) selected @endif>Pengawas</option>
                                <option value="4" @if(@$params['id_jenjab']==4) selected @endif>Pelaksana</option>
                                <option value="5" @if(@$params['id_jenjab']==5) selected @endif>Fungsional</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5 ">
                     
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
            <h3 class="card-title">Peta Sebaran TalentBox Pegawai {{$jmlIB}}</h3>
        </div>    
        <div class="card-body">
         
            <div class="row align-items-center">
                <div class="col-sm-12">
                    {{-- <div class="row my-0">
                        <div class="col-5 text-center p-2 bg-dark border-top border-bottom">Keterangan</div>
                        
                    </div>
                    <div class="row my-0">
                        <div class="col-1 text-center p-2 bg-light border-right border-bottom"> <i class="fa fa-circle " style="color:red"></i> </div>
                        <div class="col-4 text-left p-2 bg-light border-bottom">   JPT </div>
                    </div>
                    <div class="row my-0  ">
                        <div class="col-1 text-center p-2 bg-light border-right border-bottom"> <i class="fa fa-circle " style="color:blue"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Administrator </div>
                    </div>
                    <div class="row  my-0 ">
                        <div class="col-1 text-center bg-light border-right border-bottom p-2"> <i class="fa fa-circle " style="color:green"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Pengawas </div>
                    </div>
                    <div class="row  my-0 ">
                        <div class="col-1 text-center bg-light border-right border-bottom p-2"> <i class="fa fa-circle " style="color:orange"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Pelaksana </div>
                    </div>
                    <div class="row  my-0 ">
                        <div class="col-1 text-center bg-light border-right border-bottom p-2"> <i class="fa fa-circle " style="color:grey"></i> </div>
                        <div class="col-4 text-left bg-light p-2 border-bottom">   Fungsional </div>
                    </div> --}}
                    <div class="mt-3">
                        <table class="table table-bordered table-sm">
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
                                        $jbox1=App\Models\IndikatorBox::boxque($params,$i)->count(); 
                                    ?>
                                        <td class="text-center">  {{ $jbox1 }}</td>
                                    @endfor
                                    
                                     
                            
                                </tr>
                                 
                                 
                            </tbody>
                            <tfoot>
                                {{-- <tr class="bg-dark">
                                    <td class="text-center small">Jumlah </td>
                                    <td class="text-center small">{{$box1}}</td>
                                    <td class="text-center small">{{$box2}}</td>
                                    <td class="text-center small">{{$box3}}</td>
                                    <td class="text-center small">{{$box4}}</td>
                                    <td class="text-center small">{{$box5}}</td>
                                    <td class="text-center small">{{$box6}}</td>
                                    <td class="text-center small">{{$box7}}</td>
                                    <td class="text-center small">{{$box8}}</td>
                                    <td class="text-center small">{{$box9}}</td>
                                     
                                </tr> --}}
                            </tfoot>
                        </table>
                    </div>
                    
                    
                </div>
                <div class="col-sm-12 ">
                    <div class="row my-1 position-relative ">
                     
                        <div class="col-sm-3 border border-warning  p-0 mx-1  ">
                            <div class="bg-warning text-center position-absolute" style="width: 40px; height:30px; display:block;">4</div>
                            <canvas id="canvasninebox4" class="p-1"  style="width:100%; height:100%; border:0px solid black"></canvas>
                        </div>
                        <div class="col-sm-3 border border-success p-0 mx-1">
                            <div class="bg-success text-center position-absolute" style="width: 40px; height:30px; display:block;">7</div>
                            <canvas id="canvasninebox7" class="p-1"  style="width:100%; height:100%; border:0px solid black"></canvas>
                        </div>
                        <div class="col-sm-3 border border-primary p-0 mx-1">
                            <div class="bg-primary text-center position-absolute" style="width: 40px; height:30px; display:block;">9</div>
                            <canvas id="canvasninebox9" class="p-1"  style="width:100%; height:100%;   border:0px solid black"></canvas>
                        </div>
                    </div>
                    <div class="row my-1 position-relative ">
                     
                        <div class="col-sm-3 border border-danger  p-0 mx-1  ">
                            <div class="bg-danger text-center position-absolute" style="width: 40px; height:30px; display:block;">2</div>
                            <canvas id="canvasninebox2" class="p-1"  style="width:100%; height:100%; border:0px solid black"></canvas>
                        </div>
                        <div class="col-sm-3 border border-warning p-0 mx-1">
                            <div class="bg-warning text-center position-absolute" style="width: 40px; height:30px; display:block;">5</div>
                            <canvas id="canvasninebox5" class="p-1"  style="width:100%; height:100%; border:0px solid black"></canvas>
                        </div>
                        <div class="col-sm-3 border border-success p-0 mx-1">
                            <div class="bg-success text-center position-absolute" style="width: 40px; height:30px; display:block;">8</div>
                            <canvas id="canvasninebox8" class="p-1"  style="width:100%; height:100%;   border:0px solid black"></canvas>
                        </div>
                    </div>
                    <div class="row my-1 position-relative ">
                     
                        <div class="col-sm-3 border border-danger  p-0 mx-1  ">
                            <div class="bg-danger text-center position-absolute" style="width: 40px; height:30px; display:block;">1</div>
                            <canvas id="canvasninebox1" class="p-1"  style="width:100%; height:100%; border:0px solid black"></canvas>
                        </div>
                        <div class="col-sm-3 border border-danger p-0 mx-1">
                            <div class="bg-danger text-center position-absolute" style="width: 40px; height:30px; display:block;">3</div>
                            <canvas id="canvasninebox3" class="p-1"  style="width:100%; height:100%; border:0px solid black"></canvas>
                        </div>
                        <div class="col-sm-3 border border-warning p-0 mx-1">
                            <div class="bg-warning text-center position-absolute" style="width: 40px; height:30px; display:block;">6</div>
                            <canvas id="canvasninebox6" class="p-1"  style="width:100%; height:100%;   border:0px solid black"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="border bg-white my-2">
                <img src="{{  asset('images/indikator_rekomendasi.png')  }}" alt="" class="col-md-4">
             </div>

    
        </div>               
                     
    </div>

@endsection

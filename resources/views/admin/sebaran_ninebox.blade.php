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
<script>
    // Create an XY Plotter
    let ninebox1 = new XYPlotter("canvasninebox1");
    
    // Create random XY Points
    jptb1 = {{ $jptbox1 }};
    const xPoints1 = Array(jptb1).fill(0).map(function(){return Math.random() * ninebox1.xMax});
    const yPoints1 = Array(jptb1).fill(0).map(function(){return Math.random() * ninebox1.yMax});
    
    jadmb1 = {{ $jadmbox1 }};
    const xPoints2 = Array(jadmb1).fill(0).map(function(){return Math.random() * ninebox1.xMax});
    const yPoints2 = Array(jadmb1).fill(0).map(function(){return Math.random() * ninebox1.yMax});
    
    jpwsb1 = {{ $jpwsbox1 }};
    const xPoints3 = Array(jpwsb1).fill(0).map(function(){return Math.random() * ninebox1.xMax});
    const yPoints3 = Array(jpwsb1).fill(0).map(function(){return Math.random() * ninebox1.yMax});

    jpelb1 = {{ $jpelbox1 }};
    const xPoints4 = Array(jpelb1).fill(0).map(function(){return Math.random() * ninebox1.xMax});
    const yPoints4 = Array(jpelb1).fill(0).map(function(){return Math.random() * ninebox1.yMax});

    jfungb1 = {{ $jfungbox1 }};
    const xPoints5 = Array(jfungb1).fill(0).map(function(){return Math.random() * ninebox1.xMax});
    const yPoints5 = Array(jfungb1).fill(0).map(function(){return Math.random() * ninebox1.yMax});
    
    // Plot the Points
    ninebox1.plotPoints(jptb1, xPoints1, yPoints1, "red");
    ninebox1.plotPoints(jadmb1, xPoints2, yPoints2, "blue");
    ninebox1.plotPoints(jpwsb1, xPoints3, yPoints3, "green");
    ninebox1.plotPoints(jpelb1, xPoints4, yPoints4, "orange");
    ninebox1.plotPoints(jfungb1, xPoints5, yPoints5, "grey");
    
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

<script>
    // Create an XY Plotter
    let ninebox2 = new XYPlotter("canvasninebox2");
    
    // Create random XY Points
    jptb2 = {{ $jptbox2 }};
    const xjptb2 = Array(jptb2).fill(0).map(function(){return Math.random() * ninebox2.xMax});
    const yjptb2 = Array(jptb2).fill(0).map(function(){return Math.random() * ninebox2.yMax});
    
    jadmb2 = {{ $jadmbox2 }};
    const xjadmb2 = Array(jadmb2).fill(0).map(function(){return Math.random() * ninebox2.xMax});
    const yjadmb2 = Array(jadmb2).fill(0).map(function(){return Math.random() * ninebox2.yMax});
    
    jpwsb2 = {{ $jpwsbox2 }};
    const xjpwsb2 = Array(jpwsb2).fill(0).map(function(){return Math.random() * ninebox2.xMax});
    const yjpwsb2 = Array(jpwsb2).fill(0).map(function(){return Math.random() * ninebox2.yMax});

    jpelb2 = {{ $jpelbox2 }};
    const xjpelb2 = Array(jpelb2).fill(0).map(function(){return Math.random() * ninebox2.xMax});
    const yjpelb2 = Array(jpelb2).fill(0).map(function(){return Math.random() * ninebox2.yMax});

    jfungb2 = {{ $jfungbox2 }};
    const xjfungb2 = Array(jfungb2).fill(0).map(function(){return Math.random() * ninebox2.xMax});
    const yjfungb2 = Array(jfungb2).fill(0).map(function(){return Math.random() * ninebox2.yMax});
    
    // Plot the Points
    ninebox2.plotPoints(jptb2, xjptb2, yjptb2, "red");
    ninebox2.plotPoints(jadmb2, xjadmb2, yjadmb2, "blue");
    ninebox2.plotPoints(jpwsb2, xjpwsb2, yjpwsb2, "green");
    ninebox2.plotPoints(jpelb2, xjpelb2, yjpelb2, "orange");
    ninebox2.plotPoints(jfungb2, xjfungb2, yjfungb2, "grey");
    
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

<script>
    // Create an XY Plotter
    let ninebox3 = new XYPlotter("canvasninebox3");
    
    // Create random XY Points
    jptb3 = {{ $jptbox3 }};
    const xjptb3 = Array(jptb3).fill(0).map(function(){return Math.random() * ninebox3.xMax});
    const yjptb3 = Array(jptb3).fill(0).map(function(){return Math.random() * ninebox3.yMax});
    
    jadmb3 = {{ $jadmbox3 }};
    const xjadmb3 = Array(jadmb3).fill(0).map(function(){return Math.random() * ninebox3.xMax});
    const yjadmb3 = Array(jadmb3).fill(0).map(function(){return Math.random() * ninebox3.yMax});
    
    jpwsb3 = {{ $jpwsbox3 }};
    const xjpwsb3 = Array(jpwsb3).fill(0).map(function(){return Math.random() * ninebox3.xMax});
    const yjpwsb3 = Array(jpwsb3).fill(0).map(function(){return Math.random() * ninebox3.yMax});

    jpelb3 = {{ $jpelbox3 }};
    const xjpelb3 = Array(jpelb3).fill(0).map(function(){return Math.random() * ninebox3.xMax});
    const yjpelb3 = Array(jpelb3).fill(0).map(function(){return Math.random() * ninebox3.yMax});

    jfungb3 = {{ $jfungbox3 }};
    const xjfungb3 = Array(jfungb3).fill(0).map(function(){return Math.random() * ninebox3.xMax});
    const yjfungb3 = Array(jfungb3).fill(0).map(function(){return Math.random() * ninebox3.yMax});
    
    // Plot the Points
    ninebox3.plotPoints(jptb3, xjptb3, yjptb3, "red");
    ninebox3.plotPoints(jadmb3, xjadmb3, yjadmb3, "blue");
    ninebox3.plotPoints(jpwsb3, xjpwsb3, yjpwsb3, "green");
    ninebox3.plotPoints(jpelb3, xjpelb3, yjpelb3, "orange");
    ninebox3.plotPoints(jfungb3, xjfungb3, yjfungb3, "grey");
    
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
<script>
    // Create an XY Plotter
    let ninebox4 = new XYPlotter("canvasninebox4");
    
    // Create random XY Points
    jptb4 = {{ $jptbox4 }};
    const xjptb4 = Array(jptb4).fill(0).map(function(){return Math.random() * ninebox4.xMax});
    const yjptb4 = Array(jptb4).fill(0).map(function(){return Math.random() * ninebox4.yMax});
    
    jadmb4 = {{ $jadmbox4 }};
    const xjadmb4 = Array(jadmb4).fill(0).map(function(){return Math.random() * ninebox4.xMax});
    const yjadmb4 = Array(jadmb4).fill(0).map(function(){return Math.random() * ninebox4.yMax});
    
    jpwsb4 = {{ $jpwsbox4 }};
    const xjpwsb4 = Array(jpwsb4).fill(0).map(function(){return Math.random() * ninebox4.xMax});
    const yjpwsb4 = Array(jpwsb4).fill(0).map(function(){return Math.random() * ninebox4.yMax});

    jpelb4 = {{ $jpelbox4 }};
    const xjpelb4 = Array(jpelb4).fill(0).map(function(){return Math.random() * ninebox4.xMax});
    const yjpelb4 = Array(jpelb4).fill(0).map(function(){return Math.random() * ninebox4.yMax});

    jfungb4 = {{ $jfungbox4 }};
    const xjfungb4 = Array(jfungb4).fill(0).map(function(){return Math.random() * ninebox4.xMax});
    const yjfungb4 = Array(jfungb4).fill(0).map(function(){return Math.random() * ninebox4.yMax});
    
    // Plot the Points
    ninebox4.plotPoints(jptb4, xjptb4, yjptb4, "red");
    ninebox4.plotPoints(jadmb4, xjadmb4, yjadmb4, "blue");
    ninebox4.plotPoints(jpwsb4, xjpwsb4, yjpwsb4, "green");
    ninebox4.plotPoints(jpelb4, xjpelb4, yjpelb4, "orange");
    ninebox4.plotPoints(jfungb4, xjfungb4, yjfungb4, "grey");
    
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
<script>
    // Create an XY Plotter
    let ninebox5 = new XYPlotter("canvasninebox5");
    
    // Create random XY Points
    jptb5 = {{ $jptbox5 }};
    const xjptb5 = Array(jptb5).fill(0).map(function(){return Math.random() * ninebox5.xMax});
    const yjptb5 = Array(jptb5).fill(0).map(function(){return Math.random() * ninebox5.yMax});
    
    jadmb5 = {{ $jadmbox5 }};
    const xjadmb5 = Array(jadmb5).fill(0).map(function(){return Math.random() * ninebox5.xMax});
    const yjadmb5 = Array(jadmb5).fill(0).map(function(){return Math.random() * ninebox5.yMax});
    
    jpwsb5 = {{ $jpwsbox5 }};
    const xjpwsb5 = Array(jpwsb5).fill(0).map(function(){return Math.random() * ninebox5.xMax});
    const yjpwsb5 = Array(jpwsb5).fill(0).map(function(){return Math.random() * ninebox5.yMax});

    jpelb5 = {{ $jpelbox5 }};
    const xjpelb5 = Array(jpelb5).fill(0).map(function(){return Math.random() * ninebox5.xMax});
    const yjpelb5 = Array(jpelb5).fill(0).map(function(){return Math.random() * ninebox5.yMax});

    jfungb5 = {{ $jfungbox5 }};
    const xjfungb5 = Array(jfungb5).fill(0).map(function(){return Math.random() * ninebox5.xMax});
    const yjfungb5 = Array(jfungb5).fill(0).map(function(){return Math.random() * ninebox5.yMax});
    
    // Plot the Points
    ninebox5.plotPoints(jptb5, xjptb5, yjptb5, "red");
    ninebox5.plotPoints(jadmb5, xjadmb5, yjadmb5, "blue");
    ninebox5.plotPoints(jpwsb5, xjpwsb5, yjpwsb5, "green");
    ninebox5.plotPoints(jpelb5, xjpelb5, yjpelb5, "orange");
    ninebox5.plotPoints(jfungb5, xjfungb5, yjfungb5, "grey");
    
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

<script>
    // Create an XY Plotter
    let ninebox6 = new XYPlotter("canvasninebox6");
    
    // Create random XY Points
    jptb6 = {{ $jptbox6 }};
    const xjptb6 = Array(jptb6).fill(0).map(function(){return Math.random() * ninebox6.xMax});
    const yjptb6 = Array(jptb6).fill(0).map(function(){return Math.random() * ninebox6.yMax});
    
    jadmb6 = {{ $jadmbox6 }};
    const xjadmb6 = Array(jadmb6).fill(0).map(function(){return Math.random() * ninebox6.xMax});
    const yjadmb6 = Array(jadmb6).fill(0).map(function(){return Math.random() * ninebox6.yMax});
    
    jpwsb6 = {{ $jpwsbox6 }};
    const xjpwsb6 = Array(jpwsb6).fill(0).map(function(){return Math.random() * ninebox6.xMax});
    const yjpwsb6 = Array(jpwsb6).fill(0).map(function(){return Math.random() * ninebox6.yMax});

    jpelb6 = {{ $jpelbox6 }};
    const xjpelb6 = Array(jpelb6).fill(0).map(function(){return Math.random() * ninebox6.xMax});
    const yjpelb6 = Array(jpelb6).fill(0).map(function(){return Math.random() * ninebox6.yMax});

    jfungb6 = {{ $jfungbox6 }};
    const xjfungb6 = Array(jfungb6).fill(0).map(function(){return Math.random() * ninebox6.xMax});
    const yjfungb6 = Array(jfungb6).fill(0).map(function(){return Math.random() * ninebox6.yMax});
    
    // Plot the Points
    ninebox6.plotPoints(jptb6, xjptb6, yjptb6, "red");
    ninebox6.plotPoints(jadmb6, xjadmb6, yjadmb6, "blue");
    ninebox6.plotPoints(jpwsb6, xjpwsb6, yjpwsb6, "green");
    ninebox6.plotPoints(jpelb6, xjpelb6, yjpelb6, "orange");
    ninebox6.plotPoints(jfungb6, xjfungb6, yjfungb6, "grey");
    
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
<script>
    // Create an XY Plotter
    let ninebox7 = new XYPlotter("canvasninebox7");
    
    // Create random XY Points
    jptb7 = {{ $jptbox7 }};
    const xjptb7 = Array(jptb7).fill(0).map(function(){return Math.random() * ninebox7.xMax});
    const yjptb7 = Array(jptb7).fill(0).map(function(){return Math.random() * ninebox7.yMax});
    
    jadmb7 = {{ $jadmbox7 }};
    const xjadmb7 = Array(jadmb7).fill(0).map(function(){return Math.random() * ninebox7.xMax});
    const yjadmb7 = Array(jadmb7).fill(0).map(function(){return Math.random() * ninebox7.yMax});
    
    jpwsb7 = {{ $jpwsbox7 }};
    const xjpwsb7 = Array(jpwsb7).fill(0).map(function(){return Math.random() * ninebox7.xMax});
    const yjpwsb7 = Array(jpwsb7).fill(0).map(function(){return Math.random() * ninebox7.yMax});

    jpelb7 = {{ $jpelbox7 }};
    const xjpelb7 = Array(jpelb7).fill(0).map(function(){return Math.random() * ninebox7.xMax});
    const yjpelb7 = Array(jpelb7).fill(0).map(function(){return Math.random() * ninebox7.yMax});

    jfungb7 = {{ $jfungbox7 }};
    const xjfungb7 = Array(jfungb7).fill(0).map(function(){return Math.random() * ninebox7.xMax});
    const yjfungb7 = Array(jfungb7).fill(0).map(function(){return Math.random() * ninebox7.yMax});
    
    // Plot the Points
    ninebox7.plotPoints(jptb7, xjptb7, yjptb7, "red");
    ninebox7.plotPoints(jadmb7, xjadmb7, yjadmb7, "blue");
    ninebox7.plotPoints(jpwsb7, xjpwsb7, yjpwsb7, "green");
    ninebox7.plotPoints(jpelb7, xjpelb7, yjpelb7, "orange");
    ninebox7.plotPoints(jfungb7, xjfungb7, yjfungb7, "grey");
    
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
<script>
    // Create an XY Plotter
    let ninebox8 = new XYPlotter("canvasninebox8");
    
    // Create random XY Points
    jptb8 = {{ $jptbox8 }};
    const xjptb8 = Array(jptb8).fill(0).map(function(){return Math.random() * ninebox8.xMax});
    const yjptb8 = Array(jptb8).fill(0).map(function(){return Math.random() * ninebox8.yMax});
    
    jadmb8 = {{ $jadmbox8 }};
    const xjadmb8 = Array(jadmb8).fill(0).map(function(){return Math.random() * ninebox8.xMax});
    const yjadmb8 = Array(jadmb8).fill(0).map(function(){return Math.random() * ninebox8.yMax});
    
    jpwsb8 = {{ $jpwsbox8 }};
    const xjpwsb8 = Array(jpwsb8).fill(0).map(function(){return Math.random() * ninebox8.xMax});
    const yjpwsb8 = Array(jpwsb8).fill(0).map(function(){return Math.random() * ninebox8.yMax});

    jpelb8 = {{ $jpelbox8 }};
    const xjpelb8 = Array(jpelb8).fill(0).map(function(){return Math.random() * ninebox8.xMax});
    const yjpelb8 = Array(jpelb8).fill(0).map(function(){return Math.random() * ninebox8.yMax});

    jfungb8 = {{ $jfungbox8 }};
    const xjfungb8 = Array(jfungb8).fill(0).map(function(){return Math.random() * ninebox8.xMax});
    const yjfungb8 = Array(jfungb8).fill(0).map(function(){return Math.random() * ninebox8.yMax});
    
    // Plot the Points
    ninebox8.plotPoints(jptb8, xjptb8, yjptb8, "red");
    ninebox8.plotPoints(jadmb8, xjadmb8, yjadmb8, "blue");
    ninebox8.plotPoints(jpwsb8, xjpwsb8, yjpwsb8, "green");
    ninebox8.plotPoints(jpelb8, xjpelb8, yjpelb8, "orange");
    ninebox8.plotPoints(jfungb8, xjfungb8, yjfungb8, "grey");
    
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
<script>
    // Create an XY Plotter
    let ninebox9 = new XYPlotter("canvasninebox9");
    
    // Create random XY Points
    jptb9 = {{ $jptbox9 }};
    const xjptb9 = Array(jptb9).fill(0).map(function(){return Math.random() * ninebox9.xMax});
    const yjptb9 = Array(jptb9).fill(0).map(function(){return Math.random() * ninebox9.yMax});
    
    jadmb9 = {{ $jadmbox9 }};
    const xjadmb9 = Array(jadmb9).fill(0).map(function(){return Math.random() * ninebox9.xMax});
    const yjadmb9 = Array(jadmb9).fill(0).map(function(){return Math.random() * ninebox9.yMax});
    
    jpwsb9 = {{ $jpwsbox9 }};
    const xjpwsb9 = Array(jpwsb9).fill(0).map(function(){return Math.random() * ninebox9.xMax});
    const yjpwsb9 = Array(jpwsb9).fill(0).map(function(){return Math.random() * ninebox9.yMax});

    jpelb9 = {{ $jpelbox9 }};
    const xjpelb9 = Array(jpelb9).fill(0).map(function(){return Math.random() * ninebox9.xMax});
    const yjpelb9 = Array(jpelb9).fill(0).map(function(){return Math.random() * ninebox9.yMax});

    jfungb9 = {{ $jfungbox9 }};
    const xjfungb9 = Array(jfungb9).fill(0).map(function(){return Math.random() * ninebox9.xMax});
    const yjfungb9 = Array(jfungb9).fill(0).map(function(){return Math.random() * ninebox9.yMax});
    
    // Plot the Points
    ninebox9.plotPoints(jptb9, xjptb9, yjptb9, "red");
    ninebox9.plotPoints(jadmb9, xjadmb9, yjadmb9, "blue");
    ninebox9.plotPoints(jpwsb9, xjpwsb9, yjpwsb9, "green");
    ninebox9.plotPoints(jpelb9, xjpelb9, yjpelb9, "orange");
    ninebox9.plotPoints(jfungb9, xjfungb9, yjfungb9, "grey");
    
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
                    {{-- <div class="col-lg-3 border-right">
                        <div class="form-group">
                            <label for="">Jenis Jabatan</label>
                            <select name="id_jenjab" id="id_jenjab" class="form-control form-control-sm">
                                <option value="">--Pilih Jenis Jabatan--</option>
                                <option value="1" @if(@$params['id_jenjab']==1) selected @endif>JPT</option>
                                <option value="2" @if(@$params['id_jenjab']==2) selected @endif>Administrator</option>
                                <option value="3" @if(@$params['id_jenjab']==3) selected @endif>Pengawas</option>
                                <option value="4" @if(@$params['id_jenjab']==4) selected @endif>Pelaksana</option>
                                <option value="5" @if(@$params['id_jenjab']==5) selected @endif>Fungsional</option>

                            </select>
                        </div>
                    </div> --}}
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
        <?php 
            // foreach ($model as $ib) {
            //     # code...
            //     // $box1=App\Models\IndikatorBox::where('nilai_tb',1)
            //     //             ->where('id_instansi',$ib->id_instansi)
            //     //             ->where('id_jenis_jabatan',$ib->id_jenis_jabatan)
            //     //             ->count();
            //     // $box2=App\Models\IndikatorBox::where('nilai_tb',2)->count();
            //     // $box3=App\Models\IndikatorBox::where('nilai_tb',3)->count();
            //     // $box4=App\Models\IndikatorBox::where('nilai_tb',4)->count();
            //     // $box5=App\Models\IndikatorBox::where('nilai_tb',5)->count();
            //     // $box6=App\Models\IndikatorBox::where('nilai_tb',6)->count();
            //     // $box7=App\Models\IndikatorBox::where('nilai_tb',7)->count();
            //     // $box8=App\Models\IndikatorBox::where('nilai_tb',8)->count();
            //     // $box9=App\Models\IndikatorBox::where('nilai_tb',9)->count();
            //     $idinsta=$ib->id_instansi;
                
            // }

            //$idinsta=$params['idpd'];

            //print_r("idpd ".$idinsta);
            
        ?>
            <div class="row align-items-center">
                <div class="col-sm-5">
                    <div class="row my-0">
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
                    </div>
                    <div class="mt-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">1</th>
                                    <th class="text-center">2</th>
                                    <th class="text-center">3</th>
                                    <th class="text-center">4</th>
                                    <th class="text-center">5</th>
                                    <th class="text-center">6</th>
                                    <th class="text-center">7</th>
                                    <th class="text-center">8</th>
                                    <th class="text-center">9</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>JPT  </td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                        $jbox1=App\Models\IndikatorBox::jpt($params,$i)->count(); 
                                    ?>
                                        <td class="text-center">  {{ $jbox1 }}</td>
                                    @endfor
                                    
                                     
                            
                                </tr>
                                <tr>
                                    <td>Administrator</td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                       $jbox2=App\Models\IndikatorBox::jadm($params,$i)->count(); 
                                    ?>
                                        <td class="text-center"> {{ $jbox2 }}</td>
                                    @endfor
                                     
                            
                                </tr>
                                <tr>
                                    <td>Pengawas</td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                       $jbox3=App\Models\IndikatorBox::jpws($params,$i)->count(); 
                                    ?>
                                        <td class="text-center"> {{ $jbox3 }}</td>
                                    @endfor
                            
                                </tr>
                                <tr>
                                    <td>Pelaksana</td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                        $jbox4=App\Models\IndikatorBox::jpel($params,$i)->count(); 
                                    ?>
                                        <td class="text-center"> {{ $jbox4 }}</td>
                                    @endfor
                            
                                </tr>
                                <tr>
                                    <td>Fungsional  </td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                      
                                            $jbox5=App\Models\IndikatorBox::jfung($params,$i)->count(); 
                                       
                                    ?>
                                        <td class="text-center"> {{ $jbox5 }}</td>
                                    @endfor
                            
                                </tr>
                                 
                            </tbody>
                             
                            <tfoot>
                                <tr class="bg-dark">
                                    <td class="text-center small">Jumlah </td>
                                    @for ($i=1; $i<=9; $i++)
                                    <?php 
                                            $jbox1=App\Models\IndikatorBox::jpt($params,$i)->count(); 
                                            $jbox2=App\Models\IndikatorBox::jadm($params,$i)->count(); 
                                            $jbox3=App\Models\IndikatorBox::jpws($params,$i)->count(); 
                                            $jbox4=App\Models\IndikatorBox::jpel($params,$i)->count(); 
                                            $jbox5=App\Models\IndikatorBox::jfung($params,$i)->count(); 
                                            $totbox=$jbox1+$jbox2+$jbox3+$jbox4+$jbox5;
                                    ?>
                                        <td class="text-center"> {{ $totbox }}</td>
                                    @endfor
                                 
                                     
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    
                </div>
                <div class="col-sm-7 ">
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

@extends($layout)
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts')
<!-- DataTables -->  
 <!-- Select2 -->
 <script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>
<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    

    $ ( function () {
        $('#tablena').DataTable();
        $('.select2').select2();
    });
    $(function(){
      // bind change event to select
      $('#idpd').on('change', function () {
          var id = $(this).val(); // get selected value
          var appurl = {!! json_encode(url('/admin/indikatorninebox')) !!};
          var deturl = appurl+"/"+id;


          if (id) { // require a URL
              window.location = deturl; // redirect
          }
          return false;
      });
      $(".spinner-border").hide();
      $("#getdata").click(function(e){
        e.preventDefault();
            alert($("#idpd").val());

            var idinstansi = $("#idpd").val();
            let token   = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: "{{url('admin/post-indikatorninebox')}}",
                async: true,  
                //data: data,
                data: {
                  
                    "idinstansi": idinstansi,
                    "_token": token
                },
                beforeSend: function() {
                    $(".spinner-border").show();
                },
                success: function (response) {
                   // alert(response.message);
                    console.log(response.message);
                    var appurl = {!! json_encode(url('/admin/detail_indikatorninebox')) !!};
                    var deturl = appurl+"/"+response.data;
                    
                    $("#result").show();
                    $("#result").load(deturl, function() {
                        //alert( "The last 25 entries in the feed have been loaded" );
                        $(".spinner-border").hide();
                    });
                    $("#result").show();


                }, 
                 
              error: function(xhr, status, error){
                    alert('error');
              }
            });

        });

    });

</script>

@endsection

 

@section('content')
 
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">
             Hello {{Auth::guard('admin')->user()->name}} :: {{$pd->nama}}
        </h2>
    </div>
    <div class="card-body">
        <select id="idpd" name="idpd" class="form-control form-control-xs select2 " style="width: 100%;">
            
                         
            <?php 
                  $level = 0;
                  $strip = "--"; 
                ?>
                @foreach ($insta as $skpd)
                @php 
                 $pd = (object) $skpd;
                @endphp
                
                
                  @include('admin/sel-pd',[
                    'pd' => $pd,
                    'level' => $level,
                    'strip' =>$strip,
                  ])

                
                @endforeach

            
        </select>
    </div><!-- .card-body -->
    
</div>
<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title text-capitalize">
            Daftar Pegawai {{$selpd->nama}} 
       </h3>
       <div class="card-tools">
                                 
        <b>Jml Pegawai : {{ $jmlpeg }} Orang</b>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row mb-4 mx-1 mt-1">
            <div class="col-sm-12 p-1 border-bottom"> <a href="#" class="btn btn-primary col-sm-1" id="getdata"> <i class="fas fa-1x fa-sync-alt"></i> Refresh Data</a> </div>
        </div>
        <div class="text-center"  >
            <div class="spinner-border m-5"  role="status"   >
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="row p-2" id="result">
            <div class="col-sm-12">
                <table class="table table-sm  table-hover table-bordered " id="tablena">
                    <thead  class="bg-dark">
                    <tr>
                        <th> No. </th>
                        <th> NIP </th>
                        <th> Nama Pegawai </th>
                        <th> Jabatan </th>
                        <th> SKP </th>
                        <th> Inovasi </th>
                        <th> Prestasi </th>
                        <th> Indisipliner </th>
                        <th> Kompetensi </th>
                        <th> Kualifikasi </th>
                        <th> Riwayat Jabatan </th>
                        <th> Riwayat Diklat </th>
                        <th> Kecerdasan Umum </th>
                        <th> Nilai X </th>
                        <th> Nilai Y </th>
                        

                        <th class=""> Box </th>
        
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php $no=0;?>
                         
                            @foreach ($indbox as $ib)
                                    <?php 
                                    $no++; 
                                    // $peg =  (object) $pegs;
                                    //dd($ib->detPeg->getSKP->kuadranKinerja);
                                    //SKP
                                    if($ib->detPeg->getSKP->kuadranKinerja == "SANGAT BAIK"){
                                        $nilaiskp=80;
                                    }elseif($ib->detPeg->getSKP->kuadranKinerja == "BAIK"){
                                        $nilaiskp=65;
                                    }elseif($ib->detPeg->getSKP->kuadranKinerja == "BUTUH PERBAIKAN"){
                                        $nilaiskp=55;
                                    }else{
                                        $nilaiskp=0;
                                    }
                                    //KUALIFIKASI
                                    $tkpend_terakhir=str_replace(['.','-'],'',$ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir);
                                    if($tkpend_terakhir == "S3" ){
                                        $nilaikualifikasi=20;
                                    }elseif($tkpend_terakhir == "S2"){
                                        $nilaikualifikasi=15;
                                    }elseif(($tkpend_terakhir == "S1") or ($tkpend_terakhir == "DIV")  or ($tkpend_terakhir == "D4") or ($tkpend_terakhir == "SPG")){
                                        $nilaikualifikasi=10;
                                    }elseif(($tkpend_terakhir == "D3") or  ($tkpend_terakhir == "DIII")  or ($tkpend_terakhir == "SPK") ){
                                        $nilaikualifikasi=7.5;
                                    }else{
                                        $nilaikualifikasi=5;
                                    }
                                    //Riwayat Jabatan
                                    $thnayena=date('Y');
                                    $thncpns=Str::substr($ib->nip, 8, 4);
                                    $thnjab=$thnayena-$thncpns;
                                    $nilaijab=$thnjab;
                                    
                                    //riwayat Diklat
                                    $ds=sizeof($ib->detPeg->getDiklatStruktural);
                                    $df=sizeof($ib->detPeg->getDiklatFungsional);
                                    $dt=sizeof($ib->detPeg->getDiklatTeknis);

                                    if($ds == 0){$jds=0;}else{$jds=1;}
                                    if($df == 0){$jdf=0;}else{$jdf=1;}
                                    if($dt == 0){$jdt=0;}else{$jdt=1;}
                                    
                                    $totdik = $jds+$jdf+$jdt;
                                    if($totdik == 0){
                                        $nilaidiklat=0;
                                    }elseif($totdik == 1){
                                        $nilaidiklat=3.3;
                                    }elseif($totdik == 2){
                                        $nilaidiklat=6.6;
                                    }elseif($totdik == 3){
                                        $nilaidiklat=10;
                                    }

                                    //indisipliner
                                    $dis=sizeof($ib->detPeg->getIndispliner);
                                    $tkhukuman= $ib->detPeg->getIndispliner;
                                    
                                    $nilaiindisipliner=0;
                                    $idtkhukum="";
                                    if(!empty($ib->detPeg->getIndispliner)){
                                        //$idtkhukum=$tkhukuman->first() ;
                                        foreach($tkhukuman as $tkhuk){
                                           $idtkhukum=$tkhuk->id_tingkat_hukuman;

                                            if($tkhuk->id_tingkat_hukuman=="3"){
                                                $nilaiindisipliner = "-50";
                                            }elseif($tkhuk->id_tingkat_hukuman=="2"){
                                                $nilaiindisipliner = "-30";
                                            }elseif($tkhuk->id_tingkat_hukuman=="1"){
                                                $nilaiindisipliner = "-10";
                                            }else{
                                                $nilaiindisipliner="";
                                            }
                                        }
                                       


                                    } 
                                    //JPM
                                    $njpm=$ib->getJPM->kategori;
                                    if($njpm=="Memenuhi Syarat"){
                                        $nilaijpm=50;
                                    }elseif($njpm=="Masih Memenuhi Syarat"){
                                        $nilaijpm=30;
                                    }elseif($njpm=="Kurang Memenuhi Syarat"){
                                         $nilaijpm=10;
                                    }else{
                                        $nilaijpm=0;
                                    }
                                    //KecerdasanUmum
                                    $ncer=$ib->getCerdas->predikat;
                                    if($ncer=="Very Superior"){
                                        $nilaicer=10;
                                    }elseif($ncer=="Superior"){
                                        $nilaicer=7.5;
                                    }elseif($ncer=="High Average"){
                                         $nilaicer=5;
                                    }elseif($ncer=="Average"){
                                         $nilaicer=2.5;
                                    }elseif($ncer=="Low Average"){
                                         $nilaicer=1;
                                    }elseif($ncer=="Low"){
                                         $nilaicer=0.5;
                                    }else{
                                        $nilaicer=0;
                                    }

                                    //sumbu x y
                                    $nilaiy=$nilaiskp+$ib->nilai_inovasi+$ib->nilai_prestasi+$nilaiindisipliner;
                                    $snilaiy="$nilaiskp+$ib->nilai_inovasi+$ib->nilai_prestasi+$nilaiindisipliner";
                                    $nilaix=$nilaijpm+$nilaikualifikasi+$nilaijab+$nilaidiklat+$nilaicer;
                                    $snilaix="$nilaijpm+$nilaikualifikasi+$nilaijab+$nilaidiklat+$nilaicer";

                                    if(($nilaiy <= 40) and ($nilaix <= 50)){
                                        $nilaitb="1";
                                        $stylena="bg-danger";
                                        $uraianna="Kinerja di bawah ekspektasi dan potensi rendah";
                                    }elseif(($nilaiy >= 41 && $nilaiy <= 80) and ($nilaix <= 50)){
                                        $nilaitb="2";
                                        $stylena="bg-danger";
                                        $uraianna="Kinerja sesuai ekspektasi dan potensi rendah";
                                    }elseif(($nilaiy <= 40) and ($nilaix >= 51 && $nilaix <= 80)){
                                        $nilaitb="3";
                                        $stylena="bg-danger";
                                        $uraianna="Kinerja di bawah ekspektasi dan potensi menengah";
                                    }elseif(($nilaiy >= 81) and ($nilaix <= 50 )){
                                        $nilaitb="4";
                                        $stylena="bg-warning";
                                        $uraianna="Kinerja di atas ekspektasi dan potensi rendah";
                                    }elseif(($nilaiy >= 41 && $nilaiy <= 80) and ($nilaix >= 51 && $nilaix <= 80)){
                                        $nilaitb="5";
                                        $stylena="bg-warning";
                                        $uraianna="Kinerja sesuai ekspektasi dan potensi menengah";
                                    }elseif(($nilaiy <= 40 ) and ($nilaix >= 81)){
                                        $nilaitb="6";
                                        $stylena="bg-warning";
                                        $uraianna="Kinerja di bawah ekspektasi dan potensi tinggi";
                                    }elseif(($nilaiy >= 81 ) and ($nilaix >= 51 && $nilaix <= 80)){
                                        $nilaitb="7";
                                        $stylena="bg-success";
                                        $uraianna="Kinerja di atas ekspektasi dan potensi menengah";
                                    }elseif(($nilaiy >= 41 && $nilaiy <= 80 ) and ($nilaix >= 81 )){
                                        $nilaitb="8";
                                        $stylena="bg-success";
                                        $uraianna="Kinerja sesuai ekspektasi dan potensi tinggi";
                                    }elseif(($nilaiy >= 81 ) and ($nilaix >= 81)){
                                        $nilaitb="9";
                                        $stylena="bg-primary";
                                        $uraianna="Kinerja di atas ekspektasi dan potensi tinggi";
                                    }else{
                                        $nilaitb="0";
                                        $stylena="bg-danger";
                                        $uraianna="";
                                    }
                                    
                                    ?>
                                <tr bgcolor="">
                                    <td> {{ $no }}</td>
                                    <td class="small"> {{ $ib->nip }}</td>
                                    <td class="small"> {{ $ib->nama }}</td>
                                    <td>
                                        <div class="small">namajab : {{ strtoupper($ib->detPeg->JABATAN)}}</div>
                                        <div class="small">Eselon : {{$ib->detPeg->ESELON}}</div>
                                        <div class="small">jenjab : {{ strtoupper($ib->detPeg->Jns_Jbtan)}}</div>
                                    </td>    
                                    <td class="text-center"> {{ $nilaiskp }} 
                                        {{-- <i class="small text-primary">{{ $ib->detPeg->getSKP->kuadranKinerja }}</i> --}}
                                    </td>
                                    <td> {{ $ib->nilai_inovasi }}</td>
                                    <td> {{ $ib->nilai_prestasi }}</td> 
                                    <td class="text-center"> 

                                        {{-- {{ $idtkhukum }} : {{ $tkhukuman }}  --}}
                                        {{ $nilaiindisipliner }}  
                                    </td> 
                                    <td class="text-center">
                                        {{-- <div class="small"> {{ $njpm }}</div> --}}
                                        <div>  {{ $nilaijpm }}</div>

                                    </td>
                                    <td class="text-center"> {{ $nilaikualifikasi }} 
                                        {{-- <i class="small text-danger">{{ $tkpend_terakhir }}</i> --}}
                                    </td> 
                                    <td class="text-center"> 
                                    {{-- {{ $thnayena }} - {{ $thncpns }}  --}}
                                        <div class=" text-center">{{ $nilaijab }}</div>
                                    </td>
                                    <td> 
                                        {{-- <div class="small">Jml Struktural : {{ $ds }}</div>
                                        <div class="small">Jml Fungsional : {{ $df }}</div>
                                        <div class="small">Jml Teknis : {{ $dt }}</div> --}}
                                        <div class=" text-center">{{ $nilaidiklat }}</div>
                                        
                                    </td>
                                    <td class="text-center"> 
                                        <div class="small"> {{ $ncer }}</div>
                                        <div>  {{ $nilaicer }}</div>    
                                    </td> 
                                    <td class="text-center">
                                        {{-- <div class="small"> {{ $snilaix }}</div> --}}
                                        {{ $nilaix }} </td>
                                    <td class="text-center">
                                        {{-- <div class="small"> {{ $snilaiy }}</div> --}}
                                        {{ $nilaiy }} </td>
                                    <td class="text-center p-2 mx-2"><div class="{{ $stylena }} text-center h3 p-2 ">{{ $nilaitb }}</div></td>
                                    
                                    
                                </tr>
                        
                
                                @endforeach
                    
                           
                       
                         
                    </tbody>
                </table>
            </div>
           
        </div>
        
    </div>
</div>
      

@endsection

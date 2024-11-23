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
                                Diagram Jaring laba-laba Kompetensi
                            </div>
                            
                        </div>  
                            
                        <div class="row mt-3 border-top p-3">
                            <div class="col-md-8">
                                <div id="radarchart"></div>
                            </div>
                            <div class="col-md-4">
                                <div>Level SKJ : {{ $stk->leveljab }}</div> 
                                
                            </div>
                            

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
    <script src="{{ url('charts/highcharts.js') }}"></script>
    <script src="{{ url('charts/highcharts-more.js') }}"></script>
    <script src="{{ url('charts/modules/exporting.js') }}"></script>
    <script src="{{ url('charts/modules/export-data.js') }}"></script>
    <script src="{{ url('charts/modules/accessibility.js') }}"></script>
    
    <script>
        Highcharts.chart('radarchart', {

            chart: {
                polar: true,
                type: 'line'
            },

            accessibility: {
                description: ''
            },

            title: {
                text: 'DIAGRAM KOMPETENSI INDIVIDUAL  ',
                x: -80
            },

            pane: {
                size: '80%'
            },

            xAxis: {
                categories: ['Integritas', 'Kerjasama', 'Komunikasi', 'Orientasi Pada Hasil', 'Pelayanan Publik ', 'Pengembangan diri dan Oranglain','Mengelola Perubahan','Pengambilan Keputusan','Perekat Bangsa'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },

            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },

            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b> {point.y:,.0f}</b><br/>'
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            series: [{
                name: 'Standar',
                data: [<?=$stk->integritas_level?>, <?=$stk->kerjasama_level?>, <?=$stk->komunikasi_level?>, <?=$stk->orientasi_level?>, <?=$stk->pelayanan_level?>, <?=$stk->pengembangan_level?>, <?=$stk->perubahan_level?>, <?=$stk->keputusan_level?>, <?=$stk->perekat_level?>],
                pointPlacement: 'on'
            }, {
                name: 'Personal',
                data: [<?=$datak->nilai_integritas?>, <?=$datak->nilai_kerjasama?>, <?=$datak->nilai_komunikasi?>, <?=$datak->nilai_orientasi?>, <?=$datak->nilai_pelayanan?>, <?=$datak->nilai_pengembangan?>, <?=$datak->nilai_perubahan?>, <?=$datak->nilai_keputusan?>, <?=$datak->nilai_perekat?>],
                pointPlacement: 'on'
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            align: 'center',
                            verticalAlign: 'bottom',
                            layout: 'horizontal'
                        },
                        chart: {
                                height: 300
                            },
                        pane: {
                            size: '80%'
                        }
                    }
                }]
            }
        });
        </script>
@endsection
 
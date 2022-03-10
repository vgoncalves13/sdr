@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-4">
                    <x-adminlte-small-box title="{{$companies_total}}" text="Empresas"
                                          theme="info" url="{{route('companies.index')}}" url-text="Mais informações" icon="fas fa-building"/>
                </div>
                <div class="col-12 col-md-4 col-xl-4">
                    <x-adminlte-small-box title="{{$opportunities_total}}" text="Oportunidades"
                                          theme="warning" url="{{route('opportunities.index')}}" url-text="Mais informações" icon="fas fa-lightbulb"/>
                </div>
                <div class="col-12 col-md-4 col-xl-4">
                    <x-adminlte-small-box title="EM BREVE!" text="Tempo médio fechamento"
                                          theme="success" url="#" url-text="Mais informações" icon="fas fa-lightbulb"/>
                </div>
            </div>
        </div>
    </div>
    {{--  Funnel Sales Chart  --}}
    <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Funil de vendas
            </h3>
        </div>
        <div class="card-body">
            {{--Dados de temperatura oportunidades--}}
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12">
                            {{--25%--}}
                            <div class="small-box bg-gradient-teal">
                                <div class="inner">
                                    <h3>{{$count_opportunities_temperatures[25] ?? 0}}</h3>
                                    <p>Total oportunidades em 25%</p>
                                    <h3>R${{$total_value[25] ?? 0}}</h3>
                                    <p>Valor total</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-temperature-empty"></i>
                                </div>
                            </div>
                            {{--/25%--}}
                            {{--50%--}}
                            <div class="small-box bg-gradient-lime">
                                <div class="inner">
                                    <h3>{{$count_opportunities_temperatures[50] ?? 0}}</h3>
                                    <p>Total oportunidades em 50%</p>
                                    <h3>R${{$total_value[50] ?? 0}}</h3>
                                    <p>Valor total</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-temperature-half"></i>
                                </div>
                            </div>
                            {{--/50%--}}
                            {{--75%--}}
                            <div class="small-box bg-gradient-orange">
                                <div class="inner">
                                    <h3>{{$count_opportunities_temperatures[75] ?? 0}}</h3>
                                    <p>Total oportunidades em 75%</p>
                                    <h3>R${{$total_value[75] ?? 0}}</h3>
                                    <p>Valor total</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-temperature-three-quarters"></i>
                                </div>
                            </div>
                            {{--/75%--}}
                            {{--95%--}}
                            <div class="small-box bg-gradient-danger">
                                <div class="inner">
                                    <h3>{{$count_opportunities_temperatures[95] ?? 0}}</h3>
                                    <p>Total oportunidades em 95%</p>
                                    <h3>R${{$total_value[95] ?? 0}}</h3>
                                    <p>Valor total</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-temperature-full"></i>
                                </div>
                            </div>
                            {{--/95%--}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <canvas id="canvas_sales_funnel" height="0" width="auto"></canvas>
                    <!-- HTML -->
                    <style>
                        #chartdiv {
                            width: 100%;
                            height: 500px;
                        }
                    </style>
                    <div id="chartdiv"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>

        let json = <?php echo json_encode($sql_opportunities_temperature); ?>;

        let keys = [];
        let values = [];

        for(let i in json){
            keys.push(i);
            values.push(json[i]);
        }
        if(values.length < 4) {
            while (values.length < 4){
                values.push(0);
            }
        }

        {{--const ctx = document.getElementById('canvas_sales_funnel').getContext('2d');--}}
        {{--const myChart = new Chart(ctx, {--}}
        {{--    type: 'funnel',--}}
        {{--    data: {--}}
        {{--        datasets: [{--}}
        {{--            data: values,--}}
        {{--            backgroundColor: [--}}
        {{--                "#20C997",--}}
        {{--                "#01FF70",--}}
        {{--                "#FD7E14",--}}
        {{--                "#DC3545"--}}
        {{--            ],--}}
        {{--            hoverBackgroundColor: [--}}
        {{--                "#20C997",--}}
        {{--                "#01FF70",--}}
        {{--                "#FD7E14",--}}
        {{--                "#DC3545"--}}
        {{--            ]--}}
        {{--        }],--}}
        {{--        labels: keys--}}
        {{--    },--}}
        {{--    options: {--}}
        {{--        sort: 'desc',--}}
        {{--        responsive: true,--}}
        {{--        legend: {--}}
        {{--            position: 'top'--}}
        {{--        },--}}
        {{--        title: {--}}
        {{--            display: true,--}}
        {{--        },--}}
        {{--        animation: {--}}
        {{--            animateScale: true,--}}
        {{--            animateRotate: true--}}
        {{--        },--}}
        {{--        tooltips: {--}}
        {{--            enabled: true,--}}
        {{--            mode: "index",--}}
        {{--            position: "average",--}}

        {{--        }--}}
        {{--    }--}}
        {{--});--}}

         {{--const loadChartsData = () => {--}}
         {{--    try {--}}
         {{--        var url_grafico = "{{route('$name')}}"--}}
         {{--    }--}}
         {{--}--}}



        am5.ready(function() {
// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");
// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/
            var chart = root.container.children.push(am5percent.SlicedChart.new(root, {
                layout: root.verticalLayout
            }));
// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/#Series
            var series = chart.series.push(am5percent.FunnelSeries.new(root, {
                alignLabels: true,
                orientation: "vertical",
                valueField: "value",
                categoryField: "temperature",
                bottomRatio: 1,
            }));
// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/#Setting_data
            series.data.setAll(json);

            series.slices.template.set("tooltipText", "[bold]{value}[/]");
// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
            series.appear();
// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50,
                marginTop: 15,
                marginBottom: 15
            }));
            legend.data.setAll(series.dataItems);
// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);
        }); // end am5.ready()









    </script>
@endsection

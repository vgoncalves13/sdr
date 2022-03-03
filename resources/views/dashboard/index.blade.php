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
                            <x-adminlte-small-box title="{{$count_opportunities_temperatures[25] ?? 0}}" text="Oportunidades em 25%"
                                                  theme="teal" icon="fas fa-temperature-empty"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <x-adminlte-small-box title="{{$count_opportunities_temperatures[50] ?? 0}}" text="Oportunidades em 50%"
                                                  theme="lime" icon="fas fa-temperature-half"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <x-adminlte-small-box title="{{$count_opportunities_temperatures[75] ?? 0}}" text="Oportunidades em 75%"
                                                  theme="orange" icon="fas fa-temperature-three-quarters"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <x-adminlte-small-box title="{{$count_opportunities_temperatures[95] ?? 0}}" text="Oportunidades em 95%"
                                                  theme="danger" icon="fas fa-temperature-full"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <canvas id="canvas_sales_funnel" height="200" width="auto"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>

        let json = <?php echo json_encode($count_opportunities_temperatures); ?>;

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

        const ctx = document.getElementById('canvas_sales_funnel').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'funnel',
            data: {
                datasets: [{
                    data: values,
                    backgroundColor: [
                        "#20C997",
                        "#01FF70",
                        "#FD7E14",
                        "#DC3545"
                    ],
                    hoverBackgroundColor: [
                        "#20C997",
                        "#01FF70",
                        "#FD7E14",
                        "#DC3545"
                    ]
                }],
                labels: keys
            },
            options: {
                sort: 'desc',
                responsive: true,
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    mode: "index",
                    position: "average",

                }
            }
        });
    </script>
@endsection

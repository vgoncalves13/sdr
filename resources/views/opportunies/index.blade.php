@extends('adminlte::page')

@section('title', 'Oportunidades')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('opportunities.create')}}">Cadastrar nova oportunidade</a>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Nº</th>
                            <th>Nome Empresa</th>
                            <th>Follow up</th>
                            <th>CNPJ</th>
                            <th>Telefones</th>
                            <th>Criada em</th>
                            <th>Última atualização</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($opportunities as $opportunity)
                            <tr>
                                <td>{{$opportunity->id}}</td>
                                <td>{{$opportunity->company->name}}</td>
                                <td>{{$opportunity->temperature}}%</td>
                                <td>{{$opportunity->company->cnpj}}</td>
                                <td>
                                        <p>
                                            <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse"
                                                    data-target="#collapse{{$opportunity->id}}" aria-expanded="false"
                                                    aria-controls="collapse{{$opportunity->id}}">
                                                Ver mais...
                                            </button>
                                        <div class="collapse" id="collapse{{$opportunity->id}}">
                                            @forelse($opportunity->company->telephones as $telephone)
                                                {{$telephone->number}} / {{$telephone->type}}<br>
                                            @empty
                                                Nenhum telefone cadastrado
                                            @endforelse
                                        </div>
                                </td>
                                <td><small>{{\Carbon\Carbon::parse($opportunity->created_at)->format('d/m/Y H:i')}}</small></td>
                                <td><small>{{\Carbon\Carbon::parse($opportunity->updated_at)->format('d/m/Y H:i')}}</small></td>
                                <td>
                                    <a class="btn btn-primary mx-1 shadow btn-block" href="{{route('opportunities.show',$opportunity)}}">Ver </a>
                                    <a class="btn btn-outline-primary mx-1 shadow btn-block" href="{{route('opportunities.edit',$opportunity)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$opportunities->links()}}
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <canvas id="canvas_sales_funnel" height="200" width="auto"></canvas>
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
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#8e3922"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#8e3922"
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
                    text: 'Gráfico funil de vendas'
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

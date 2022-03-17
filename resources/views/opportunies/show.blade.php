
@extends('adminlte::page')

@section('title', 'Oportunidade')

@section('content_header')
    <h1></h1>
@stop
{{$user->team()}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{url()->previous()}}"><i class="fa fa-arrow-left"></i> </a>
                        <a href="{{route('companies.show',$opportunity->company)}}">{{$opportunity->company->name}}</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome do contato:</strong> {{$opportunity->contact_name}}</p>
                            <p><strong>Telefone do contato:</strong> {{$opportunity->contact_tel}}</p>
                            <p><strong>E-mail do contato:</strong> {{$opportunity->contact_email}}</p>
                            <p><strong>Temperatura:</strong> {{$opportunity->temperature}}%</p>
                            <p class="small">
                                <strong>Cadastrada em:</strong> {{$opportunity->created_at->format('d/m/Y H:i')}}
                                por <strong>{{$opportunity->user->people->name}}</strong>
                            </p>
                            @if($opportunity->temperature != 95)
                                <a class="btn btn-primary shadow"
                                   href="{{route('opportunities.edit',$opportunity)}}">Efetuar follow up
                                </a>
                            @endif
                            <a class="btn btn-secondary shadow"
                               href="{{route('opportunities.add_service',$opportunity)}}">Cadastrar novo serviço
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Serviços</h3>
            <div class="row">
                @foreach($opportunity->services as $service)
                    <div class="col-12 col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5><a href="{{route('services.show', $service)}}">{{$service->name}}</a> </h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Valor do serviço:</strong> {{$service->value}}</p>
                                <p><strong>Quantidade:</strong> {{$service->pivot->quantity}}</p>
                                <p><strong>Valor total:</strong> R${{$service->pivot->quantity * $service->value}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($opp_followup as $followups)
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="heading{{$loop->iteration}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse"
                                        data-target="#collapse{{$loop->iteration}}"
                                        aria-expanded="false" aria-controls="collapse{{$loop->iteration}}">
                                    Histórico {{$loop->iteration}}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{$loop->iteration}}" class="collapse show"
                             aria-labelledby="heading{{$loop->iteration}}" data-parent="#accordion">
                            <div class="card-body">
                                <p><strong>Temperatura: </strong>{{$followups->temperature}}%</p>
                                <p><strong>Observações: </strong>{{$followups->observations}}</p>
                                <p><strong>Follow up realizado em: </strong>{{$followups->created_at->format('d/m/Y H:i')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                    <div class="row">
                        <div class="col-12 mb-4 mt-2">
                            <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-arrow-down fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@stop



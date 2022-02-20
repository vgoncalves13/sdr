@extends('adminlte::page')

@section('title', 'Oportunidades')

@section('content_header')
    <h1>Selecionar empresa</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Nº</th>
                            <th>Nome Empresa</th>
                            <th>Nome contato</th>
                            <th>Produto atual</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Telefones</th>
                            <th>Criada em</th>
                            <th>Última atualização</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->contact_name}}</td>
                                <td>{{$company->current_product}}</td>
                                <td>{{$company->address->address}}</td>
                                <td>{{$company->address->city}}</td>
                                <td>
                                        <p>
                                            <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse"
                                                    data-target="#collapse{{$company->id}}" aria-expanded="false"
                                                    aria-controls="collapse{{$company->id}}">
                                                Ver mais...
                                            </button>
                                        <div class="collapse" id="collapse{{$company->id}}">
                                            @forelse($company->telephones as $telephone)
                                                {{$telephone->number}} / {{$telephone->type}}<br>
                                            @empty
                                                Nenhum telefone cadastrado
                                            @endforelse
                                        </div>
                                </td>
                                <td><small>{{\Carbon\Carbon::parse($company->created_at)->format('d/m/Y H:i')}}</small></td>
                                <td><small>{{\Carbon\Carbon::parse($company->updated_at)->format('d/m/Y H:i')}}</small></td>
                                <td>
                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('opportunities.dispatch_opportunity_by_name', $company)}}">Continuar com esta empresa</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

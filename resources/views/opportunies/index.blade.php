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
                        @foreach($opportunities as $opportunity)
                            <tr>
                                <td>{{$opportunity->id}}</td>
                                <td>{{$opportunity->company->name}}</td>
                                <td>{{$opportunity->contact_name}}</td>
                                <td>{{$opportunity->current_product}}</td>
                                <td>{{$opportunity->company->address->address}}</td>
                                <td>{{$opportunity->company->address->city}}</td>
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
                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('opportunities.show',$opportunity)}}">Ver</a>
                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('opportunities.edit',$opportunity)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$opportunities->links()}}
                </div>
            </div>
        </div>
    </div>
@stop

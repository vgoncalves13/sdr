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
            <div class="col-12 p-3">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
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
                        </thead>
                        <tbody>
                            @foreach($opportunities as $opportunity)
                                <tr>
                                    <td>{{$opportunity->id}}</td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="{{$opportunity->company->name}}">
                                        {{Str::limit($opportunity->company->name,10)}}
                                    </td>
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
                                        <a class="btn btn-outline-primary mx-1 shadow btn-block
                                            @if($opportunity->temperature == 95) disabled  @endif"
                                           href="{{route('opportunities.edit',$opportunity)}}">Efetuar follow up</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop



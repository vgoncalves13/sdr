
@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$user->people->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome usuário: </strong> {{$user->people->name}}</p>
                            <p><strong>Login: </strong> {{$user->login}}</p>
                            <p><strong>E-mail: </strong> {{$user->people->email}}</p>
                            <p><strong>Equipe: </strong> {{$user->team()->display_name ?? 'Sem equipe'}}</p>
                            <p><strong>Gerente: </strong> {{$user->people->manager->name ?? 'Sem gerente'}}</p>
                            <p><strong>UF: </strong> {{$user->people->UF}}</p>
                            <p><strong>Telefone: </strong> {{$user->people->telephone}}</p>
                            <p><strong>Criado em: </strong> {{\Carbon\Carbon::parse($user->people->created_at)->format('d/m/Y H:i')}}</p>
                            <p><strong>Última atualização: </strong> {{\Carbon\Carbon::parse($user->people->updated_at)->format('d/m/Y H:i')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



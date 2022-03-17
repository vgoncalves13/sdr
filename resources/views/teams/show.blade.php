
@extends('adminlte::page')

@section('title', 'Equipe')

@section('content_header')
    <h1>Equipe</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$team->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome da equipe: </strong> {{$team->name}}</p>
                            <p><strong>Nome de exibição: </strong> {{$team->display_name}}</p>
                            <p><strong>Descrição: </strong> {{$team->description}}</p>
                            <p><strong>Setor: </strong> {{$team->sector->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 style="font-size: 1.8rem">Membros da equipe</h1>
    <div class="row">
        @foreach($team->members() as $user)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <div class="card-title ">
                            <div class="image">
                                <img style="max-width: 150px" src="{{asset('images/portrait_placeholder.png')}}" class="img-circle elevation-2" alt="User Image">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p><strong>Nome usuário: </strong> {{$user->people->name}}</p>
                        <p><strong>Login: </strong> {{$user->login}}</p>
                        <p><strong>E-mail: </strong> {{$user->people->email}}</p>
                        <p><strong>Setor: </strong> {{$user->people->sector->name ?? 'Sem setor'}}</p>
                        <p><strong>Gerente: </strong> {{$user->people->manager->name ?? 'Sem gerente'}}</p>
                        <p><strong>UF: </strong> {{$user->people->UF}}</p>
                        <p><strong>Telefone: </strong> {{$user->people->telephone}}</p>
                        <p><strong>Criado em: </strong> {{\Carbon\Carbon::parse($user->people->created_at)->format('d/m/Y H:i')}}</p>
                        <p><strong>Última atualização: </strong> {{\Carbon\Carbon::parse($user->people->updated_at)->format('d/m/Y H:i')}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop



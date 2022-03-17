@extends('adminlte::page')

@section('title', 'Equipes')

@section('content_header')
    <h1>Equipes</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('teams.create')}}">Cadastrar nova equipe</a>
        </div>
        <div class="row">
            <div class="col-12 p-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Descrição</td>
                            <td>Setor</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->description}}</td>
                                <td>{{$team->sector->name}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('teams.show',$team)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Ver
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('teams.edit',$team)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

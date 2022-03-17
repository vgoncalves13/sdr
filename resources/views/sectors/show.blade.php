
@extends('adminlte::page')

@section('title', 'Setores')

@section('content_header')
    <h1>Setore</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$sector->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome setor: </strong> {{$sector->name}}</p>
                            <p><strong>Descrição: </strong> {{$sector->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 style="font-size: 1.8rem">Equipes</h1>
    <div class="row">
        @foreach($sector->teams as $team)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <div class="card-title">
                            <a href="{{route('teams.edit', $team)}}"
                               class="btn btn-primary btn-sm"><i class="fas fa-pen"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p><strong>Nome da equipe: </strong> <a href="{{route('teams.show', $team)}}">{{$team->name}}</a></p>
                        <p><strong>Nome de exibição: </strong> {{$team->display_name}}</p>
                        <p><strong>Descrição: </strong> {{$team->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop



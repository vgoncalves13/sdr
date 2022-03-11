@extends('adminlte::page')

@section('title', 'Setores')

@section('content_header')
    <h1>Setores</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('sectors.create')}}">Cadastrar novo setor</a>
        </div>
        <div class="row">
            <div class="col-12 p-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Descrição</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sectors as $sector)
                            <tr>
                                <td>{{$sector->name}}</td>
                                <td>{{$sector->description}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('sectors.show',$sector)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Ver
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('sectors.edit',$sector)}}">
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
                {{$sectors->links()}}
            </div>
        </div>
    </div>
@stop

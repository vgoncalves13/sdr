@extends('adminlte::page')

@section('title', 'Classificações')

@section('content_header')
    <h1>Classificações</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('classifications.create')}}">Cadastrar nova classificação</a>
        </div>
        <div class="row">
            <div class="col-12 p-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Nome de exibição</td>
                            <td>Fator de multiplicação</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classifications as $classification)
                            <tr>
                                <td>{{$classification->name}}</td>
                                <td>{{$classification->display_name}}</td>
                                <td>{{$classification->multiply_factor}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('classifications.show',$classification)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Ver
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('classifications.edit',$classification)}}">
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

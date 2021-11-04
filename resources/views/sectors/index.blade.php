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
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                    @foreach($sectors as $sector)
                        <tr>
                            <td>{{$sector->name}}</td>
                            <td>{{$sector->description}}</td>
                            <td>
                                <a class="btn btn-flat btn-info btn-sm" href="{{route('sectors.show',$sector)}}">Ver</a>
                                <a class="btn btn-flat btn-info btn-sm" href="{{route('sectors.edit',$sector)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$sectors->links()}}
            </div>
        </div>
    </div>
@stop

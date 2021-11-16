@extends('adminlte::page')

@section('title', 'Operadoras')

@section('content_header')
    <h1>Operadoras</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('carriers.create')}}">Cadastrar nova operadora</a>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td>Nome</td>
                        <td>Ações</td>
                    </tr>
                    @foreach($carriers as $carrier)
                        <tr>
                            <td>{{$carrier->name}}</td>
                            <td>
                                <a class="btn btn-flat btn-info btn-sm" href="{{route('carriers.show',$carrier)}}">Ver</a>
                                <a class="btn btn-flat btn-info btn-sm" href="{{route('carriers.edit',$carrier)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$carriers->links()}}
            </div>
        </div>
    </div>
@stop

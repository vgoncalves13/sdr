@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Serviços</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('services.create')}}">Cadastrar novo serviço</a>

        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td>Nome</td>
                        <td>Valor</td>
                        <td>Ações</td>
                    </tr>
                    @foreach($services as $service)
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>{{$service->value}}</td>
                            <td>
                                <a class="btn btn-flat btn-info btn-sm" href="{{route('services.show',$service->id)}}">Ver</a>
                                <a class="btn btn-flat btn-info btn-sm" href="{{route('services.edit',$service->id)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop

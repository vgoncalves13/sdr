
@extends('adminlte::page')

@section('title', 'Serviço')

@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">{{$service->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome: </strong> {{$service->name}}</p>
                            <p><strong>Preço do serviço: </strong> {{$service->value}}</p>
                        </div>
                    </div>
                    <h4>Classificações</h4>
                    @foreach($service->classifications as $classification)
                        <p><strong>Nome:</strong> {{$classification->display_name}}</p>
                        <p><strong>Fator de multiplicação:</strong> {{$classification->multiply_factor}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop




@extends('adminlte::page')

@section('title', 'Classificação')

@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">{{$classification->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome: </strong> {{$classification->name}}</p>
                            <p><strong>Nome de exibição: </strong> {{$classification->display_name}}</p>
                            <p><strong>Fator de multiplicação: </strong> {{$classification->multiply_factor}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



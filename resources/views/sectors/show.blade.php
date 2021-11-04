
@extends('adminlte::page')

@section('title', 'Setores')

@section('content_header')
    <h1>Setores</h1>
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
@stop



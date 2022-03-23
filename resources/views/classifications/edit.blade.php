@extends('adminlte::page')

@section('title', 'Editar Classificação')

@section('content_header')
    <h1>Editar Classificação</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar Classificação</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form_opportunity" method="POST" action="{{route('classifications.update',$classification)}}" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nome do serviço</label>
                            <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Nome do serviço" value="{{$classification->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="display_name">Nome de exibição</label>
                            <input name="display_name" type="text" class="form-control" id="display_name"
                                   placeholder="Nome de exibição" value="{{$classification->display_name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="multiply_factor">Fator de multiplicação</label>
                            <input name="multiply_factor" type="number" step=".01" class="form-control" id="multiply_factor"
                                   placeholder="Fator de multiplicação" value="{{$classification->multiply_factor}}" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="btnFetch" type="submit" class="btn btn-primary" >Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

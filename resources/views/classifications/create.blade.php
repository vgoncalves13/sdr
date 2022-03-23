@extends('adminlte::page')

@section('title', 'Cadastrar Classificação')

@section('content_header')
    <h1>Cadastrar classificação</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar classificação</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form_opportunity" method="POST" action="{{route('classifications.store')}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nome da classificação</label>
                            <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Nome do serviço" required>
                        </div>
                        <div class="form-group">
                            <label for="display_name">Nome de exibição</label>
                            <input name="display_name" type="text" class="form-control" id="display_name"
                                   placeholder="Nome de exibição" required>
                        </div>
                        <div class="form-group">
                            <label for="multiply_factor">Fator de multiplicação</label>
                            <input name="multiply_factor" type="number" step=".01" class="form-control" id="multiply_factor"
                                    placeholder="Fator de multiplicação" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="btnFetch" type="submit" class="btn btn-primary" >Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

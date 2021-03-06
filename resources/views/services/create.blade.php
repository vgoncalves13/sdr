@extends('adminlte::page')

@section('title', 'Cadastrar Serviço')

@section('content_header')
    <h1>Cadastrar Serviço</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Serviço</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form_opportunity" method="POST" action="{{route('services.store')}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nome do serviço</label>
                            <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Nome do serviço" required>
                        </div>
                        <div class="form-group">
                            <label for="value">Preço do serviço</label>
                            <input name="value" type="text" class="form-control" id="value"
                                    placeholder="Preço do serviço" required>
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

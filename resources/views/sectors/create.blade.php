@extends('adminlte::page')

@section('title', 'Criar setor')

@section('content_header')
    <h1>Criar setor</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('sectors.store')}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nome setor</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Nome setor">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Descrição"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

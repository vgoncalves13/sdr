@extends('adminlte::page')

@section('title', 'Editar fonte de dados')

@section('content_header')
    <h1>Editar fonte de dados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>{{$source->carrier->name}}</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('carriers.update_source',$source)}}" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="table_name">Nome da tabela</label>
                                    <input name="table_name" type="text" class="form-control"
                                           value="{{$source->table_name}}"
                                           id="table_name" placeholder="Nome da tabela">
                                    <small>Nome da tabela que o sistema deve procurar. Nome deve ser exato,
                                        diferenciando maiúsculas de minúsculas
                                    </small>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="postal_code_field">Nome campo CEP</label>
                                    <input name="postal_code_field" type="text" class="form-control"
                                           value="{{$source->postal_code_field}}"
                                           id="postal_code_field" placeholder="Nome campo CEP">
                                    <small>Nome do campo que deve corresponder ao campo <strong>CEP</strong> na fonte de dados de
                                        cobertura da operadora. Nome deve ser exato ao que se encontra na tabela!
                                    </small>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="postal_code_field">Nome campo NÚMERO</label>
                                    <input name="number_field" type="text" class="form-control"
                                           value="{{$source->number_field}}"
                                           id="number_field" placeholder="Nome campo NÚMERO">
                                    <small>Nome do campo que deve corresponder ao campo <strong>NÚMERO</strong> na fonte de dados de
                                        cobertura da operadora. Nome deve ser exato ao que se encontra na tabela!
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

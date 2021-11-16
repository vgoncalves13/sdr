
@extends('adminlte::page')

@section('title', 'Operadoras')

@section('content_header')
    <h1>Operadora</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$carrier->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome operadora: </strong> {{$carrier->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('carriers.create_source',$carrier)}}" class="btn btn-primary">Cadastrar fonte dados cobertura</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome da tabela</th>
                                            <th>Campo CEP</th>
                                            <th>Campo Número</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carrier->coverage_sources as $source)
                                           <tr>
                                               <td>{{$source->id}}</td>
                                               <td>{{$source->table_name}}</td>
                                               <td>{{$source->postal_code_field}}</td>
                                               <td>{{$source->number_field}}</td>
                                               <td>Ok</td>
                                               <td>
                                                   <a class="btn btn-info btn-sm" href="{{route('carriers.edit_source',$source)}}">
                                                       <i class="fas fa-pencil-alt">
                                                       </i>
                                                       Editar
                                                   </a>
                                                   <a class="btn btn-danger btn-sm" href="#">
                                                       <i class="fas fa-trash">
                                                       </i>
                                                       Excluir
                                                   </a>
                                               </td>
                                           </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



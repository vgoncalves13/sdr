
@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">{{$company->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome: </strong> {{$company->name}}</p>
                            <p><strong>CNPJ: </strong> {{$company->cnpj}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Oportunidades <span class="badge badge-primary right">{{$company->opportunities_count}}</span></h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Nome do contato</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company->opportunities as $opportunity)
                        <tr>
                            <td>{{$opportunity->id}}</td>
                            <td>{{$opportunity->contact_name}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('opportunities.show',$opportunity)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop



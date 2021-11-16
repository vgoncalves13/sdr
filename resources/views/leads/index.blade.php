@extends('adminlte::page')

@section('title', 'Leads')

@section('content_header')
    <h1>Leads</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('leads.create')}}">Processar Leads</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                    <x-adminlte-small-box title="{{number_format($companies_to_proccess)}}" text="Empresas para processar"
                                          theme="info" icon="fas fa-building"/>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <x-adminlte-small-box title="{{$generated_leads}}" text="Leads gerados"
                                          theme="warning" icon="fas fa-lightbulb"/>
                </div>
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>Empresa</th>
                            <th>CNPJ</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>CEP</th>
                            <th>Operadora</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($leads as $lead)
                            <tr>
                                <td>{{$lead->company->name}}</td>
                                <td>{{$lead->company->cnpj}}</td>
                                <td>{{$lead->company->address->address}}</td>
                                <td>{{$lead->company->address->number}}</td>
                                <td>{{$lead->company->address->postal_code}}</td>
                                <td>{{$lead->carrier->name}}</td>
                                <td>
                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('leads.show',$lead)}}">Ver</a>
{{--                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('leads.edit',$lead)}}">Editar</a>--}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

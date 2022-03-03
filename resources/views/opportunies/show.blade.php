
@extends('adminlte::page')

@section('title', 'Oportunidade')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{url()->previous()}}"><i class="fa fa-arrow-left"></i> </a>
                        <a href="{{route('companies.show',$opportunity->company)}}">{{$opportunity->company->name}}</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p><strong>Nome do contato:</strong> {{$opportunity->contact_name}}</p>
                            <p><strong>Telefone do contato:</strong> {{$opportunity->contact_tel}}</p>
                            <p><strong>E-mail do contato:</strong> {{$opportunity->contact_email}}</p>
                            <p><strong>Temperatura:</strong> {{$opportunity->temperature}}%</p>
                            <p class="small">
                                <strong>Cadastrada em:</strong> {{$opportunity->created_at->format('d/m/Y H:i')}}
                                por <strong>{{$opportunity->user->people->name}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



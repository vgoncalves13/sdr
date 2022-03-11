@extends('vendor.adminlte.page_form')

@section('title', 'Adicionar novo serviço')

@section('content_header')
    <h1>Adicionar novo serviço</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <x-company.show :company="$opportunity->company"/>
            <form method="POST" action="{{route('opportunities.store_add_service',$opportunity)}}" role="form">
                @csrf
                <div class="form-group">
                    <span id="container-input-services">{{--Rendered by javascript--}}</span>
                </div>
                <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Adicionar</button>
            </form>
        </div>
    </div>
@stop

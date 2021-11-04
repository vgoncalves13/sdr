@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2></h2>Dashboard</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-adminlte-small-box title="451" text="Empresas"
                                                  theme="info" url="#" url-text="Mais informações" icon="fas fa-building"/>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-adminlte-small-box title="119" text="Oportunidades"
                                                  theme="warning" url="#" url-text="Mais informações" icon="fas fa-lightbulb"/>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-adminlte-small-box title="43%" text="Taxa de conversão"
                                                  theme="success" url="#" url-text="Mais informações" icon="fas fa-lightbulb"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-adminlte-small-box title="451" text="Empresas"
                                                  theme="info" url="#" url-text="Mais informações" icon="fas fa-building"/>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-adminlte-small-box title="119" text="Oportunidades"
                                                  theme="warning" url="#" url-text="Mais informações" icon="fas fa-lightbulb"/>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-adminlte-small-box title="43%" text="Taxa de conversão"
                                                  theme="success" url="#" url-text="Mais informações" icon="fas fa-lightbulb"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

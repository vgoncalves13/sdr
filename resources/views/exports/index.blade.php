@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Exportar')

@section('content_header')
    <h1>Exportar</h1>
@stop
@section('content')
    <div class="card card-default">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endsection

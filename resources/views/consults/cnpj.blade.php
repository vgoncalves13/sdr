@extends('adminlte::page')

@section('title', 'Cadastrar Oportunidade')

@section('content_header')
    <h1>Consultar CNPJ</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{--Creat company form component--}}
            <x-company.create :route="route('opportunities.verify')"/>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("#cnpj").inputmask({
                mask: "99.999.999/9999-99",
                removeMaskOnSubmit: true
            });
            $("#btnFetch").click(function() {
                // disable button
                $(this).prop("disabled", true);
                // add spinner to button
                $(this).html(
                    `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Carregando...`
                );
                $("#form_opportunity").submit();
            });
        });
    </script>
@endsection

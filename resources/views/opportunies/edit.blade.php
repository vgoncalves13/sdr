
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
                        <div class="col-12">
                        <form method="POST" action="{{route('opportunities.update', $opportunity)}}" role="form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="observations">Observações</label>
                                <textarea class="form-control" id="observations" name="observations">
                                                    {{old('observations')}}
                                </textarea>
                            </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg ">Efetuar followup <i class="fas fa-temperature-0"></i><i class="fas fa-arrow-up"></i> </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop



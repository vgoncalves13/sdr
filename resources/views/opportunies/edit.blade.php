
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
                    <form method="POST" action="{{route('opportunities.update', $opportunity)}}" role="form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <p><strong>Temperatura atual:</strong> {{$opportunity->temperature}}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label>Temperatura da oportunidade</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="temperature"
                                           id="temperature_25" value="25" disabled>
                                    <label class="form-check-label" for="temperature_25">25%</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="temperature"
                                           id="temperature_50" value="50" {{$opportunity->temperature < 50 ? '':'disabled'}}>
                                    <label class="form-check-label" for="temperature_50">50%</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="temperature"
                                           id="temperature_75" value="75" {{$opportunity->temperature < 75 ? '':'disabled'}}>
                                    <label class="form-check-label" for="temperature_75">75%</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="temperature"
                                           id="temperature_95%" value="95" >
                                    <label class="form-check-label" for="temperature_95">95%</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
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



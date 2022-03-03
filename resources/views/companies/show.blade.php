
@extends('adminlte::page')

@section('title', ucfirst(__('company.company')))

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
                            <p><strong>{{ucfirst(trans('company.name'))}}: </strong> {{$company->name}}</p>
                            <p><strong>{{strtoupper(trans('company.cnpj'))}}: </strong> {{$company->cnpj}}</p>
                            <p><strong>{{ucfirst(trans('company.address'))}}: </strong> {{$company->address->address}}</p>
                            <p><strong>{{ucfirst(trans('company.address2'))}}: </strong> {{$company->address->address2}}</p>
                            <p><strong>{{ucfirst(trans('company.number'))}}: </strong> {{$company->address->number}}</p>
                            <p><strong>{{ucfirst(trans('company.district'))}}: </strong> {{$company->address->district}}</p>
                            <p><strong>{{ucfirst(trans('company.city'))}}: </strong> {{$company->address->city}}</p>
                            <p><strong>{{strtoupper(trans('company.state'))}}: </strong> {{$company->address->state}}</p>
                            <p><strong>{{strtoupper(trans('company.postal_code'))}}: </strong> {{$company->address->postal_code}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ucfirst(trans('titles.opportunities'))}} <span class="badge badge-primary right">{{$company->opportunities_count}}</span></h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nº</th>
                        <th>{{ucfirst(trans('opportunities.contact_name'))}}</th>
                        <th>{{ucfirst(trans('general.created_by'))}}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company->opportunities as $opportunity)
                        <tr>
                            <td>{{$opportunity->id}}</td>
                            <td>{{$opportunity->contact_name}}</td>
                            <td>{{$opportunity->user->people->name}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('opportunities.show',$opportunity)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    {{ucfirst(trans('general.see_more'))}}
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

@extends('adminlte::page')

@section('title', 'Cadastrar Oportunidade')

@section('content_header')
    <h1>{{$company->NOME}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complementar dados</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('opportunities.store',$company)}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input value="{{$company->cnpj}}" name="cnpj" type="text" class="form-control" id="cnpj"
                                   placeholder="Apenas números" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input value="{{$company->name}}" name="name" type="text" class="form-control" id="name"
                                   placeholder="Nome" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input value="{{$company->address->address}}" name="address" type="text" class="form-control" id="address"
                                           placeholder="Endereço" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input value="{{$company->address->number}}" name="number" type="text" class="form-control" id="number"
                                           placeholder="Número" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Complemento</label>
                                    <input value="{{$company->address->address2}}" name="address2" type="text" class="form-control" id="address2"
                                           placeholder="Complemento" @if($company->COMPLEMENTO == '')@else readonly @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input value="{{$company->address->district}}" name="district" type="text" class="form-control" id="district"
                                           placeholder="Bairro" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input value="{{$company->address->city}}" name="city" type="text" class="form-control" id="city"
                                           placeholder="Cidade" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">UF</label>
                                    <input value="{{$company->address->state}}" name="state" type="text" class="form-control" id="state"
                                           placeholder="UF" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">CEP</label>
                                    <input value="{{$company->address->postal_code}}" name="postal_code" type="text" class="form-control" id="postal_code"
                                           placeholder="CEP" readonly>
                                </div>
                            </div>
                        </div>
                        <h4>Telefones</h4>

                        <div class="row">
                            @foreach($company->telephones as $telephone)
                                @if($telephone->type == 'fixo')
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telephone">{{$telephone->type}} {{ $loop->iteration }}</label>
                                            <input value="{{$telephone->number}}" name="telephone[0][number]" type="text" class="form-control" id="telephone"
                                                   readonly>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach($company->telephones as $cellphone)
                                @if($cellphone->type == 'celular')
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telephone">{{$cellphone->type}} {{ $loop->iteration }}</label>
                                            <input value="{{$cellphone->number}}" name="telephone[0][number]" type="text" class="form-control" id="telephone"
                                                   readonly>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <h4>Informações do produto</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lines">Quantidade de linha</label>
                                    <input name="lines" type="number" class="form-control" id="lines"
                                           placeholder="Quantidade de linhas">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_product">Produto atual</label>
                                    <input name="current_product" type="text" class="form-control" id="current_product"
                                           placeholder="Produto atual">
                                </div>
                            </div>
                        </div>
                        <h4>Outras informações</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_name">Nome contato</label>
                                    <input name="contact_name" type="text" class="form-control" id="contact_name"
                                           placeholder="Nome contato">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customer_base">Cliente base</label>
                                    <input name="customer_base" type="text" class="form-control" id="customer_base"
                                           placeholder="Cliente base">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customer_competition">Cliente concorrência</label>
                                    <input name="customer_competition" type="text" class="form-control" id="customer_competition"
                                           placeholder="Cliente concorrência">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Cadastrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

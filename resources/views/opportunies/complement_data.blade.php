@extends('adminlte::page')

@section('title', 'Cadastrar Oportunidade')

@section('content_header')
    <h1>{{$external_company->NOME}}</h1>
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
                <form method="POST" action="{{route('opportunities.store_complement')}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input value="{{$external_company->CNPJ}}" name="cnpj" type="text" class="form-control" id="cnpj"
                                   placeholder="Apenas números" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input value="{{$external_company->NOME}}" name="name" type="text" class="form-control" id="name"
                                   placeholder="Nome" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input value="{{$external_company->ENDERECO}}" name="address" type="text" class="form-control" id="address"
                                           placeholder="Endereço" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input value="{{$external_company->NUMERO}}" name="number" type="text" class="form-control" id="number"
                                           placeholder="Número" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Complemento</label>
                                    <input value="{{$external_company->COMPLEMENTO}}" name="address2" type="text" class="form-control" id="address2"
                                           placeholder="Complemento" @if($external_company->COMPLEMENTO == '')@else readonly @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input value="{{$external_company->BAIRRO}}" name="district" type="text" class="form-control" id="district"
                                           placeholder="Bairro" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input value="{{$external_company->CIDADE}}" name="city" type="text" class="form-control" id="city"
                                           placeholder="Cidade" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">UF</label>
                                    <input value="{{$external_company->UF}}" name="state" type="text" class="form-control" id="state"
                                           placeholder="UF" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">CEP</label>
                                    <input value="{{$external_company->CEP}}" name="postal_code" type="text" class="form-control" id="postal_code"
                                           placeholder="CEP" readonly>
                                </div>
                            </div>
                        </div>
                        <h4>Telefones</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">Fixo 1</label>
                                    <input value="{{$external_company->FIXO1}}" name="telephone[0][number]" type="text" class="form-control" id="telephone"
                                           placeholder="Fixo 1" @if($external_company->FIXO1 == '')@else readonly @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone2">Fixo 2</label>
                                    <input value="{{$external_company->FIXO2}}" name="telephone[1][number]" type="text" class="form-control" id="telephone2"
                                           placeholder="Fixo 2" @if($external_company->FIXO2 == '')@else readonly @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone3">Fixo 3</label>
                                    <input value="{{$external_company->FIXO3}}" name="telephone[2][number]" type="text" class="form-control" id="telephone3"
                                           placeholder="Fixo 3" @if($external_company->FIXO3 == '')@else readonly @endif>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cel1">Celular 1</label>
                                    <input value="{{$external_company->CEL1}}" name="cellphone[0][number]" type="text" class="form-control" id="cel1"
                                           placeholder="Celular 1" @if($external_company->CEL1 == '')@else readonly @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cel2">Celular 2</label>
                                    <input value="{{$external_company->CEL2}}" name="cellphone[1][number]" type="text" class="form-control" id="cel2"
                                           placeholder="Celular 2" @if($external_company->CEL2 == '')@else readonly @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cel3">Celular 3</label>
                                    <input value="{{$external_company->CEL3}}" name="cellphone[2][number]" type="text" class="form-control" id="cel3"
                                           placeholder="Celular 3" @if($external_company->CEL3 == '')@else readonly @endif>
                                </div>
                            </div>
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

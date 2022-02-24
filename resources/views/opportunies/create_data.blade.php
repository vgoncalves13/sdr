@extends('adminlte::page')

@section('title', 'Cadastrar Oportunidade')

@section('content_header')
    <h1>Cadastrar Oportunidade</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Inserir dados</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('opportunities.store')}}" role="form">
                    @csrf
                    <input name="user_id" type="hidden" value="{{auth()->id()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input name="cnpj" type="text" class="form-control" id="cnpj"
                                   value="@if(session()->has('cnpj')){{session()->get('cnpj')}}@endif" placeholder="Apenas números">
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input name="name" type="text" class="form-control" id="name"
                                   placeholder="Nome">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                           placeholder="Endereço">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input name="number" type="text" class="form-control" id="number"
                                           placeholder="Número">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Complemento</label>
                                    <input name="address2" type="text" class="form-control" id="address2"
                                           placeholder="Complemento">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input name="district" type="text" class="form-control" id="district"
                                           placeholder="Bairro">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input name="city" type="text" class="form-control" id="city"
                                           placeholder="Cidade">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="UF">UF</label>
                                    <select class="form-control" name="UF" id="UF">
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">CEP</label>
                                    <input name="postal_code" type="text" class="form-control" id="postal_code"
                                           placeholder="CEP">
                                </div>
                            </div>
                        </div>
                        <h4>Telefones</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">Fixo 1</label>
                                    <input name="telephone[]" type="text" class="form-control" id="telephone"
                                           placeholder="Fixo 1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone2">Fixo 2</label>
                                    <input name="telephone[]" type="text" class="form-control" id="telephone2"
                                           placeholder="Fixo 2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone3">Fixo 3</label>
                                    <input name="telephone[]" type="text" class="form-control" id="telephone3"
                                           placeholder="Fixo 3">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cel1">Celular 1</label>
                                    <input name="telephone[]" type="text" class="form-control" id="cel1"
                                           placeholder="Celular 1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cel2">Celular 2</label>
                                    <input name="telephone[]" type="text" class="form-control" id="cel2"
                                           placeholder="Celular 2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cel3">Celular 3</label>
                                    <input name="telephone[]" type="text" class="form-control" id="cel3"
                                           placeholder="Celular 3">
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

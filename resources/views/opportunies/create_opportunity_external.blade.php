@extends('vendor.adminlte.page_form')

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
                <form method="POST" action="{{route('opportunities.store_complement',$company)}}" role="form">
                    @csrf
                    <input name="company_id" type="hidden" value="{{$company->Id}}">
                    <input name="user_id" type="hidden" value="{{auth()->id()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input value="{{$company->CNPJ}}" name="cnpj" type="text" class="form-control" id="cnpj"
                                   placeholder="Apenas números" {{$company->CNPJ ? 'readonly':''}}>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input value="{{$company->NOME}}" name="name" type="text" class="form-control" id="name"
                                   placeholder="Nome" {{$company->NOME ? 'readonly':''}}>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input value="{{$company->ENDERECO}}" name="address" type="text"
                                           class="form-control" id="address" placeholder="Endereço" {{$company->ENDERECO ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input value="{{$company->NUMERO}}" name="number" type="text"
                                           class="form-control" id="number" placeholder="Número" {{$company->NUMERO ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Complemento</label>
                                    <input value="{{$company->COMPLEMENTO}}" name="address2" type="text"
                                           class="form-control" id="address2" placeholder="Complemento" {{$company->COMPLEMENTO ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input value="{{$company->BAIRRO}}" name="district" type="text"
                                           class="form-control" id="district" placeholder="Bairro" {{$company->BAIRRO ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input value="{{$company->CIDADE}}" name="city" type="text"
                                           class="form-control" id="city" placeholder="Cidade" {{$company->CIDADE ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if(empty($company->UF))
                                    <div class="form-group">
                                        <label for="UF">UF</label>
                                        <select class="form-control" name="state" id="UF">
                                            <option value="">Selecione um estado</option>
                                            <option @if(old('state') == 'AC') selected @endif value="AC">Acre</option>
                                            <option @if(old('state') == 'AL') selected @endif value="AL">Alagoas</option>
                                            <option @if(old('state') == 'AP') selected @endif value="AP">Amapá</option>
                                            <option @if(old('state') == 'AM') selected @endif value="AM">Amazonas</option>
                                            <option @if(old('state') == 'BA') selected @endif value="BA">Bahia</option>
                                            <option @if(old('state') == 'CE') selected @endif value="CE">Ceará</option>
                                            <option @if(old('state') == 'DF') selected @endif value="DF">Distrito Federal</option>
                                            <option @if(old('state') == 'ES') selected @endif value="ES">Espírito Santo</option>
                                            <option @if(old('state') == 'GO') selected @endif value="GO">Goiás</option>
                                            <option @if(old('state') == 'MA') selected @endif value="MA">Maranhão</option>
                                            <option @if(old('state') == 'MT') selected @endif value="MT">Mato Grosso</option>
                                            <option @if(old('state') == 'MS') selected @endif value="MS">Mato Grosso do Sul</option>
                                            <option @if(old('state') == 'MG') selected @endif value="MG">Minas Gerais</option>
                                            <option @if(old('state') == 'PA') selected @endif value="PA">Pará</option>
                                            <option @if(old('state') == 'PB') selected @endif value="PB">Paraíba</option>
                                            <option @if(old('state') == 'PR') selected @endif value="PR">Paraná</option>
                                            <option @if(old('state') == 'PE') selected @endif value="PE">Pernambuco</option>
                                            <option @if(old('state') == 'PI') selected @endif value="PI">Piauí</option>
                                            <option @if(old('state') == 'RJ') selected @endif value="RJ">Rio de Janeiro</option>
                                            <option @if(old('state') == 'RN') selected @endif value="RN">Rio Grande do Norte</option>
                                            <option @if(old('state') == 'RS') selected @endif value="RS">Rio Grande do Sul</option>
                                            <option @if(old('state') == 'RO') selected @endif value="RO">Rondônia</option>
                                            <option @if(old('state') == 'RR') selected @endif value="RR">Roraima</option>
                                            <option @if(old('state') == 'SC') selected @endif value="SC">Santa Catarina</option>
                                            <option @if(old('state') == 'SP') selected @endif value="SP">São Paulo</option>
                                            <option @if(old('state') == 'SE') selected @endif value="SE">Sergipe</option>
                                            <option @if(old('state') == 'TO') selected @endif value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="state">UF</label>
                                        <input value="{{$company->UF}}" name="state" type="text"
                                               class="form-control" id="state" placeholder="UF" readonly>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">CEP</label>
                                    <input value="{{$company->CEP}}" name="postal_code"
                                           type="text" class="form-control" id="postal_code" placeholder="CEP" {{$company->CEP ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <h4>Telefones</h4>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">FIXO1</label>
                                    <input value="{{$company->FIXO1}}" name="telephone[0][number]"
                                           type="text" class="form-control" id="telephone" {{$company->FIXO1 ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">FIXO2</label>
                                    <input value="{{$company->FIXO2}}" name="telephone[0][number]"
                                           type="text" class="form-control" id="telephone" {{$company->FIXO2 ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">FIXO3</label>
                                    <input value="{{$company->FIXO3}}" name="telephone[0][number]"
                                           type="text" class="form-control" id="telephone" {{$company->FIXO3 ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cellphone1">CEL1</label>
                                    <input value="{{$company->CEL1}}" name="cellphone[0][number]"
                                           type="text" class="form-control" id="cellphone1" {{$company->CEL1 ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cellphone2">CEL2</label>
                                    <input value="{{$company->CEL2}}" name="cellphone[0][number]"
                                           type="text" class="form-control" id="cellphone2" {{$company->CEL2 ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cellphone3">CEL3</label>
                                    <input value="{{$company->CEL3}}" name="telephone[0][number]"
                                           type="text" class="form-control" id="cellphone3" {{$company->CEL3 ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="contact_name">Nome do contato</label>
                                            <input name="contact_name" type="text" class="form-control"
                                                   id="contact_name" placeholder="Nome do contato">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="contact_tel">Telefone do contato</label>
                                            <input name="contact_tel" type="tel" class="form-control"
                                                   id="contact_tel" placeholder="Telefone do contato">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="contact_email">E-mail do contato</label>
                                            <input name="contact_email" type="email" class="form-control"
                                                   id="contact_email" placeholder="E-mail do contato">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h4>Informações do produto</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" onclick="createInput()" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Adicionar serviço
                                        </button>
                                        <a href="{{route('services.index')}}" target="_blank" class="btn btn-primary">
                                            Cadastrar / Editar serviços
                                        </a>
                                        <div class="form-group">
                                            <span id="container-input-services">
                                                {{--Rendered by javascript--}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h4>Outras informações</h4>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label>Temperatura da oportunidade</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="temperature"
                                                   id="temperature_25" value="25" checked>
                                            <label class="form-check-label" for="temperature_25">25%</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="temperature"
                                                   id="temperature_50" value="50">
                                            <label class="form-check-label" for="temperature_50">50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="temperature"
                                                   id="temperature_75" value="75">
                                            <label class="form-check-label" for="temperature_75">75%</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="temperature"
                                                   id="temperature_95%" value="95">
                                            <label class="form-check-label" for="temperature_95">95%</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="observations">Observações</label>
                                            <textarea class="form-control" id="observations" name="observations">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg ">Gerar proposta & Visualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

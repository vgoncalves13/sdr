@extends('vendor.adminlte.page_form')

@section('title', 'Cadastrar Oportunidade')

@section('content_header')
    <h1>{{$company->name}}</h1>
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
                    <input name="company_id" type="hidden" value="{{$company->id}}">
                    <input name="user_id" type="hidden" value="{{auth()->id()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input value="{{$company->cnpj}}" name="cnpj" type="text" class="form-control" id="cnpj"
                                   placeholder="Apenas números" {{$company->cnpj ? 'readonly':''}}>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input value="{{$company->name}}" name="name" type="text" class="form-control" id="name"
                                   placeholder="Nome" {{$company->name ? 'readonly':''}}>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input value="{{$company->address->address}}" name="address" type="text"
                                           class="form-control" id="address" placeholder="Endereço"
                                        {{$company->address->address ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input value="{{$company->address->number}}" name="number" type="text"
                                           class="form-control" id="number" placeholder="Número"
                                        {{$company->address->number ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Complemento</label>
                                    <input value="{{$company->address->address2}}" name="address2" type="text"
                                           class="form-control" id="address2" placeholder="Complemento"
                                            {{$company->address->address2 ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input value="{{$company->address->district}}" name="district" type="text"
                                           class="form-control" id="district" placeholder="Bairro"
                                        {{$company->address->district ? 'readonly':''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input value="{{$company->address->city}}" name="city" type="text"
                                           class="form-control" id="city" placeholder="Cidade"
                                        {{$company->address->city ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">UF</label>
                                    <input value="{{$company->address->state}}" name="state" type="text"
                                           class="form-control" id="state" placeholder="UF"
                                        {{$company->address->state ? 'readonly':''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">CEP</label>
                                    <input value="{{$company->address->postal_code}}" name="postal_code"
                                           type="text" class="form-control" id="postal_code" placeholder="CEP"
                                        {{$company->address->postal_code ? 'readonly':''}}>
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
                                            <input value="{{$telephone->number}}" name="telephone[0][number]"
                                                   type="text" class="form-control telephone" id="telephone"
                                                {{$telephone->number ? 'readonly':''}}>
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
                                            <input value="{{$cellphone->number}}" name="cellphone[0][number]"
                                                   type="text" class="form-control cellphone" id="cellphone"
                                                {{$telephone->number ? 'readonly':''}}>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
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


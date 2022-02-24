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
                    <input name="user_id" type="hidden" value="{{auth()->id()}}">
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
                                                   id="temperature_95%" value="50">
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
@section('js')
    <script>
        function createInput() {

            var children = $('#container-input-services').children();
            if(children.length === 0){
                var id_select = 1;
                var id_array = 0;
            } else {
                id = (children[children.length - 1].id);
                var num_id = id.split('_');
                id_select = num_id[1];
                id_select++;
                id_array = id_select;
                id_array--;
            }

            var div_card = $('<div>').attr({
                class: 'card',
                id: 'card_' + id_select
            });
            $('<div>').attr({
                class: 'card-body',
                id: 'card_body_' + id_select
            }).appendTo(div_card);

            div_card.appendTo('#container-input-services');

            $('<label>').attr({
                for:'service_' + id_select,
            }).text('Serviço').appendTo('#card_body_' + id_select);
            $('<select>').attr({
                id: 'service_' + id_select,
                name: "services[" +  id_array  + "][service_id]",
                class: 'form-control'
            }).appendTo('#card_body_' + id_select);

            $('<label>').attr({
                for: 'service_quantity_' + id_select,
            }).text('Quantidade').appendTo('#card_body_' + id_select);
            $('<input>').attr({
                type: 'text',
                id: 'service_quantity_' + id_select,
                name: "services[" +  id_array  + "][quantity]",
                class: 'form-control'
            }).appendTo('#card_body_' + id_select);

            populateSelect(id_select);
        }
        function populateSelect(id_select) {
            $.ajax({
                url:'/api/getServicesList/',
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {

                            var id = response.data[i].id;
                            var name = response.data[i].name;

                            var option = "<option value='"+ id +"'>"+name+"</option>";

                            $("#service_" + id_select).append(option);
                        }
                    }
                }
            });
        }
    </script>
@endsection

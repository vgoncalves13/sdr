@extends('adminlte::page')

@section('title', 'Criar usuário')

@section('content_header')
    <h1>Criar usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('users.store')}}" role="form">
                    @csrf
                    <div class="card-body">
                           <div class="form-group">
                               <label for="name">Nome usuário</label>
                               <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name" placeholder="Nome usuário">
                           </div>
                           <div class="form-group">
                               <label for="login">Login</label>
                               <input value="{{old('login')}}" name="login" type="text" class="form-control" id="login" placeholder="Login">
                           </div>
                           <div class="form-group">
                               <label for="password">Senha</label>
                               <input name="password" type="password" class="form-control" id="password" placeholder="Senha">
                           </div>
                           <div class="form-group">
                               <label for="telephone">Telefone</label>
                               <input value="{{old('telephone')}}" type="text" name="telephone" class="form-control" id="telephone" placeholder="Telefone">
                           </div>
                           <div class="form-group">
                               <label for="email">E-mail</label>
                               <input value="{{old('email')}}" type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                           </div>
                        <div class="form-group">
                            <label for="role">Cargo</label>
                            <select class="form-control" name="role" id="role">
                                <option value="">Selecione um cargo...</option>
                                @foreach ($roles as $key => $value)
                                    <option @if(old('role') == $key) selected @endif value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="sector">Setor</label>
                                <select class="form-control" name="sector_id" id="sector">
                                    <option value="">Selecione um setor...</option>
                                    @foreach ($sectors as $key => $value)
                                        <option @if(old('sector_id') == $key) selected @endif value="{{ $key }}">
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="UF">UF</label>
                                <select class="form-control" name="UF" id="UF">
                                    <option value="">Selecione um estado</option>
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
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

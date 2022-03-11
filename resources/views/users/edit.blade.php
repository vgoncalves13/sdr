@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')
    <h1>Editar usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('users.update', $user)}}" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome usuário</label>
                                    <input value="{{old('name') ?? $user->people->name}}" name="name" type="text" class="form-control" id="name" placeholder="Nome usuário">
                                </div>
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input value="{{old('login') ?? $user->login}}" name="login" type="text" class="form-control" id="login" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telefone</label>
                                    <input value="{{old('telephone') ?? $user->people->telephone}}" type="text" name="telephone" class="form-control" id="telephone" placeholder="Telefone">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input value="{{old('email') ?? $user->people->email}}" type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="role">Gerente</label>
                                    <select class="form-control" name="manager_id" id="manager_id">
                                        <option value="">Nenhum</option>
                                        @foreach ($managers as $key => $value)
                                            <option @if(old('manager_id') ?? $user->people->mnanager_id == $key) selected @endif value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role">Cargo</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="">Selecione um cargo...</option>
                                        @foreach ($roles as $key => $value)
                                            <option {{$user->roles[0]->id == $key ? 'selected':''}} value="{{ $key }}">
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
                                            <option @if(old('sector_id') ?? $user->people->sector_id == $key) selected @endif value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="UF">UF</label>
                                    <select class="form-control" name="UF" id="UF">
                                        <option value="">Selecione um estado</option>
                                        <option {{$user->people->UF == 'AC' ? 'selected':''}} value="AC">Acre</option>
                                        <option {{$user->people->UF == 'AL' ? 'selected':''}} value="AL">Alagoas</option>
                                        <option {{$user->people->UF == 'AP' ? 'selected':''}} value="AP">Amapá</option>
                                        <option {{$user->people->UF == 'AM' ? 'selected':''}} value="AM">Amazonas</option>
                                        <option {{$user->people->UF == 'BA' ? 'selected':''}} value="BA">Bahia</option>
                                        <option {{$user->people->UF == 'CE' ? 'selected':''}} value="CE">Ceará</option>
                                        <option {{$user->people->UF == 'DF' ? 'selected':''}} value="DF">Distrito Federal</option>
                                        <option {{$user->people->UF == 'ES' ? 'selected':''}} value="ES">Espírito Santo</option>
                                        <option {{$user->people->UF == 'GO' ? 'selected':''}} value="GO">Goiás</option>
                                        <option {{$user->people->UF == 'MA' ? 'selected':''}} value="MA">Maranhão</option>
                                        <option {{$user->people->UF == 'MT' ? 'selected':''}} value="MT">Mato Grosso</option>
                                        <option {{$user->people->UF == 'MS' ? 'selected':''}} value="MS">Mato Grosso do Sul</option>
                                        <option {{$user->people->UF == 'MG' ? 'selected':''}} value="MG">Minas Gerais</option>
                                        <option {{$user->people->UF == 'PA' ? 'selected':''}} value="PA">Pará</option>
                                        <option {{$user->people->UF == 'PB' ? 'selected':''}} value="PB">Paraíba</option>
                                        <option {{$user->people->UF == 'PR' ? 'selected':''}} value="PR">Paraná</option>
                                        <option {{$user->people->UF == 'PE' ? 'selected':''}} value="PE">Pernambuco</option>
                                        <option {{$user->people->UF == 'PI' ? 'selected':''}} value="PI">Piauí</option>
                                        <option {{$user->people->UF == 'RJ' ? 'selected':''}} value="RJ">Rio de Janeiro</option>
                                        <option {{$user->people->UF == 'RN' ? 'selected':''}} value="RN">Rio Grande do Norte</option>
                                        <option {{$user->people->UF == 'RS' ? 'selected':''}} value="RS">Rio Grande do Sul</option>
                                        <option {{$user->people->UF == 'RO' ? 'selected':''}} value="RO">Rondônia</option>
                                        <option {{$user->people->UF == 'RR' ? 'selected':''}} value="RR">Roraima</option>
                                        <option {{$user->people->UF == 'SC' ? 'selected':''}} value="SC">Santa Catarina</option>
                                        <option {{$user->people->UF == 'SP' ? 'selected':''}} value="SP">São Paulo</option>
                                        <option {{$user->people->UF == 'SE' ? 'selected':''}} value="SE">Sergipe</option>
                                        <option {{$user->people->UF == 'TO' ? 'selected':''}} value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

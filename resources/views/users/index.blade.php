@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('users.create')}}">Cadastrar novo usuário</a>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->people->name}}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->description}}
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('users.show',$user)}}">Ver</a>
                                    <a class="btn btn-flat btn-info btn-sm" href="{{route('users.edit',$user)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop

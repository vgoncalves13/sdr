@extends('adminlte::page')

@section('title', 'Criar equipe')

@section('content_header')
    <h1>Criar equipe</h1>
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
                <form method="POST" action="{{route('teams.store')}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nome equipe</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Nome equipe">
                        </div>
                        <div class="form-group">
                            <label for="display_name">Nome de exibição</label>
                            <input name="display_name" type="text" class="form-control" id="display_name" placeholder="Nome de exibição">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Descrição"></textarea>
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

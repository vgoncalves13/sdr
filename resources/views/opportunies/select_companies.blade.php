@extends('adminlte::page')

@section('title', 'Oportunidades')

@section('content_header')
    <h1>Selecionar empresa</h1>
@stop
@section('content')
    <div class="card card-default">
        <div class="row">
            <div class="col-12">
                <div class="p-3">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Nome Empresa</th>
                                <th>Nome contato</th>
                                <th>Endereço</th>
                                <th>Cidade</th>
                                <th>Telefones</th>
                                <th>Criada em</th>
                                <th>Última atualização</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->id ?? $company->Id}}</td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="{{$company->name ?? $company->NOME}}">
                                        {{Str::limit($company->name,10) ?? Str::limit($company->NOME,10)}}
                                    </td>
                                    <td>{{$company->contact_name}}</td>
                                    <td>{{$company->address->address ?? $company->ENDERECO}}</td>
                                    <td>{{$company->address->city ?? $company->CIDADE}}</td>
                                    <td>
                                        @if(isset($company->telephones))
                                            <p>
                                                <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse"
                                                        data-target="#collapse{{$company->id}}" aria-expanded="false"
                                                        aria-controls="collapse{{$company->id}}">
                                                    Ver mais...
                                                </button>
                                            <div class="collapse" id="collapse{{$company->id}}">
                                                @forelse($company->telephones as $telephone)
                                                    {{$telephone->number}} / {{$telephone->type}}<br>
                                                @empty
                                                    Nenhum telefone cadastrado
                                                @endforelse
                                            </div>
                                        @else
                                            <p>
                                                <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse"
                                                        data-target="#collapse{{$company->id ?? $company->Id}}" aria-expanded="false"
                                                        aria-controls="collapse{{$company->id ?? $company->Id}}">
                                                    Ver mais...
                                                </button>
                                            <div class="collapse" id="collapse{{$company->id}}">
                                                {{$company->FIXO1}}<br>
                                                {{$company->FIXO2}}<br>
                                                {{$company->FIXO3}}<br>
                                                {{$company->CEL1}}<br>
                                                {{$company->CEL2}}<br>
                                                {{$company->CEL3}}
                                            </div>
                                        @endif
                                    </td>
                                    <td><small>@if(isset($company->created_at)){{\Carbon\Carbon::parse($company->created_at)->format('d/m/Y H:i')}}@else @endif</small></td>
                                    <td><small>@if(isset($company->updated_at)){{\Carbon\Carbon::parse($company->updated_at)->format('d/m/Y H:i')}}@else @endif</small></td>
                                    <td>
                                        <a class="btn btn-flat btn-info btn-sm"
                                           href="{{route('opportunities.dispatch_opportunity',
                                        [$company->id ?? $company->Id, $company->id ? 'INTERNAL' : 'EXTERNAL'])}}">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('#data-table').DataTable( {
            responsive: true
        } );
    </script>
@endsection

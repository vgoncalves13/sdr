@extends('adminlte::page')
@section('plugins.select2', true)
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title', 'Processar Leads')

@section('content_header')
    <h1>Processar Leads</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Processar Leads</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('leads.process')}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companies_to_process">Quantidade de empresas</label>
                                    <input name="companies_to_process" type="number" max="50000" class="form-control"
                                           id="companies_to_process" placeholder="Apenas números">
                                    <p class="small">Digite a quantidade de empresas que o sistema deverá verificar e gerar leads.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="carrier">Operadora</label>
                                    <select class="form-control select2" multiple="multiple" name="carrier[]" id="carrier">
                                        <option value="">Selecione uma operadora ou deixe em branco para todas...</option>
                                        @foreach ($carriers as $key => $value)
                                            <option value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="UF">UF</label>
                                    <select class="form-control select2" multiple="multiple" name="UF[]" id="UF">
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
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Processar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de processamentos</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nome</th>
                            <th>Empresas</th>
                            <th>Empresas pendentes</th>
                            <th>Criado em</th>
                            <th>Finalizado em</th>
                            <th>Status</th>
                        </tr>
                        @foreach($batches as $batch)
                            <tr>
                                <td>{{$batch->name}}</td>
                                <td>{{$batch->total_jobs}}</td>
                                <td>{{$batch->pending_jobs}}</td>
                                <td>{{\Carbon\Carbon::parse($batch->created_at)->format('d/m/Y H:i')}}</td>
                                <td>@if($batch->pending_jobs > 0) -- @else {{\Carbon\Carbon::parse($batch->finished_at)->format('d/m/Y H:i')}} @endif</td>
                                <td>@if($batch->pending_jobs > 0)Processando @else Concluído @endif</td>
                            </tr>
                        @endforeach
                    </table>
                    {{$batches->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection

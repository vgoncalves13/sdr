<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cadastrar Oportunidade</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="form_opportunity" method="GET" action="{{$route}}" role="form">
        <div class="card-body">
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <p class="small">Insira o CNPJ para verificar se já existe alguma empresa em nosso banco de dados</p>
                <input name="cnpj" type="text" class="form-control" id="cnpj"
                       placeholder="Apenas números">
            </div>
            <div class="form-group">
                <label for="cnpj">RAZÃO SOCIAL</label>
                <p class="small">Ou a Razão Social</p>
                <input name="name" type="text" class="form-control" id="name"
                       placeholder="">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button id="btnFetch" type="submit" class="btn btn-primary">Verificar</button>
        </div>
    </form>
</div>

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h1>Alterar cliente</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/clientes/alterar">
                        <input type="hidden" name="id" value="<?= $cliente["id"] ?>" />
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="name" class="col-md-4 control-label">Nome/Razão Social</label>

                                <input id="name" type="text" class="form-control" name="nomeRazao" required autofocus minlength=3 value="<?= $cliente["nomeRazao"] ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cpfCnpj" class="col-md-4 control-label">CPF/CNPJ</label>

                                <input id="cpfCnpj" type="text" class="form-control" name="cpfCnpj" required minlength=11 maxlength=14 value="<?= $cliente["cpfCnpj"] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email" class="col-md-4 control-label">E-mail</label>

                                <input id="email" type="email" class="form-control" name="email" required value="<?= $cliente["email"] ?>">
                            </div>

                            <div class="form-group col-md-8">
                                <label for="apelidoFantasia" class="col-md-4 control-label">Apelido/Nome Fantasia</label>

                                <input id="apelidoFantasia" type="text" class="form-control" name="apelidoFantasia" required value="<?= $cliente["apelidoFantasia"] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="telefone" class="col-md-4 control-label">Telefone</label>

                                <input id="telefone" type="text" class="form-control" name="telefone" minlength=11 maxlength=11 required value="<?= $cliente["telefone"] ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cep" class="col-md-4 control-label">CEP</label>

                                <input id="cep" type="text" class="form-control" name="cep" minlength=8 maxlength=8 required value="<?= $cliente["cep"] ?>">
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <div class="col-md-12 text-center">
                                <a style="width: 20%;" class="btn btn-sm btn-outline-secondary mx-1" href="/clientes">Cancelar</a>
                                <button style="width: 20%;" type="submit" class="btn btn-sm btn-primary mx-1">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

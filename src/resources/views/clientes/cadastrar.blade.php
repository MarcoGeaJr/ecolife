@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h1>Novo cliente</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/clientes/cadastrar">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="name" class="col-md-4 control-label">Nome/Razão Social</label>

                                <input id="name" type="text" class="form-control" name="nomeRazao" required autofocus minlength=3>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cpfCnpj" class="col-md-4 control-label">CPF/CNPJ</label>

                                <input id="cpfCnpj" type="text" class="form-control" name="cpfCnpj" required minlength=11 maxlength=14>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email" class="col-md-4 control-label">E-mail</label>

                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="apelidoFantasia" class="col-md-4 control-label">Apelido/Nome Fantasia</label>

                                <input id="apelidoFantasia" type="text" class="form-control" name="apelidoFantasia" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="telefone" class="col-md-4 control-label">Telefone</label>

                                <input id="telefone" type="text" class="form-control" name="telefone" minlength=11 maxlength=11 required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cep" class="col-md-4 control-label">CEP</label>

                                <input id="cep" type="text" class="form-control" name="cep" minlength=8 maxlength=8 required>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <div class="col-md-12 text-center">
                                <a style="width: 20%;" class="btn btn-sm btn-outline-secondary mx-1" href="/clientes">Cancelar</a>
                                <button style="width: 20%;" type="submit" class="btn btn-sm btn-primary mx-1">
                                    Cadastrar
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

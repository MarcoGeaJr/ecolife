@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h1>Novo orçamento</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/orcamentos/cadastrar">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="cliente" class="col-md-4 control-label">Cliente</label>
                                <select id="cliente" name="cliente" class="form-control custom-select p-2" required>
                                    <?php foreach($clientes as $cliente) { ?>
                                        <option value="<?= $cliente['id'] ?>"><?= $cliente['nomeRazao'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="empreendimento" class="col-md-5 control-label">Tipo empreendimento</label>
                                <select id="empreendimento" name="tipo_empreendimento" class="form-control custom-select p-2" required>
                                    <?php foreach($tp_empreendimentos as $tp => $tp_descricao) { ?>
                                        <option value="<?= $tp ?>"><?= $tp_descricao ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="CEP" class="col-md-4 control-label">CEP</label>

                                <input id="CEP" type="text" class="form-control" name="cep" required maxlength=9>
                            </div>

                            <div class="form-group col-md-8">
                                    <label for="cidade" class="col-md-4 control-label">Cidade</label>

                                    <input id="cidade" type="text" class="form-control" name="cidade" required maxlength=150>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-9">
                                    <label for="logradouro" class="col-md-4 control-label">Logradouro</label>

                                    <input id="logradouro" type="text" class="form-control" name="logradouro" required maxlength=250>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero" class="col-md-3 control-label">Número</label>

                                <input id="numero" type="text" class="form-control" name="numero" required maxlength=9>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="regioes" class="col-md-3 control-label">Região</label>
                                <select id="regioes" name="regiao" class="form-control custom-select p-2" required>
                                    <?php foreach($regioes as $regiao => $regiao_desc) { ?>
                                        <option value="<?= $regiao ?>"><?= $regiao_desc ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="tamanho" class="col-md-4 control-label">Tamanho (m²)</label>

                                <input id="tamanho" type="number" class="form-control" name="tamanho" required step=0.01 min=0.1 value=0.1>
                            </div>

                            @if (Auth::user()->id == 1)
                                <div class="form-group col-md-6">
                                    <label for="palavra_segura" class="col-md-5 control-label">Palavra segura</label>

                                    <input id="palavra_segura" type="text" class="form-control" name="palavra_segura" required maxlength=50>
                                </div>
                            @endif
                        </div>

                        <div class="form-group pt-4">
                            <div class="col-md-12 text-center">
                                <a style="width: 20%;" class="btn btn-sm btn-outline-secondary mx-1" href="/orcamentos">Cancelar</a>
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
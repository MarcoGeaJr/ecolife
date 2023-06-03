@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h1>Orçamento #<?= $orcamento['id'] ?></h1>
                </div>
                

                <div class="panel-body">
                    <input type="hidden" class="form-control" name="id" value="<?= $orcamento['id'] ?>">
                    
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="cliente" class="col-md-4 control-label">Cliente</label>
                            <input id="cliente" type="text" class="form-control" name="cliente" value="<?= $orcamento['cliente'] ?>" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="empreendimento" class="col-md-5 control-label">Tipo empreendimento</label>
                            <input id="empreendimento" type="text" class="form-control" name="empreendimento" value="<?= $orcamento['empreendimento'] ?>" readonly />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="CEP" class="col-md-4 control-label">CEP</label>

                            <input id="CEP" type="text" class="form-control" name="cep" value="<?= $orcamento['cep'] ?>" readonly />
                        </div>

                        <div class="form-group col-md-8">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label>

                            <input id="cidade" type="text" class="form-control" name="cidade" value="<?= $orcamento['cidade'] ?>" readonly />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="logradouro" class="col-md-4 control-label">Logradouro</label>

                            <input id="logradouro" type="text" class="form-control" name="logradouro" value="<?= $orcamento['logradouro'] ?>" readonly />
                        </div>

                        <div class="form-group col-md-3">
                            <label for="numero" class="col-md-3 control-label">Número</label>

                            <input id="numero" type="text" class="form-control" name="numero" value="<?= $orcamento['numero'] ?>" readonly />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="regioes" class="col-md-3 control-label">Região</label>
                            <input id="regioes" type="text" class="form-control" name="regiao" value="<?= $orcamento['regiao'] ?>" readonly />
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tamanho" class="col-md-4 control-label">Tamanho (m²)</label>

                            <input id="tamanho" type="number" class="form-control" name="tamanho" value="<?= $orcamento['tamanho_terreno'] ?>" readonly />
                        </div>

                        @if (Auth::user()->id == 1)
                            <div class="form-group col-md-6">
                                <label for="palavra_segura" class="col-md-5 control-label">Palavra segura</label>

                                <input id="palavra_segura" type="text" class="form-control" name="palavra_segura" value="<?= $orcamento['palavra_segura'] ?>" readonly />
                            </div>
                        @endif
                    </div>

                    <hr/>
                    <div>
                        <h2>Itens</h2>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Descricao</th>
                                        <th class="border-top-0">Quantidade</th>
                                        <th class="border-top-0">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($itens as $item) { ?>
                                        <tr>
                                            <td><?= $item["id"] ?></td>
                                            <td><?= $item["descricao_item"] ?></td>
                                            <td><?= $item["quantidade"] ?></td>
                                            <td><?= $item["valor_total"] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group pt-4">
                        <div class="col-md-12 text-center">
                            <a style="width: 20%;" class="btn btn-sm btn-outline-secondary mx-1" href="/orcamentos">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
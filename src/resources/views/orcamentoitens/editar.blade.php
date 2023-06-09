@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h1>Editar item - Orçamento #<?= $item["orcamento_id"] ?></h1>
                </div>

                <div class="panel-body">
                    <form method="POST" action="/orcamentoitens/alterar">
                        <input type="hidden" class="form-control" name="id" value="<?= $item["id"] ?>">

                        <div class="row">
                            <div class="form-group col">
                                <label for="descricao_item" class="col-md-4 control-label">Descrição</label>

                                <input id="descricao_item" type="text" class="form-control" name="descricao_item" required maxlength=300 value="<?= $item["descricao_item"] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="quantidade" class="col-md-4 control-label">Quantidade</label>

                                <input id="quantidade" type="number" class="form-control" name="quantidade" required step=0.01 min=0.1 value="<?= $item["quantidade"] ?>">
                            </div>

                            <div class="form-group col-6">
                                <label for="valor_unitario" class="col-md-4 control-label">Valor unitário</label>

                                <input id="valor_unitario" type="number" class="form-control" name="valor_unitario" required step=0.01 min=0.1 value="<?= $item["valor_unitario"] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="observacao_item" class="col-md-4 control-label">Observações</label>
                                <textarea class="form-control p-2" id="observacao_item" rows="3" name="observacao_item"><?= trim($item["observacao_item"], " \n\r\t\v\x00") ?></textarea>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <div class="col-md-12 text-center">
                                <a style="width: 20%;" class="btn btn-sm btn-outline-secondary mx-1" href="/orcamentos/orcar/<?= $item["orcamento_id"] ?>">Cancelar</a>
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
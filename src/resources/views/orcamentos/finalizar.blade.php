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
                    <form method="POST" action="/orcamentos/finalizado">
                        <input type="hidden" name="orcamento_id" value="<?= $orcamento['id'] ?>" />
                        <div class="row">
                            <div class="form-group col-md-9">
                                    <label for="empreendimento" class="col-md-4 control-label">Nome empreendimento</label>

                                    <input id="empreendimento" type="text" class="form-control" name="nome_empreendimento" required maxlength=250>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero" class="col-md-4 control-label">Data Entrega</label>

                                <input id="numero" type="date" class="form-control" name="data_entrega" required maxlength=9>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                    <label for="imagem" class="col-md-4 control-label">Imagem</label>

                                    <input id="imagem" type="text" class="form-control" name="imgHorizontal" required maxlength=250>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <div class="col-md-12 text-center">
                                <a style="width: 20%;" class="btn btn-sm btn-outline-secondary mx-1" href="/orcamentos">Cancelar</a>
                                <button style="width: 20%;" type="submit" class="btn btn-sm btn-primary mx-1">
                                    Finalizar
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
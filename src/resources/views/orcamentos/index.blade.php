@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <div class="row">
                        <div class="col-md-10 my-auto">
                            <h1 class="my-auto">Orçamentos</h1>
                        </div>

                        <div class="col-md-2 my-auto">
                            <a class="btn btn-sm btn-success w-100" href="/orcamentos/novo">Novo</a>
                        </div>
                    </div>
                    <hr />
                </div>
                

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Cliente</th>
                                    <th class="border-top-0">Cidade</th>
                                    <th class="border-top-0">Região</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Valor</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orcamentos as $orcamento) { ?>
                                    <tr>
                                        <td><?= $orcamento["id"] ?></td>
                                        <td><?= $orcamento["nome_cliente"] ?></td>
                                        <td><?= $orcamento["cidade"] ?></td>
                                        <td><?= $orcamento["regiao"] ?></td>
                                        <td><?= $orcamento["status"] ?></td>
                                        <td><?= $orcamento["valor"] ?></td>
                                        @if (Auth::user()->id == 1)
                                            <?php foreach($orcamento["acao"] as $descricao => $rota) { ?>
                                                <td class="text-center"><a class="btn btn-sm btn-warning w-100" href="/orcamentos/<?= $rota ?>/<?= $orcamento["id"] ?>"><?= $descricao ?></a></th>
                                                
                                                <?php if ($orcamento["cancelar"]) { ?>
                                                    <td class="text-center"><a class="btn btn-sm btn-danger w-100" href="/orcamentos/cancelar/<?= $orcamento["id"] ?>">Cancelar</a></th>
                                                <?php } else { ?>
                                                    <td></td>
                                                <?php } ?>
                                            <?php } ?>
                                        @else
                                            <td></td>
                                            <td></td>
                                        @endif
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <div class="row">
                        <div class="col-md-10 my-auto">
                            <h1 class="my-auto">Clientes</h1>
                        </div>

                        <div class="col-md-2 my-auto">
                            <a class="btn btn-sm btn-success w-100" href="/clientes/novo">Novo</a>
                        </div>
                    </div>
                    <hr />
                </div>
                

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Nome/Razão Social</th>
                                    <th class="border-top-0">Apelido/Fantasia</th>
                                    <th class="border-top-0">CPF/CNPJ</th>
                                    <th class="border-top-0">Telefone</th>
                                    <th class="border-top-0" colspan=2></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($clientes as $cliente) { ?>
                                    <tr>
                                        <td><?= $cliente["nomeRazao"] ?></td>
                                        <td><?= $cliente["apelidoFantasia"] ?></td>
                                        <td><?= $cliente["cpfCnpj"] ?></td>
                                        <td><?= $cliente["telefone"] ?></td>
                                        @if (Auth::user()->id == 1)
                                            <td class="text-center"><a class="btn btn-sm btn-warning w-100" href="/clientes/editar/<?= $cliente["id"] ?>">Alterar</a></th>
                                            <td class="text-center"><a class="btn btn-sm btn-danger w-100" href="/clientes/excluir/<?= $cliente["id"] ?>">Excluir</a></th>
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

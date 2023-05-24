@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <div class="row">
                        <div class="col-md-10 my-auto">
                            <h1 class="my-auto">Usuários</h1>
                        </div>

                        <div class="col-md-2 my-auto">
                            <a class="btn btn-sm btn-success w-100" href="/usuarios/novo">Novo</a>
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
                                    <th class="border-top-0">Nome</th>
                                    <th class="border-top-0">E-mail</th>
                                    <th class="border-top-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usuarios as $usuario) { ?>
                                    <tr>
                                        <td><?= $usuario["id"] ?></td>
                                        <td><?= $usuario["name"] ?></td>
                                        <td><?= $usuario["email"] ?></td>
                                        <?php if ($usuario["id"] != "1") { ?>
                                            @if (Auth::user()->id == 1)
                                                <td class="text-center"><a class="btn btn-sm btn-danger w-50" href="/usuarios/excluir/<?= $usuario["id"] ?>">Excluir</a></th>
                                            @else
                                                <td></td>
                                            @endif
                                        <?php } else { ?>
                                            <td></td>
                                        <?php } ?>
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
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <div class="row">
                        <div class="col-md-10 my-auto">
                            <h1 class="my-auto">Obras</h1>
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
                                    <th class="border-top-0">Empreendimento</th>
                                    <th class="border-top-0">Data entrega</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($obras as $obra) { ?>
                                    <tr>
                                        <td><?= $obra["id"] ?></td>
                                        <td><?= $obra["nome_empreendimento"] ?></td>
                                        <td><?= $obra["data_entrega"] ?></td>
                                        @if (Auth::user()->id == 1)
                                            <td class="text-center"><a class="btn btn-sm btn-danger w-100" href="/obras/cancelar/<?= $obra["id"] ?>">Cancelar</a></th>
                                        @else
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
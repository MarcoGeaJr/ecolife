@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <div class="row">
                        <div class="col-md-6 my-auto">
                            <h1 class="my-auto">Comentários</h1>
                        </div>

                        <div class="col-md-6 my-auto">
                            <form action="/comentarios" method="GET">
                                <div class="input-group my-auto">
                                    <input type="text" class="form-control form-control-sm my-auto" name="search" placeholder="Pesquisa por nome/descrição" aria-label="Pesquisa por nome/descrição" aria-describedby="basic-addon2">
                                    <div class="input-group-append my-auto">
                                        <button type="submit" class="btn btn-sm"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr />
                </div>

                <div class="panel-body">
                    <?php foreach($comentarios as $comentario) { ?>
                        <div class="row mb-4 border-bottom">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="d-inline"><?= $comentario["nome"] ?> - </h5>
                                    <a class="link text-danger" href="/comentarios/excluir/<?= $comentario["id"] ?>">Excluir</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 ">
                                    <span class="text-secondary"><?= date("d/m/Y H:i", strtotime($comentario["created_at"])) ?></span>
                                    <span class="fw-light text-secondary"> - <?= $comentario["obra"] ?></span>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <p class="text-justify"><?= $comentario["descricao"] ?></p>
                                </div>
                            </div>                           
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

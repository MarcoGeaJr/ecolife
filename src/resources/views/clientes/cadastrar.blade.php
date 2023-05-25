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

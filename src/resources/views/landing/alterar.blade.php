@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h1>Eco Life</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/landing/alterar">
                        <div class="form-group">
                            <label for="quemSomos">Quem somos</label>
                            <textarea class="form-control p-2" id="quemSomos" rows="3" name="quemSomos"><?= $landing["quemSomos"] ?></textarea>
                        </div>

                        <div class="form-group pt-4">
                            <div class="col-md-12 text-center">
                                <button style="width: 20%;" type="submit" class="btn btn-sm btn-primary mx-1">
                                    Alterar
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

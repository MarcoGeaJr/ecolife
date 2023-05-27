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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

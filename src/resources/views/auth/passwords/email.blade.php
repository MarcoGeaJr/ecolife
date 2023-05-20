@extends('layouts.adminbase')

@section('content')
<div class="container col-md-6">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Redefinir senha</h1>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <strong>O e-mail está inválido.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary w-50">
                                    Enviar e-mail
                                </button>

                                <a class="btn btn-link" href="/login">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2023 © EcoLife
            <a href="https://github.com/MarcoGeaJr/" target="_blank">gsoftconsultancy.com</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
</div>
@endsection

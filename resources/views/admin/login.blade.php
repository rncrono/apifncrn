@extends('admin.layout.main')
@section('title')
    Login
@endsection
@section('secondaryCss')
    <link rel="stylesheet" type="text/css" href="<?=asset('css/login.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=asset('css/admin/sb-admin-2.min.css')?>">
@endsection
@section('content')
    <div class="form-login">
        <div class="left">

        </div>
        <div class="right">
            <form action="{{ route('logar') }}" method="post">
                @csrf
                <div class="header-login">
                    <h3>ADMIN</h3>
                </div>
                <hr>
                <div class="body-login">
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-12 input-group">
                            <input class="form-control" type="text" name="login" placeholder="Login">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 input-group">
                            <input class="form-control" type="password" name="senha" placeholder="Senha">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="submit" value="ENTRAR">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="forget-pass">Esqueceu a senha? <a href="#">Clique aqui!</a></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="font-size: 0.9em"><a href="#">Desenvolvedor</a></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('onPageJS')
    <script src="<?=asset('js/admin/sb-admin-2.min.js')?>"></script>
@endsection
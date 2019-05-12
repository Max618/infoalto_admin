@extends('layout.auth')

@section('title','Resetar Senha')

@section('content')
<div class="auth-box ">
    <div class="left">
        <div class="content">
            <div class="header">
                <div class="logo text-center"><img src="{{ asset('admin/img/logo-dark.png') }}" alt="Klorofil Logo"></div>
                <p class="lead">Resetar a senha</p>
            </div>
            <form class="form-auth-small" action="index.php">
                <div class="form-group">
                    <label for="signin-email" class="control-label sr-only">E-mail</label>
                    <input type="email" class="form-control" id="signin-email" placeholder="E-mail">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">ENVIAR</button>
            </form>
        </div>
    </div>
    <div class="right">
        <div class="overlay"></div>
        <div class="content text">
            <h1 class="heading">Sistema gerenciador de conteúdo</h1>
            <p>desenvolvido por <a target="_blank" href="https://www.infoalto.com.br">Infoalto</a></p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
@extends('layout.auth')

@section('title','Login')

@section('content')
<div class="auth-box ">
    <div class="left">
        <div class="content">
            <div class="header">
                <div class="logo text-center"><img src="{{ asset('admin/img/logo-dark.png') }}" alt="Klorofil Logo"></div>
                <p class="lead">Entre no sistema</p>
            </div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-times-circle"></i> {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="form-auth-small" method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <label for="signin-email" class="control-label sr-only">E-mail</label>
                    <input type="email" class="form-control" id="signin-email" name="email" placeholder="E-mail" autofocus>
                </div>
                <div class="form-group">
                    <label for="signin-password" class="control-label sr-only">Senha</label>
                    <input type="password" class="form-control" id="signin-password" name="password" placeholder="Senha">
                </div>
                <div class="form-group clearfix">
                    <label class="fancy-checkbox element-left">
                        <input type="checkbox">
                        <span>Lembrar de mim</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">ENTRAR</button>
                <div class="bottom">
                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Esquecer sua senha?</a></span>
                </div>
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
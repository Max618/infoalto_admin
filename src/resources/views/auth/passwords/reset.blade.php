@extends('layout.auth')

@section('title','Criar nova senha')

@section('content')
<div class="auth-box ">
    <div class="left">
        <div class="content">
            <div class="header">
                <div class="logo text-center"><img src="{{ asset('admin/img/logo-dark.png') }}" alt="Klorofil Logo"></div>
                <p class="lead">Criar nova senha</p>
            </div>
            @if($errors->any())
					@foreach($errors->all() as $error)
						<div class="alert alert-danger" role="alert">
							<i class="fa fa-times-circle"></i> {{ $error }}
						</div>
					@endforeach
				@endif
            <form class="form-auth-small" action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="signin-email" class="control-label sr-only">E-mail</label>
                    <input type="email" id="signin-email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autofocus placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="signin-password" class="control-label sr-only">Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="signin-password" name="password" placeholder="Senha">
                </div>
                <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Confirmar a senha</label>
                        <input type="password" class="form-control" id="signin-password" name="password_confirmation" placeholder="Confirme a senha">
                    </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">CRIAR NOVA SENHA</button>
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
@extends('layout.auth')

@section('title','Verificação')

@section('content')
<div class="auth-box ">
    <div class="left">
        <div class="content">
            <div class="header">
                <div class="logo text-center"><img src="{{ asset('admin/img/logo-dark.png') }}" alt="Klorofil Logo"></div>
                <p class="lead">Verifique seu e-mail</p>
            </div>
            @if($errors->any())
					@foreach($errors->all() as $error)
						<div class="alert alert-danger" role="alert">
							<i class="fa fa-times-circle"></i> {{ $error }}
						</div>
					@endforeach
				@endif
            <div class="form-auth-small">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Um link de verificação foi enviado para o seu e-mail.') }}
                    </div>
                @endif
                {{ __('Antes de proceguir, por favor verifique seu e-mail.') }}
                {{ __('Se você não recebeu o e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para enviar outro') }}</a>.
                
            </div>
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
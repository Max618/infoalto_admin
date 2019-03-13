@extends('layout.auth')

@section('title','Login')

@section('content')
<div class="auth-box ">
    <div class="left">
        <div class="content">
            <div class="header">
                <h1>{{$exception->getStatusCode()}}</h1>
                @switch($exception->getStatusCode())
                    @case(404)
                        <p>Desculpe, a página que você está procurando não existe</p>
                        @break
                    @case(500)
                        <p>Desculpe, estamos passando por problemas técnicos nessa área.</p>
                        @break
                    @default
                        <p>{{$exception->getMessage()}}</p>
                @endswitch
                <a class="btn btn-primary" href="{{route('welcome')}}">Página Inicial</a>
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
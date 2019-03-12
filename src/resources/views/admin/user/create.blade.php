@extends('layout.dashboard')

@section("title", "Criar Usuário")

@section('content')
<h3 class="page-title">Criar Usuário</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
            <!-- FORM HOVER -->
            {!! Form::open(["route" => "user.store", "method" => "post", "class" => "panel-body"]) !!}
                {!! Form::text("name","", ["class" => "form-control", "placeholder" => "Digite o Nome"]) !!}
                <br>
                {!! Form::email("email","", ["class" => "form-control", "placeholder" => "Digite o E-mail"]) !!}
                <br>
                {!! Form::password("password", ["class" => "form-control", "placeholder" => "Digite a Senha"]) !!}
                <br>
                {!! Form::select('role_id', $roles, null, ["class" => "form-control", "placeholder" => "Escolha a função"]) !!}
                <br>
                <div class="col-md-12 text-center">
                    {!! Form::submit("Salvar", ["class" => "btn btn-primary"]) !!}
                    <a class="btn btn-danger" href="{{ route('user.index') }}">Cancelar</a>
                </div>
            {!! Form::close() !!}
            <!-- END FORM HOVER -->
            </div>
        </div>
    </div>
</div>
@endsection
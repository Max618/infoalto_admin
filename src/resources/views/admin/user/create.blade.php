@extends('layout.dashboard')

@section('content')
<h3 class="page-title">Criar Usuário</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
        <!-- FORM HOVER -->
        {!! Form::open(["route" => "user.store", "method" => "post", "class" => "panel-body"]) !!}
            {!! Form::label('name', "Nome", ["class" => ""]) !!}
            {!! Form::text("name","", ["class" => "form-control"]) !!}

            {!! Form::label('email', "E-mail", ["class" => ""]) !!}
            {!! Form::email("email","", ["class" => "form-control"]) !!}

            {!! Form::label('password', "Senha", ["class" => ""]) !!}
            {!! Form::password("password", ["class" => "form-control"]) !!}

            <div class="col-md-6">
                {!! Form::submit("Salvar", ["class" => "btn btn-primary"]) !!}
                <a class="btn btn-danger" href="{{ route('user.index') }}">Cancelar</a>
            </div>
        {!! Form::close() !!}
        <!-- END FORM HOVER -->
        </div>
    </div>
</div>
@endsection
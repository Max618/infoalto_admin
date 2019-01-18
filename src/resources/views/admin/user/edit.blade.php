@extends('layout.dashboard')

@section("title", "Editar Usuários")

@section('content')
<h3 class="page-title">Editar Usuário</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
            <!-- FORM HOVER -->
            {!! Form::model($user,["route" => ["user.update", $user], "method" => "put", "class" => "panel-body"]) !!}
                {!! Form::text("name",null, ["class" => "form-control", "placeholder" => "Digite o Nome"]) !!}
                <br>
                {!! Form::email("email",null, ["class" => "form-control", "placeholder" => "Digite o E-mail"]) !!}
                <br>
                {!! Form::select('role_id', $roles, $user->roles[0]->id, ["class" => "form-control", "placeholder" => "Escolha a função"]) !!}
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
@extends('layout.dashboard')

@section("title", "Editar Função")

@section('content')
<h3 class="page-title">Editar Função</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
            <!-- FORM HOVER -->
            {!! Form::model($role, ["route" => ["role.update", $role], "method" => "put", "class" => "panel-body"]) !!}
                {!! Form::text("name",null, ["class" => "form-control", "placeholder" => "Digite o Nome"]) !!}
                <br>
                {!! Form::textarea("description",null, ["class" => "form-control", "placeholder" => "Digite a Descrição"]) !!}
                <br>
                {!! Form::text("permissions",null, ["class" => "form-control", "placeholder" => "Digite as permissões separdas por / usando o padrao (create,edit,view,delete) e a model"]) !!}
                <br>
                <div class="col-md-12 text-center">
                    {!! Form::submit("Salvar", ["class" => "btn btn-primary"]) !!}
                    <a class="btn btn-danger" href="{{ route('role.index') }}">Cancelar</a>
                </div>
            {!! Form::close() !!}
            <!-- END FORM HOVER -->
            </div>
        </div>
    </div>
</div>
@endsection
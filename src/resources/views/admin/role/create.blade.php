@extends('layout.dashboard')

@section("title", "Criar Função")

@section('content')
{{dd(getModels())}}
<h3 class="page-title">Criar Função</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
            <!-- FORM HOVER -->
            {!! Form::open(["route" => "role.store", "method" => "post", "class" => "panel-body"]) !!}
                {!! Form::text("name",null, ["class" => "form-control", "placeholder" => "Digite o Nome"]) !!}
                <br>
                {!! Form::textarea("description",null, ["class" => "form-control", "placeholder" => "Digite a Descrição"]) !!}
                <br>
                {!! Form::text("permissions",null, ["class" => "form-control", "placeholder" => "Digite as permissões separdas por / usando o padrao (create,edit,view,delete) e a model"]) !!}
                <div class="col-md-12">
                    <div class="col-md-6">
                        <input type="checkbox"/>Todas
                    </div>
                    <div class="col-md-6"></div>
                </div>
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
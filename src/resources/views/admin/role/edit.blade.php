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
                <div class="col-md-12">
                    <label for="permissions">Permissões da função</label>
                </div>
                <div id="permissions" class="col-md-12">
                    <div class="col-md-6">
                        <div class="row">
                            <input id="allModels" type="checkbox"/> Todos Itens
                        </div>
                        @foreach ($modelNames as $model)
                        <div class="row tooltip-box">
                            <div>
                                <input type="checkbox" class="modelIten" name="model[]" {{ $modelPermissions->contains(0,strtolower($model)) ? "checked" : "" }} value="{{ $model }}" id=""/><a id="text-iten-{{ $model }}" class="text-iten"> {{ __($model) }} </a>
                            </div>
                            <div class="tooltip-itens" id="tooltip-itens-{{ $model }}">
                                <div class="iten">
                                    Opções do {{ __($model) }}
                                </div>
                                @foreach ($options as $option)
                                    <div class="row">
                                        <input class="optionIten" type="checkbox" name="options[]" {{ $rolePermissions->contains(strtolower($model."_".$option)) ? "checked" : "" }} value="{{ $model."_".$option }}"> {{ __($option) }}
                                    </div>
                                @endforeach            
                            </div>
                        </div>
                        @endforeach                       
                    </div>
                    <hr id="hr-permissions">
                    <div class="col-md-6">
                        <div class="row">
                            <input id="allOptions" type="checkbox"/> Todas as Permissões
                        </div>
                        @foreach ($options as $option)
                            <div class="row">
                                <input class="optionIten mainOptions" type="checkbox" value="{{ $option }}"> {{ __($option) }}
                            </div>
                        @endforeach 
                    </div>
                </div>
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
@section('script')
<script>
    doTooltipFunction()
</script>
@endsection
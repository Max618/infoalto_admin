@extends('layout.dashboard')

@section("title", "Criar Função")

@section('css')
    <style>
        #hr-permissions {
            display: none;
        }
        @media(max-width: 991px) {
            #permissions #hr-permissions {
                display: block;
            }
        }
    </style>
@endsection
@section('content')
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
                <div class="col-md-12">
                    <label for="permissions">Permissões da função</label>
                </div>
                <div id="permissions" class="col-md-12">
                    <div class="col-md-6">
                        <div class="row">
                            <input id="allModels" type="checkbox"/> Todos Itens
                        </div>
                        @foreach ($modelNames as $model)
                            <div class="row itens-with-tooltip">
                                <input class="modelIten" type="checkbox" name="model[]" value="{{ $model }}"> <span>{{ __($model) }}</span>
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
                                <input class="optionIten" type="checkbox" name="options[]" value="{{ $option }}"> {{ __($option) }}
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
    const modelItens = "modelIten"
    const optionsItens = "optionIten"
    const changeIten = iten => iten.checked = !iten.checked

    const changeItens = classItens => {
        return () => {
            let itens = document.getElementsByClassName(classItens)
            Array.from(itens).forEach(changeIten)
        }
    }

    const allModels = document.getElementById("allModels")
    allModels.addEventListener("change", changeItens(modelItens))

    const allOptions = document.getElementById("allOptions")
    allOptions.addEventListener("change", changeItens(optionsItens))
</script>
@endsection
<?php

namespace Infoalto\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('role_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|max:255",
            "description" => "required",
            "model" => "required",
            "options" => "required"
        ];
    }

    public function messages(){
        return [
            "name.required" => "O campo é nome é obrigatório",
            "name.max" => "O campo nome passou do limite máximo de caracteres",
            "description.required" => "O campo descrição é obrigatório",
            "model.required" => "Deve ser escolhido pelo menos um item",
            "options.required" => "Deve ser escolhido pelo menos uma permissão"
        ];
    }
}

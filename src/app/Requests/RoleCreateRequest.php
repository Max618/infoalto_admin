<?php

namespace Infoalto\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create_role') && $this->user()->can('create_permission');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|unique:roles|max:255",
            "description" => "required"
        ];
    }

    public function messages(){
        return [
            "name.required" => "O campo é nome é obrigatório",
            "name.max" => "O campo nome passou do limite máximo de caracteres",
            "name.unique" => "O valor do nome já existe",
            "description.required" => "O campo descrição é obrigatório"
        ];
    }
}

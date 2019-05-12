<?php

namespace Infoalto\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('user_create');
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
            "email" => "required||max:255",
            "role_id" => "required|numeric"
        ];
    }

    public function messages(){
        return [
            "name.required" => "O campo é nome é obrigatório",
            "name.max" => "O campo nome passou do limite máximo de caracteres",
            "email.required" => "O campo é e-mail é obrigatório",
            "email.max" => "O campo e-mail passou do limite máximo de caracteres",
            "role_id.required" => "O campo função é ogrigatório",
        ];
    }
}

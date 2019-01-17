<?php

namespace Infoalto\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "birthday" => "required|date",
            "phone" => "required|numeric|max:11",
            "about" => "nullable"
        ];
    }

    public function messages(){
        return [
            "birthday.required" => "O campo data de nascimento é obrigatório",
            "birthday.date" => "O campo data de nacimento é deve ser uma data",
            "phone.required" => "O campo celular é obrigatório",
            "phone.numeric" => "O campo celular deve ser numérico",
            "phone.numeric" => "O campo celular deve ter no máximo 11 digitos"
        ];
    }
}

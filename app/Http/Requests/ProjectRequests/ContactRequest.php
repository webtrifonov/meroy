<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //'parent_id' => 'required|integer|exists:blog_categories,id'
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email',
            'theme' => 'sometimes|required',
            'message' => 'sometimes|required|max:10000'
        ];
    }
    public function messages()
    {
        return [
            'required.name' => ':attribute обязательно к заполнению',
            'required.email' => ':attribute обязательно к заполнению',
            'required.theme' => ':attribute обязательно к заполнению',
            'required.message' => ':attribute обязательно к заполнению',
            'max.message' => 'Превышено максимальное количество символов',
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}

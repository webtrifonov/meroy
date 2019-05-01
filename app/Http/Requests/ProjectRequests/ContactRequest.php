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
            //'parent_id' => 'sometimes|required|integer|exists:blog_categories,id'
            'name' => 'required|min:2',
            'email' => 'required|email',
            'theme' => 'required',
            'message' => 'required|max:10000'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Заполните поле :attribute',
            'name.min' => 'Не существует имен менее :min букв',
            'email.required' => 'Заполните поле :attribute',
            'email.email' => 'Не корректный e-mail',
            'theme.required' => 'Заполните поле :attribute',
            'message.required' => 'Заполните поле :attribute',
            'message.max' => 'Превышено максимальное количество символов',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'theme' => 'Тема',
            'message' => 'Сообщение',
        ];
    }
}

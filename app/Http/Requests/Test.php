<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Test extends FormRequest
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
            'name' => 'min:2'
        ];
    }
    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        dump($validator->errors());
        if($validator->fails()) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        }
        //$validator->after(function ($validator) {
        //    $validator->errors()->add('field', 'Something is wrong with this field!');
        //});
    }
}

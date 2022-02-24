<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipient_id' => ['required'],
            'body' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'recipient_id.required'    =>   'El :attribute es obligatorio',
            'body.required'            =>   'El :attribute es obligatorio',
        ];
    }
    

    public function attributes()
    {
        return [ 
            'recipient_id'  =>  'Remitente',
            'body'          =>  'Cuerpo' 
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=>'required|string',
            'idade'=>'required|integer',
            'emprego'=>'required|string',
            'id_user'=>'required|exists:users,id',
        ];
    }
    public function messages()
    {
        return[
            'nome.required' => 'Coloque o nome!'
        ];
    }
}

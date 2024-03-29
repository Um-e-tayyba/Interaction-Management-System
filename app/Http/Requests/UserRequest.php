<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:8|max:255',
        ];
    }
}

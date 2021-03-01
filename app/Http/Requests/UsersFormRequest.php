<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
{
    use PasswordValidationRules;

    public function rules()
    {
        if ($this->id){
            return [
                'username' => 'required|string',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'required',
                'residence' => 'required',
                'email' => 'required|email|unique:users,email,' . $this->id,
                'roles' => 'required|array',
                "birth_date" =>'required|olderThan:18',
            ];
        }
        return [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'residence' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'olderThan:18'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'roles' => ['required', 'array'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'txtName' => 'required|max:100|regex:/(^[A-Za-z ]+$)+/',
            'txtUser' => 'required|unique:admins,username|between:6,20',
            'txtEmail' => 'required|email|unique:admins,email|max:100',
            'txtPass' => 'required|max:50',
            'txtRePass' => 'same:txtPass'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => 'Please enter your name !!',
            'txtName.regex' => 'The name only contain letters and spaces.',
            'txtUser.required' => 'Please enter the User Name !!',
            'txtUser.unique' => 'The user has already been taken!! ',
            'txtUser.between' => 'User Name must between 6 to 20 digits!!',
            'txtEmail.required' => 'Please enter your email!!',
            'txtEmail.unique' => 'The Email has already been taken!!',
            'txtEmail.max' => 'Email is max 100 digits!!',
            'txtPass.required' => 'Please enter your password!!',
            'txtPass.max' => 'Password is max 50 digits',
            'txtRePass.same' => 'Password and RePassword is not match!!'
        ];

    }
}

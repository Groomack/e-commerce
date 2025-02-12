<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'nullable|string',
            'gender' => 'nullable|integer',
            'address' => 'nullable|string',
            'email' => 'required|string|email:rfc,dns|unique:users,email',
            'password' => 'required|string|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Email адресс должен быть в формате: example@mail.com',
            'email.unique' => 'Такой пользователь уже существует',
            'password.required' => 'Это поле обязательно для заполнения',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }
}

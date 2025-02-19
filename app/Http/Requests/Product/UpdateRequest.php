<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'previewImage' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'category_id' => 'nullable',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'price.required' => 'Это поле обязательно для заполнения',
            'price.integer' => 'Введите число',
            'quantity.required' => 'Это поле обязательно для заполнения',
            'quantity.integer' => 'Введите число',
            'previewImage.required' => 'Прикрепите изображение',
            'previewImage.image' => 'Файл должен быть картинкой',
            'previewImage.mimes' => 'Картинка должна быть в формате: jpg, jpeg, png',
            'previewImage.max' => 'Размер файла не должен превышать 2мб',
            'description.required' => 'Это поле обязательно для заполнения'
            
        ];
    }
}

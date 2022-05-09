<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title' => 'required|min:3|max:200',
            'slug' => 'max:200',
            'excerpt' => 'max:500',
            'content_raw' => 'required|string|min:5|max:10000',
            'category_id' => 'required|integer|exists:blog_categories,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.min' => 'Длина заголовка должна быть от 3 до 200 символов',
            'title.max' => 'Длина заголовка должна быть от 3 до 200 символов',
            'title.required' => 'Длина заголовка должна быть от 3 до 200 символов',
            'slug.max' => 'Длина идентификатора должна быть менее 200 символов',
            'excerpt.max' => 'Выдержка должна быть менее 500 символов',
            'content_raw.min' => 'Длина статьи должна быть от 5 до 10000 символов',
            'content_raw.max' => 'Длина статьи должна быть от 5 до 10000 символов',
            'content_raw.required' => 'Статья не может быть пустой',
            'category_id.integer' => 'Неправильная категория',
            'category_id.required' => 'Не указана категория',
            'category_id.exists' => 'Такой категории не существует',
        ];
    }
}

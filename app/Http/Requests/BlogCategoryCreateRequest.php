<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'title'       => 'required|min:5|max:200',
            'slug'        => 'unique:blog_categories,slug|max:200',
            'description' => 'string|min:3|max:500',
            'parent_id'   => 'integer|required|exists:blog_categories,id'
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
            'title.min'          => 'Длина заголовка должна быть от 5 до 200 символов',
            'title.max'          => 'Длина заголовка должна быть от 5 до 200 символов',
            'title.required'     => 'Длина заголовка должна быть от 5 до 200 символов',
            'slug.max'           => 'Длина идентификатора должна быть менее 200 символов',
            'description.min'    => 'Описание должно быть от 3 до 500 символов',
            'description.max'    => 'Описание должно быть от 3 до 500 символов',
            'parent_id.integer'  => 'Указан неправильный родитель',
            'parent_id.required' => 'Родитель не указан',
            'parent_id.exists'   => 'Такого родителя не существует',
        ];
    }
}

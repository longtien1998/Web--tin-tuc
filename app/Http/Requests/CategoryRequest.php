<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'ten' => ['required', 'string'],
            'lang' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'ten.required' => 'Tên danh mục không được để trống',
            'ten.string' => 'Tên danh mục phải là chuỗi',
            'lang.required' => 'Ngôn ngữ không được để trống',
        ];
    }
}

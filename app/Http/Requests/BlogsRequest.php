<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
            // 'tieuDe' => 'string|max:150',
            // 'noiDung' => 'string|min:10',
            // 'uploadImg' => 'image|mimes:jpeg,png,jpg|max:4096',
            // 'moTa' => 'string',
        ];
    }
    public function messages(): array
    {
        return [
            // 'tieuDe.string' => 'Tiêu đề phải là chuỗi',
            // 'tieuDe.max' => 'Tiêu đề không quá 150 ký tự',
            // 'noiDung.string' => 'Nội dung phải là chuỗi',
            // 'noiDung.min' => 'Nội dung phải có ít nhất 10 ký tự',
            // 'uploadImg.image' => 'Hình ảnh phải là ảnh',
            // 'uploadImg.mimes' => 'Hình ảnh phải có định dạng JPEG, PNG, JPG',
            // 'uploadImg.max' => 'Kích thước hình ảnh không quá 4MB',
            // 'moTa.string' => 'Mô tả phải là chuỗi',
        ];
    }
}

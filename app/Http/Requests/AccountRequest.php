<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class AccountRequest extends FormRequest
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
            'name' =>'required|string|max:8',
            'email' =>'required|string|email|max:50|unique:'.User::class,
            'phone' =>'required|max:10|min:10',
        ];
    }
    public function messages(){
        return [
            'name.required' =>'Tên không được để trống',
            'name.string' => 'Tên phải là chuỗi',
            'name.max' => 'Tên không quá 8 ký tự',
            'email.required' => 'Email không được để trống',
            'email.string' => 'Email phải là chuỗi',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại'
        ];
    }
}

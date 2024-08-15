<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'password' => 'required|confirmed',Rules\Password::defaults(),
            'phone' =>'required|max:10|min:10',
        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không quá 8 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là chuỗi.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không quá 50 ký tự.',
            'email.unique' => 'Email đã tồn tại.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.confirmed' => 'Mật khẩu không trùng nhau.',

            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.number' => 'Số điện thoại phải là số.',
            'phone.max' => 'Số điện thoại không quá 10 ký tự.',
            'phone.min' => 'Số điện thoại phải có 10 ký tự.',];
    }
}

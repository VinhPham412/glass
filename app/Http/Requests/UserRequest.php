<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Hàm này để xác định xem user có được phép thực hiện request không
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
            // name phải là chữ và có thẻ có thêm " " , không có số
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email',
            // dùng biểu thức chính quy để mật khẩu có ít nhất 8 ký tự và có chứa ký tự đặt biệt và chữ cái in hoa và thường
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array

    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.regex' => 'Tên không được chứa số',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất 1 chữ cái viết hoa, 1 chữ cái viết thường và 1 ký tự đặc biệt',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmpassword'=>'required|same:password'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập password',
            'confirmpassword.required'=> 'Bạn chưa nhập lại mật khẩu',
            'confirmpassword.same'=> 'Xác thực mật khẩu lỗi',
            
        ];
    }
}

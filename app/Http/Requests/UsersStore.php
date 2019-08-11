<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStore extends FormRequest
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
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/|unique:users',
            'pwd' => 'required|regex:/^[\w]{6,18}$/',
            'repwd' => 'required|same:pwd',
            'email' => 'required|email',
            // 'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
        ];
    }


    public function messages()
    {
        return [
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'upass.required' => '密码必填',
            'upass.regex' => '密码格式错误',
            'repass.required' => '确认密码必填',
            'repass.same' => '俩次密码不一致',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
            // 'phone.required' => '手机号必填',
            // 'phone.regex' => '手机号格式错误',
        ];
    }
}

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
            'f-name'=>'required',
            'l-name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|min:11',
            'password'=>'required|confirmed'
        ];
    }
    public function messages(){
        return [
            'required'=>'این فیلد اجباری است',
            'email.email'=>'لطفا یک ایمیل وارد کنید',
            'mobile.min:11'=>'حداقل 11 رقم',
            'password.confirmed'=>'گذرواژه با تکرار آن مطابقت ندارد',
        ];
    }
}

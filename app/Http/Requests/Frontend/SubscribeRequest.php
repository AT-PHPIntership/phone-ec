<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class SubscribeRequest extends Request
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
            'sub_email' => 'required|email|unique:subscribe,sub_email|unique:users,email|unique:admin,email',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sub_email.required' => 'Please enter your Email',
            'sub_email.email' => 'The email must be a valid email address',
            'sub_email.unique' => 'Subscribe successfully!',
        ];
    }
}

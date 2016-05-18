<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        // idUpdate: this is id of admin user need edit (get in url)
        $idUpdate = Request::segment(3);

        if (empty($idUpdate)) {
        // request for function create
            return [
                'name'     => 'required',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|min:6'
            ];
        } else {
            // request for function update
            return [
                'name'     => 'required',
                'email'    => 'required|email|unique:users,email,' . $idUpdate,
                'password' => 'required|min:6'
            ];
        }
    }
}

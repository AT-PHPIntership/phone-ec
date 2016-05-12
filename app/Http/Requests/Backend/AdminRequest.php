<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class AdminRequest extends Request
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
        // id_update: this is id of admin user need edit (get in url)
        $id_update = Request::segment(3);

        if ( empty($id_update) ) 
        {
            // request for function create
            return [
                'name'     => 'required',
                'email'    => 'required|email|unique:admin,email',
                'password' => 'required|min:6'
            ];
        }
        else
        {
            // request for function update
            return [
                'name'     => 'required',
                'email'    => 'required|email|unique:admin,email,' . $id_update,
                'password' => 'required|min:6'
            ];
        }        
    }
}
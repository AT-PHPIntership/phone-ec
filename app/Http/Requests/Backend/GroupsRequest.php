<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class GroupsRequest extends Request
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
        // insert
        if (!Request::segment(3)) {
            return [
                'name' => 'required|unique:groups,name'
            ];
        }

        // update
        return [
            'name' => 'required|unique:groups,name,' . Request::segment(3)
        ];
    }
}

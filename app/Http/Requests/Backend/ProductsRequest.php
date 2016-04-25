<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class ProductsRequest extends Request
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
            'name' => 'required',
            'brand_id' => 'required',
            'image' => 'required|image|unique:products,image',
            'old_price' => 'required|numeric',
            'current_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|min:50',
            'des_tech' => 'required|min:20',
        ];
    }
}

<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
        if ($this->id) {
            return [
                'cate_name' => 'required|min:3|unique:product_category,cate_name,'.$this->id,
                'cate_image' => 'mimes:jpeg,jpg,png|image',
            ];
        } else {
            return [
                'parent_id' => 'required',
                'cate_name' => 'required|min:3|unique:product_category,cate_name',
                'cate_image' => 'mimes:jpeg,jpg,png|image',
                
            ];
        }
        
    }
    
    /**
     * Get the validation rules that apply to the request
     *
     * @return array
     */
    public function messages()
    {
        return [
            'parent_id.required' => trans('messages.parent_id'),
            'cate_name.required' => trans('messages.cate_name'),
            'cate_name.unique' => trans('messages.cate_name'),
            'cate_image.image' => trans('messages.cate_image'),
        ];
    }
}

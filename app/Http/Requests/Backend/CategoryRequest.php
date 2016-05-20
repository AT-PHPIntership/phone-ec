<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CategoryRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if($this->segment(3)){
            return [
                'cate_name' => 'required|min:3|unique:product_category,cate_name,'.$this->segment(3),
                // 'txtcatename' => 'required|min:3|unique:category,cate_name,'.$this->segment(3), 
                'cate_image' => 'mimes:jpeg,jpg,png|image',
            ];
        }else{
            return [
                'parent_id' => 'required',
                'cate_name' => 'required|min:3|unique:product_category,cate_name',
                'cate_image' => 'mimes:jpeg,jpg,png|image',
                
            ];
        }
        
    }

    public function messages() {
        return [
            'parent_id.required' => 'Please enter choose Category',
            'cate_name.required' => 'Please enter Category Name',
            'cate_name.unique' => 'The Category Name  has already been taken',
            'cate_image.image' => 'This file isn\'t Image',
        ];
    }

}

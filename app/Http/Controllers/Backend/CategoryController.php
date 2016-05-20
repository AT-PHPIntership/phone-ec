<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::paginate(10);
        $parent = Category::select('id', 'cate_name', 'parent_id')->get()->toArray();
        return view('backend.categories.index', compact('cates', 'parent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::select('id', 'cate_name', 'parent_id')->get()->toArray();
        return view('backend.categories.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $addcate = new Category;
        $addcate->cate_name = $request->cate_name;
        $addcate->cate_description = $request->cate_description;
        $addcate->cate_status = $request->cate_status;
        $addcate->parent_id = $request->parent_id;
        if ($request->hasFile('cate_image')) {
            $fileName = $request->file('cate_image')->getClientOriginalName();
            $addcate->cate_image = $fileName;
            $request->file('cate_image')->move(public_path('upload/'), $fileName);
        }
        $addcate->save();
        $request->session()->flash('message', 'Category was add successfully!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Category::findOrFail($id);
        $parent = Category::select('id', 'cate_name', 'parent_id')->get()->toArray();
        return view('backend.categories.edit', compact('cates', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request CategoryRequest
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $editcate = Category::findOrFail($id);
        $editcate->cate_name = $request->cate_name;
        $editcate->cate_description = $request->cate_description;
        $editcate->cate_status = $request->cate_status;
        $editcate->parent_id = $request->parent_id;
        if ($request->hasFile('cate_image')) {
            if ($editcate->cate_image) {
                file::delete(public_path('upload/') . $editcate->cate_image);
            }
            $fileName = $request->file('cate_image')->getClientOriginalName();
            $editcate->cate_image = $fileName;
            $request->file('cate_image')->move(public_path('upload/'), $fileName);
        }
        $editcate->save();
        $request->session()->flash('message', 'Category was update successfully!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcate = Category::findOrFail($id);
        $cate = Category::all();
        $stemp = 0;
        foreach ($cate as $item) {
            if ($item->parent_id == $id) {
                $stemp = 1;
                break;
            }
        }
        if ($stemp == 1) {
            session()->flash('message', 'You can not delete this category!');
        } else {
            if (!empty($delcate->cate_image)) {
                file::delete(public_path('upload/') . $delcate->cate_image);
            }
            $delcate->delete();
            session()->flash('message', 'Category was delete successfully!');
        }
        return redirect()->route('admin.categories.index');
    }
}

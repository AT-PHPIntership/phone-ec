<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use File;

class CategoryController extends Controller
{

    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["cates"] = Category::paginate(config('app.ITEM_PER_PAGE'));
        return view('backend.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data'] = Category::all();
        $data["cates"] = Category::tree();
        return view('backend.categories.create')->with($data);
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
        $addcate = new Category($request->input());
        if ($request->hasFile('cate_image')) {
            $fileName = $request->file('cate_image')->getClientOriginalName();
            $addcate->cate_image = $fileName;
            $request->file('cate_image')->move(public_path(config('app.upload')), $fileName);
        }
        $addcate->save();
        $request->session()->flash('message', trans('messages.category_add'));
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
        $data["data"] = Category::findOrFail($id);
        $data["cates"] = Category::tree();
        return view('backend.categories.edit')->with($data);
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
            $request->file('cate_image')->move(public_path(config('app.upload')), $fileName);
        }
        $editcate->save();
        $request->session()->flash('message', trans('messages.category_update'));
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
        $delcate = Category::with('children')->findOrFail($id);
        if ($delcate->children->count()) {
            session()->flash('message', trans('messages.category_notdel'));
        } else {
            if (!empty($delcate->cate_image)) {
                file::delete(public_path(config('app.upload')) . $delcate->cate_image);
            }
            $delcate->delete();
            session()->flash('message', trans('messages.category_del'));
        }
        return redirect()->route('admin.categories.index');
    }
}

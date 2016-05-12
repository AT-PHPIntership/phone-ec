<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;


use App\Http\Requests\Backend\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;

class AccountsController extends Controller
{
    /**
     * Display a listing of the admin users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$admin_users = Admin::all();

        return view('backend.admin_users.index', compact('admin_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    	return view('backend.admin_users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $admin_user = new Admin;

        $admin_user->name     = trim($request->name);
        $admin_user->email    = trim($request->email);
        $admin_user->password = bcrypt($request->password);
        $admin_user->address  = trim($request->address);
        $admin_user->phone    = $request->phone;
        $admin_user->active   = $request->active;

        $admin_user->save();

        $request->session()->flash('message', 'Admin user was created successfully!');

        return redirect()->route('admin.account.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id request update
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$admin_user = Admin::findOrFail($id);

        return view('backend.admin_users.edit', compact('admin_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id admin users
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $admin_user = Admin::findOrFail($id);

        $admin_user->name     = trim($request->name);
        $admin_user->email    = trim($request->email);
        $admin_user->password = bcrypt($request->password);
        $admin_user->address  = trim($request->address);
        $admin_user->phone    = $request->phone;
        $admin_user->active   = $request->active;

        $admin_user->save();

        $request->session()->flash('message', 'Admin user was edit successfully!');

        return redirect()->route('admin.account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id delete admin users
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Admin::find($id)->delete();

        $request->session()->flash('message', 'Admin user was delete successfully!');

        return redirect()->route('admin.account.index');
    }
}

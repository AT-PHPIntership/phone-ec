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
        $adminUsers = Admin::select('id', 'name', 'email', 'address', 'phone', 'active')->get();

        return view('backend.admin_users.index', compact('adminUsers'));
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
        $adminUser = new Admin;

        $adminUser->name     = trim($request->name);
        $adminUser->email    = trim($request->email);
        $adminUser->password = bcrypt($request->password);
        $adminUser->address  = trim($request->address);
        $adminUser->phone    = $request->phone;
        $adminUser->active   = $request->active;

        $adminUser->save();

        if (!$adminUser) {
            $request->session()->flash('message', 'Wrong count\'t created admin user, please try againt!');
        } else {
            $request->session()->flash('message', 'Admin user was created successfully!');
        }
        

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
        $adminUser = Admin::findOrFail($id);

        return view('backend.admin_users.edit', compact('adminUser'));
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
        $adminUser = Admin::findOrFail($id);

        $adminUser->name     = trim($request->name);
        $adminUser->email    = trim($request->email);
        $adminUser->password = bcrypt($request->password);
        $adminUser->address  = trim($request->address);
        $adminUser->phone    = $request->phone;
        $adminUser->active   = $request->active;

        $adminUser->save();

        if (!$adminUser) {
            $request->session()->flash('message', 'Wrong count\'t edit admin user, please try againt!');
        } else {
            $request->session()->flash('message', 'Admin user was edit successfully!');
        }

        return redirect()->route('admin.account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int                      $id      id user
     * @param \Illuminate\Http\Request $request request for delete
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

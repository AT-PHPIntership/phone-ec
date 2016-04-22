<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Users;
use App\Http\Requests\Backend\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users = Users::all();
            return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request for create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect('admin/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request for update
     * @param int                      $id      id user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
        return redirect('admin/users');
    }
}

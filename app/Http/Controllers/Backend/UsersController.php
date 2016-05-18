<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Backend\User;
Use App\Models\Backend\Order;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users = User::paginate(10);
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
        if (User::create($data)) {
            $request->session()->flash('message', 'User was create successfully!');
        } else {
            $request->session()->flash('message', 'Create failed!');
        }

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
        $user = User::findOrFail($id);
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
        if ($user->update($data)) {
            $request->session()->flash('message', 'User was updated successfully!');
        } else {
            $request->session()->flash('message', 'Update failed!');
        }

        return redirect('admin/users');
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
        $order = Order::where('user_id', $id)->first();

        if ($order === null) {
            $users = User::findOrFail($id);
            $users->delete();

            session()->flash('message-success', 'User was deleted successfully!');
        } else {
            session()->flash('message-warning', 'You can\'t delete this user!');
        }

        return redirect('admin/users');
    }
}

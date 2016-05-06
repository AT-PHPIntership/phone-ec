<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\ProductsRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Backend\Order;
use App\Http\Requests\Backend\OrdersRequest;

class OrdersController extends Controller
{
    use App\Http\Requests;
    use App\Http\Requests\Backend\UserRequest;
    use App\Models\Backend\User;
    use App\Http\Controllers\Controller;
}
// @codingStandardsIgnoreStart
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     /**
     *
     * @return \Illuminate\Http\Response
     */xattr_get(x, name)
    public function index()
    {

        $users = Order::with('users')->paginate(10);

        return view('backend.users.index', compact('users'));

            $users = User::all();
            return view('backend.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
      @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::orderBy('user_name')->get();
        
        return view('backend.users.create', compact('users'));

        return view('backend.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
    @param \Illuminate\Http\Request $request request
     *
     @return \Illuminate\Http\Response
     */
    /**
    * Public function store(UsersRequest $request)
    *
    @param \Illuminate\Http\Request $request request for create
     *
     @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        User::create($data);


        $request->session()->flash('message', 'User was created successfully!');


        return redirect('admin/users');
    }

    /**
     * Show the form for editing the specified resource.

     /**  @param int $id id

     * @param int $id id user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::findOrFail($id);
        $users = user::all();

        return view('backend.users.edit', compact('order', 'users'));

        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     /** @param \Illuminate\Http\Request $request request
     *
     * @param int                      $id      id
     *
     @return \Illuminate\Http\Response
     */
    /**
     * Public function update(UsersRequest $request, $id)
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

        $request->session()->flash('message', 'User was updated successfully!');
        
        return redirect('admin/users');

        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     /** @param int $id id

     * @param int $id id user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Order::findOrFail($id);
        $user->delete();

        return back();

        $users = User::findOrFail($id);
        $users->delete();
        return redirect('admin/users');

    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Frontend\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EditAccountRequest;
use App\Http\Requests\Frontend\ChangePasswordRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.dashboard.account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('frontend.dashboard.editAccount');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request for update
     * @param int                      $id      id user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditAccountRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        
        return redirect('account');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Subscribe;
use App\Http\Requests\Frontend\SubscribeRequest;

class SubscribeController extends Controller
{
    /**
     * Subscribe.
     *
     * @param App\Http\Requests\Frontend\SubscribeRequest; $request SubscribeRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe(SubscribeRequest $request)
    {

        $data = $request->all();

        if (Subscribe::create($data)) {
            $request->session()->flash('message', 'Subscribe successfully!');
        }

        return redirect('/');
    }
}

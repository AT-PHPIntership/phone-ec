<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Rating;
use App\Models\Backend\Product;
use App\Models\Backend\User;

class RatingsController extends Controller
{
    /**
     * List of all rating.
     *
     * @return array
     */
    public function index()
    {
        $ratings = Rating::with('users', 'products')->paginate(10);
        return view('backend.rating.index', compact('ratings'));
    }

    /**
     * Delete a rating.
     *
     * @param integer $id id
     *
     * @return array
     */
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return back();
    }
}

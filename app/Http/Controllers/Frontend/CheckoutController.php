<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;

class CheckoutController extends Controller
{
    /**
    * Display carts
    *
    * @return array
    */
    public function showCart()
    {
        $carts = session()->get('carts');
        return view('frontend.checkout.cart', compact('carts'));
    }

    /**
    * Add a item into carts
    *
    * @param request $request request
    *
    * @return array
    */
    public function cart(Request $request)
    {
        if (!session()->has('carts')) {
            session(['carts'=>array()]);
        }

        $detailsUrl = $request->id;
        $array = explode('-', $detailsUrl);
        $productId = last($array);
        $quantity = $request->quantity;
        $product = Product::with('brands')->findOrFail($productId);
        
        if ($this->checkCart($productId, $quantity, $product) == false) {
            session()->push('carts', ['id' => $product->id,
                                      'image'=> $product->image,
                                      'name' => $product->name,
                                      'brand' => $product->brands->brand_name,
                                      'quantity' => $quantity,
                                      'price' => $product->current_price,
                                      'total' => $quantity*$product->current_price]);
        } else {
            $this->checkCart($productId, $quantity, $product);
        }
        
        return redirect('cart');
    }

    /**
    * Add a item into carts
    *
    * @param integer $productId productId
    * @param integer $quantity  quantity
    * @param array   $product   product
    *
    * @return array
    */
    public function checkCart($productId, $quantity, $product)
    {
        $carts = session()->get('carts');
        for ($i=0; $i < count($carts); $i++) {
            if ($carts[$i]['id'] == $productId) {
                $carts[$i]['quantity'] = $quantity;
                $carts[$i]['total'] = $quantity*$product->current_price;

                return $carts;
            }
        }

        return false;
    }

    /**
    * Delete item in carts
    *
    * @param id $id id
    *
    * @return array
    */
    public function deleteCart($id)
    {
        session()->forget('carts.'.$id);
        return back();
    }
}

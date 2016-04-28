<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;
use App\Http\Requests\Frontend\CartRequest;

class CheckoutController extends Controller
{
    /**
    * Display carts
    *
    * @return array
    */
    public function showCart()
    {
        if (!session()->has('carts')) {
            session(['carts'=>array()]);
        }

        $carts = array_values(session()->get('carts'));
        return view('frontend.checkout.cart', compact('carts'));
    }

    /**
    * Add a item into carts
    *
    * @param request $request request
    *
    * @return array
    */
    public function cart(CartRequest $request)
    {
        if (!session()->has('carts')) {
            session(['carts'=>array()]);
        }

        $detailsUrl = $request->id;
        $array = explode('-', $detailsUrl);

        $productId = last($array);
        $quantity = $request->quantity;
        $product = Product::with('brands')->findOrFail($productId);
        
        if (!$this->checkCart($productId, $quantity, $product)) {
            session()->push('carts', ['id' => $product->id,
                                      'image'=> $product->image,
                                      'name' => $product->name,
                                      'brand' => $product->brands->brand_name,
                                      'quantity' => $quantity,
                                      'price' => $product->current_price,
                                      'total' => $quantity*$product->current_price]);
        } else {
            session(['carts'=>$this->checkCart($productId, $quantity, $product)]);
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
        $carts = array_values(session()->get('carts'));

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
    * Add a item into carts
    *
    * @param request $request request
    *
    * @return array
    */
    public function updateCart(Request $request)
    {
        $carts = session()->get('carts');
        if ($request->ajax())
        {
            $quantity = $request->quantity;

            for ($i=0; $i < count($quantity); $i++) 
            {
                if ($quantity[$i] == 0) {
                    $request->session()->forget($carts[$i]);
                }
                else
                {
                    $carts[$i]['quantity'] = $quantity[$i];
                    $productId = $carts[$i]['id'];
                    $product = Product::with('brands')->findOrFail($productId);
                    $carts[$i]['total'] = $quantity[$i]*$product->current_price;
                }
            }

            session(['carts'=>$carts]);
        }

        return 'OK';
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

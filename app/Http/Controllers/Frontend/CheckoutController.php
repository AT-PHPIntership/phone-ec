<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderDetails;
use App\Http\Requests\Frontend\CartRequest;
use App\Http\Requests\Frontend\CheckoutRequest;
use Illuminate\Support\Facades\Auth;
use Carbon;
use Validator;
use DB;

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
        if ($request->ajax()) {
            $quantity = $request->quantity;

            for ($i=0; $i < count($quantity); $i++) {
                if ($quantity[$i] == 0) {
                    $request->session()->forget($carts[$i]);
                } else {
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

    /**
    * Display checkout page
    *
    * @return array
    */
    public function showCheckout()
    {
        if (!Auth::check()) {
            return redirect('login');
        } elseif (count(session()->get('carts')) <= 0) {
            return redirect('cart');
        }

        if (!session()->has('carts')) {
            session(['carts'=>array()]);
        }

        $carts = session()->get('carts');
        return view('frontend.checkout.index', compact('carts'));
    }

    /**
    * Action checkout
    *
    * @param request $request request
    *
    * @return array
    */
    public function checkout(CheckoutRequest $request)
    {
        $ordersData = $request->except('_token');
        $ordersData['user_id']    = $request->user()->id;
        $ordersData['status']     = 1;
        $ordersData['created_at'] = Carbon\Carbon::now();
        $carts = session()->get('carts');
        $total = 0;
        
        foreach ($carts as $cart) {
            $total += $cart['total'];
        }

        $ordersData['total_price'] = $total;
        $orderId = DB::table('orders')->insertGetId($ordersData);
        $detailsData = array();

        foreach ($carts as $cart) {
            $detailsData['order_id'] = $orderId;
            $detailsData['product_id'] = $cart['id'];
            $detailsData['quantity'] = $cart['quantity'];
            $detailsData['price'] = $cart['total'];

            OrderDetails::create($detailsData);
        }

        session(['success'=>'']);
        session()->flash('order_id', $orderId);

        return redirect('checkout/success');
    }

    /**
    * Display success
    *
    * @return array
    */
    public function success()
    {
        if (!Auth::check()) {
            return redirect('login');
        } elseif (count(session()->get('carts')) <= 0) {
            return redirect('cart');
        }
        
        if (session()->has('success')) {
            session()->flash('message', 'Your orders are booked');
            session()->forget('carts');

            return view('frontend.checkout.success');
        } else {
            return redirect('cart');
        }

    }
}

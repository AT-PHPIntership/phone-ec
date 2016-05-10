@extends('frontend.layouts.master')

@section('title', 'Categorys')

@section('sidebar')
	<!-- parent -->
    <!-- sidebar content -->
    @section('categorys-list')
      <!-- parent -->
    @stop
    @section('account-links')
      <!-- parent -->
    @stop
    @section('best-sellers-products')
      <!-- parent -->
    @stop
    @section('latest-products')
      <!-- parent -->
    @stop
    @section('banner')
      <!-- parent -->
    @stop
    <!-- sidebar content end -->
@endsection

@section('slider')
	<!-- parent -->
@endsection

@section('breadcrumb')
	<div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Shopping Cart</a></div>
@endsection

@section('content')
    <div id="content">
        <h1>Checkout Details</h1>
        <form action="{{ url('checkout') }}" method="post">
            {{ csrf_field() }}
            @include('common.errors')
            <div class="checkout">
              <div class="checkout-heading">Step 1: Shipping Details</div>
              <div class="checkout-content">
                  <div class="checkout-content" style="display: block;">
                    <table class="form">
                      <tbody>
                        <tr>
                          <td><span class="required">*</span> Name:</td>
                          <td>
                            <input type="text" class="large-field" value="{{ Auth::user()->name }}" name="user_name">
                          </td>
                        </tr>
                        <tr>
                          <td><span class="required">*</span> Ship address:</td>
                          <td>
                            <input type="text" class="large-field" value="{{ Auth::user()->address }}" name="user_address">
                          </td>
                        </tr>
                        <tr>
                          <td><span class="required">*</span> Phone:</td>
                          <td>
                            <input type="text" class="large-field" value="{{ Auth::user()->phone }}" name="user_phone">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div class="checkout">
              <div class="checkout-heading">Step 2: Payment Method</div>
              <div class="checkout-content">
                <p>Please select the preferred payment method to use on this order.</p>
                <table class="radio">
                  <tbody>
                    <tr class="highlight">
                      <td><label><input type="radio" checked="checked" id="" value="1" name="payment_method">Cash On Delivery</label></td>
                    </tr>
                    <tr class="highlight">
                      <td><label><input type="radio" disabled="disabled" value="0" name="payment_method">PayPal</label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="checkout">
              <div class="checkout-heading">Step 3: Confirm Order</div>
              <div class="checkout-content">
                <div class="checkout-product">
                  <table>
                    <thead>
                      <tr>
                        <td class="image">Image</td>
                        <td class="name">Product Name</td>
                        <td class="model">Model</td>
                        <td class="quantity">Quantity</td>
                        <td class="price">Price</td>
                        <td class="total">Total</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $total = 0 ?>
                        @for ($i = 0; $i < count($carts); $i++)
                            <tr>
                                <td class="image"><a href="{{ url(str_slug($carts[$i]['name']).'-'.$carts[$i]['id']) }}"><img src="{{ asset('assets/frontend/upload/'.$carts[$i]['image']) }}" alt="{{ $carts[$i]['name'] }}" /></a></td>
                                <td class="name"><a href="product.html">{{ $carts[$i]['name'] }}</a></td>
                                <td class="model">{{ $carts[$i]['brand'] }}</td>
                                <td class="quantity">
                                    <span>{{ $carts[$i]['quantity'] }}</span>
                                </td>
                                <td class="price" id="price-{{ $i }}">{{ number_format($carts[$i]['price']) }} VND</td>
                                <td class="total">{{ $carts[$i]['total'] }} VND</td>
                            </tr>
                            <?php $total += $carts[$i]['total'] ?>
                        @endfor
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td class="price" colspan="5"><b>Total:</b></td>
                        <td class="total"><?= $total ?></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="buttons">
                  <div class="right">
                    <input type="submit" class="button" id="button-confirm" value="Confirm Order">
                  </div>
                </div>
              </div>
            </div>
        </form>

      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
@endsection

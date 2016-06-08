@extends('frontend.layouts.master')

@section('title', trans('labels.LabelCategory'))

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
	<div class="breadcrumb"> <a href="index-2.html">{{ trans('labels.LabelHome') }}</a> » <a href="#">{{ trans('labels.LabelShopCart') }}</a></div>
@endsection

@section('content')
    <div id="content">
        <h1>{{ trans('labels.LabelCheckout') }}</h1>
        <form action="{{ url('checkout') }}" method="post">
            {{ csrf_field() }}
            @include('common.errors')
            <div class="checkout">
              <div class="checkout-heading">{{ trans('labels.Labelshipping') }}</div>
              <div class="checkout-content">
                  <div class="checkout-content" style="display: block;">
                    <table class="form">
                      <tbody>
                        <tr>
                          <td><span class="required">{{ trans('labels.Labelstar') }}</span> {{ trans('labels.LabelName') }}</td>
                          <td>
                            <input type="text" class="large-field" value="{{ Auth::user()->name }}" name="user_name">
                          </td>
                        </tr>
                        <tr>
                          <td><span class="required">{{ trans('labels.Labelstar') }}</span> {{ trans('labels.LabelShipAddress') }}</td>
                          <td>
                            <input type="text" class="large-field" value="{{ Auth::user()->address }}" name="user_address">
                          </td>
                        </tr>
                        <tr>
                          <td><span class="required">{{ trans('labels.Labelstar') }}</span> {{ trans('labels.LabelPhone') }}</td>
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
              <div class="checkout-heading">{{ trans('labels.LabelPayment') }}</div>
              <div class="checkout-content">
                <p>{{ trans('labels.MessagePaymentMethod') }}</p>
                <table class="radio">
                  <tbody>
                    <tr class="highlight">
                      <td><label><input type="radio" checked="checked" id="" value="1">{{ trans('labels.LabelCash') }}</label></td>
                    </tr>
                    <tr class="highlight">
                      <td><label><input type="radio" disabled="disabled" value="0">{{ trans('labels.LabelPayPal') }}</label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="checkout">
              <div class="checkout-heading">{{ trans('labels.LabelConfirmOrder') }}</div>
              <div class="checkout-content">
                <div class="checkout-product">
                  <table>
                    <thead>
                      <tr>
                        <td class="image">{{ trans('labels.LabelImage') }}</td>
                        <td class="name">{{ trans('labels.LabelProductName') }}</td>
                        <td class="model">{{ trans('labels.LabelModel') }}</td>
                        <td class="quantity">{{ trans('labels.LabelQuantity') }}</td>
                        <td class="price">{{ trans('labels.LabelPrice') }}</td>
                        <td class="total">{{ trans('labels.LabelTotal') }}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $total = 0 ?>
                        @foreach ($carts as $key => $cart)
                            <tr>
                                <td class="image"><a href="{{ url(str_slug($cart['name']).'-'.$cart['id']) }}"><img src="{{ asset('upload/'.$cart['image']) }}" alt="{{ $cart['name'] }}" /></a></td>
                                <td class="name"><a href="{{ url(str_slug($cart['name']).'-'.$cart['id']) }}">{{ $cart['name'] }}</a></td>
                                <td class="model">{{ $cart['brand'] }}</td>
                                <td class="quantity">
                                    <span>{{ $cart['quantity'] }}</span>
                                </td>
                                <td class="price" id="price-{{ $key }}">{{ number_format($cart['price']) }} {{ trans('labels.LabelVND') }}</td>
                                <td class="total">{{ number_format($cart['total']) }} {{ trans('labels.LabelVND') }}</td>
                            </tr>
                            <?php $total += $cart['total'] ?>
                        @endforeach
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td class="price" colspan="5"><b>{{ trans('labels.LabelTotalAll') }}</b></td>
                        <td class="total">{{ number_format($total) }} {{ trans('labels.LabelVND') }}</td>
                        <input type="hidden" name="total_price" value="{{ $total }}">
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="buttons">
                  <div class="right">
                    <input type="submit" class="button" id="button-confirm" value="{{ trans('labels.ButtonConfirmOrder') }}">
                  </div>
                </div>
              </div>
            </div>
        </form>

      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
@endsection

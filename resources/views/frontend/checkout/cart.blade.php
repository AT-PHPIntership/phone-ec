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
        <h1>Shopping Cart</h1>
        @if (Session::has('carts') && count(session()->get('carts')) > 0)
                <div class="cart-info">
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
                            <?php $total = 0 ?>
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <td class="image"><a href="{{ url(str_slug($cart['name']).'-'.$cart['id']) }}"><img src="{{ asset('assets/frontend/upload/'.$cart['image']) }}" alt="{{ $cart['name'] }}" /></a></td>
                                    <td class="name"><a href="{{ url(str_slug($cart['name']).'-'.$cart['id']) }}">{{ $cart['name'] }}</a></td>
                                    <td class="model">{{ $cart['brand'] }}</td>
                                    <td class="quantity">
                                        <input type="text" size="1" value="{{ $cart['quantity'] }}" id="quantity-{{ $key }}" name="quantity" class="w30 quantity">&nbsp;&nbsp;
                                        <form action="{{ url('cart/'.$key) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" id="delete-cart-{{ $key }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td class="price" id="price-{{ $key }}">{{ number_format($cart['price']) }} VND</td>
                                    <td class="total">{{ number_format($cart['total']) }} VND</td>
                                </tr>
                                <?php $total += $cart['total'] ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="cart-total">
                <table id="total">
                    <tbody>
                        <tr>
                            <td class="right"><b>Total:</b></td>
                            <td class="right">{{ number_format($total) }} VND</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="buttons">
                <div class="right"><a class="button" href="{{ url('checkout') }}">Checkout</a></div>
                <div class="right" style="margin-right: 15px">
                    <button class="button" id="btnUpdate">Update Cart</button>
                    <input type="hidden" value="{{ count($carts) }}" id="countCart">
                </div>
            </div>
        @else
            <div class="alert alert-danger center" style="text-align: center;font-size: 15px">There are no products in your cart.</div>
        @endif
    </div>
    <script>
        $(document).ready(function(){
            $("#btnUpdate").click(function(){
                var quantity = [];

                for (var i = 0; i < $("#countCart").val(); i++) {
                    quantity.push($("#quantity-"+i).val());
                }
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    asynce: false,
                    dataType: 'text',
                    url: 'cart/update',
                    data: {quantity:quantity},
                    success: function(data)
                    {
                        if (data == 'OK') {
                            window.location.href = 'cart';
                        }
                    }
                });
            });
        });
    </script>
@endsection

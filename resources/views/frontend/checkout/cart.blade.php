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
                            @for ($i = 0; $i < count($carts); $i++)
                                <tr>
                                    <td class="image"><a href="{{ url(str_slug($carts[$i]['name']).'-'.$carts[$i]['id']) }}"><img src="{{ asset('assets/frontend/upload/'.$carts[$i]['image']) }}" alt="{{ $carts[$i]['name'] }}" /></a></td>
                                    <td class="name"><a href="product.html">{{ $carts[$i]['name'] }}</a></td>
                                    <td class="model">{{ $carts[$i]['brand'] }}</td>
                                    <td class="quantity">
                                        <input type="text" size="1" value="{{ $carts[$i]['quantity'] }}" name="" class="w30">&nbsp;&nbsp;
                                        <form action="{{ url('cart/'.$i) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button type="submit" id="delete-cart-{{ $i }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td class="price">{{ $carts[$i]['price'] }}</td>
                                    <td class="total">{{ $carts[$i]['total'] }}</td>
                                </tr>
                                <?php $total += $carts[$i]['total'] ?>
                            @endfor
                        </tbody>
                    </table>
                </div>
            <div class="cart-total">
                <table id="total">
                    <tbody>
                        <tr>
                            <td class="right"><b>Total:</b></td>
                            <td class="right">{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="buttons">
                <div class="right"><a class="button" href="checkout.html">Checkout</a></div>
                <div class="right" style="margin-right: 15px">
                    <button class="button" id="btnUpdate">Update Cart</button>
                </div>
            </div>
        @else
            <div class="alert alert-danger center" style="text-align: center;font-size: 15px">There are no products in your cart.</div>
        @endif
    </div>
    <script>
        $(document).ready(function(){
            $("#btnUpdate").click(function(){
                var id = $('.price').text();
                console.log(id);
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    asynce: false,
                    dataType: 'text',
                    url: 'cart/update',
                    data: {id:id},
                    success: function(data)
                    {
                    }
                });
            });
        });
    </script>
@endsection

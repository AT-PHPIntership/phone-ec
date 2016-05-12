@extends('frontend.layouts.master')

@section('title', 'Order History')

@section('sidebar')
	@parent
    <!-- sidebar content -->
    @section('categorys-list')
      <!-- parent -->
    @stop
    @section('account-links')
      @parent
    @stop
    @section('best-sellers-products')
      <!-- parent -->
    @stop
    @section('latest-products')
      @parent
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
	@parent
@endsection

@section('content')
<h1>Order History</h1>
<h2>Order id: OH-00{{ $orderId }} </h2>
<div class="bottom-padding">
    <!-- Table  -->
    <table class="form">
        <thead>
            <tr class="first last">
                <th>Products id</th>
                <th>Name</th>
                <th align="center">Image</th>
                <th align="center">Quantity</th>
                <th align="center">Price</th>
                <th align="center">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
            <tr>
                <td> PI-00{{ $detail->product_id }}</td>
                <td>{{ $detail->products->name }}</td>
                <td align="center"><img src="{{ asset('upload/'.$detail->products->image) }}" alt="{{ $detail->products->name }}" width="80" height="80"></td>
                <td align="center">{{ $detail->quantity }}</td>
                <td align="center"><span class="price">{{ $detail->products->current_price }}</span></td>
                <td align="center">>{{ $detail->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- /Table  -->
</div>
@endsection
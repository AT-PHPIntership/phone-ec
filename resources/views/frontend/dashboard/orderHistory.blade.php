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
<h2>Recent Orders</h2>
<div class="bottom-padding">
    <!-- Table  -->
    <table class="form">
        <thead>
            <tr class="first last">
                <th>Order id</th>
                <th>Date</th>
                <th>Name</th>
                <th align="center">Phone</th>
                <th align="center">Order Total</th>
                <th align="center">Status</th>
                <th align="center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td class="text-center"> OH-00{{ $order->id }}</td>
                <td class="text-center">{{ $order->created_at }}</td>
                <td class="text-center">{{ $order->user_name }}</td>
                <td align="center" class="text-center">{{ $order->user_phone }}</td>
                <td align="center" class="text-center"><span class="price">{{ $order->total_price }}</span></td>
                <td align="center" class="text-primary text-center">
                    <em>
                    @if ($order->status == 1)
                        Comfirmed
                    @elseif ($order->status == 2)
                        Shipped
                    @elseif ($order->status == 3)
                        Cancel
                    @endif
                    </em>
                </td>
                <td align="center" class="text-center last">
                  <a href="{{ url('order/'.$order->id) }}" class="button">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- /Table  -->
    <!--Pagination Part Start-->
    <div class="pagination">
      <div class="links">{!! $orders->links() !!}</div>
    </div>
    <!--Pagination Part End-->
</div>
@endsection
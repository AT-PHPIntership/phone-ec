@extends('frontend.layouts.master')

@section('title', 'Categorys')

@section('sidebar')
	@parent
    <!-- sidebar content -->
    @section('categorys-list')
      @parent
    @stop
    @section('account-links')
      <!-- parent -->
    @stop
    @section('best-sellers-products')
      <!-- parent -->
    @stop
    @section('latest-products')
      @parent
    @stop
    @section('banner')
      @parent
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
<h1>Electronics</h1>
        <!--Product Grid Start-->
        <div class="product-grid">
          @foreach( $listProducts as $list )
            <div>
              <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/apple_cinema_30-162x162.jpg') !!}" title="{{ $list->name }}" alt="{{ $list->name }}" /></a></div>
              <div class="name"><a href="product.html">{{ $list->name }}</a></div>
              <div class="description">{{ $list->description }}</div>
              <div class="price"> <span class="price-old">{{ $list->old_price }}</span> <span class="price-new">{{ $list->current_price }}</span> <br /></div>
              <div class="cart">
                <input type="button" value="Add to Cart" class="button" />
              </div>
              <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
            </div>
          @endforeach
        </div>
        <!--Product Grid End-->
        <!--Pagination Part Start-->

        <div class="pagination">
          <div class="links">{!! $listProducts->links() !!}</div>
        </div>
        <!--Pagination Part End-->
@endsection
@extends('frontend.layouts.master')

@section('title', 'Categorys')

@section('sidebar')
	@parent
    <!-- sidebar content -->
    @section('categorys-list')
      <!-- parent -->
    @stop
    @section('account-links')
      <!-- parent -->
    @stop
    @section('best-sellers-products')
      @parent
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
    <h1>{{ $product->name }}</h1>
    <div class="product-info">
        <div class="left">
            <div class="image"><a href="{!! asset('upload/'. $product->image) !!}" title="{{ $product->name }}" class="cloud-zoom colorbox" id='zoom1' rel="adjustX: 0, adjustY:0, tint:'#000000',tintOpacity:0.2, zoomWidth:360, position:'inside', showTitle:false"><img src="{!! asset('upload/'. $product->image) !!}" title="Canon EOS 5D" alt="{{ $product->name }}" id="image" /><span id="zoom-image"><i class="zoom_bttn"></i> Zoom</span></a></div>
        </div>
        <div class="right">
            <div class="description"> 
                <span>Brand:</span> <a href="#">{{ $product->brands->brand_name }}</a><br />
                <span>Availability:</span>
                @if ($product->quantity)
                    In stock
                @else
                    Not in stock
                @endif
            </div>
            <div class="price">
                Price: <span class="price-old">{{ number_format($product->old_price) }} VND</span> <span class="price-new">{{ number_format($product->current_price) }} VND</span> <br />
            </div>
            <div class="cart">
                <div>
                    <div class="qty"> <strong>Qty:</strong> <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <input id="qty" type="text" class="w30" name="quantity" size="2" value="1" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a>
                        <input type="hidden" name="product_id" size="2" value="30" />
                        <div class="clear"></div>
                    </div>
                    <input type="button" value="Add to Cart" id="button-cart" class="button" />
                </div>
            </div>
            <div class="review">
                <div>
                    <img src="{!! asset('assets/frontend/image/stars-'.round($scoreAverage).'.png') !!}" alt="2 reviews" />&nbsp;&nbsp;
                    <a onClick="$('a[href=\'#tab-review\']').trigger('click');">{{ $countRatings }} reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a onClick="$('a[href=\'#tab-review\']').trigger('click');">Write a review</a>
                </div>
            </div>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-506f325f57fbfc95"></script>
                <!-- AddThis Button END -->
        </div>
    </div>
    @if (Session::has('rating'))
        <div class="alert alert-success">{{ Session::get('rating') }}</div>
    @endif
    @include('common.errors')
    <!-- Description and Reviews Tab Start -->
    <div id="tabs" class="htabs"> 
        <a href="#tab-description">Description</a> 
        <a href="#tab-proInfo">Product Infomation</a> 
        @if (count($ratings) > 0)
            <a href="#customer-review">Customer Reviews ({{ $countRatings }})</a>
        @endif
        <a href="#tab-review">Review</a>
    </div>
    <div id="tab-description" class="tab-content">
        <p>{{ $product->description }}</p>
    </div>
    <div id="tab-proInfo" class="tab-content">
        <p>{{ $product->des_tech }}</p>
    </div>
    <div id="customer-review" class="tab-content">
        @foreach ($ratings as $rating)
            <b>{{ $rating->users->name }}</b>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span>
                <img src="{{ asset('assets/frontend/image/stars-'.$rating->score.'.png') }}" alt="">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{ $rating->created_at }}
            </span>
            <p>{{ $rating->comment }}</p>
        @endforeach

        {!! $ratings->links() !!}
    </div>
    <div id="tab-review" class="tab-content">
        @if (Auth::check())
            <div id="review"></div>
            <form action="{{ url('products/rating') }}" method="post" id="RatingForm">
                {{ csrf_field() }}
                <b>Your Review:</b>
                <textarea name="comment" cols="40" rows="8" style="width: 98%;"></textarea>
                <br /><br />
                <b>Rating:</b> <span>Bad</span>&nbsp;
                <input type="radio" name="score" value="1" title="1" />&nbsp;
                <input type="radio" name="score" value="2" title="2" />&nbsp;
                <input type="radio" name="score" value="3" title="3" checked="checked" />&nbsp;
                <input type="radio" name="score" value="4" title="4" />&nbsp;
                <input type="radio" name="score" value="5" title="5" />&nbsp;
                <span>Good</span><br />
                <br />
                <div class="buttons">
                    <div class="right"><input type="submit" value="Continue" class="button"></div>
                </div>
                <input type="hidden" name="product_id" value="{{ url()->current() }}">
            </form>
        @else
            You must be login to review this product.<br>
            <a href="{{ url('login') }}"><strong>Click here to login<strong></a>
        @endif
    </div>
    <script>
        $(document).ready(function(){
            $('#tabs a').tabs();
        });
    </script>
    <!-- Description and Reviews Tab Start -->
    <!--Related Product Start-->
    <script type="text/javascript">
        (function() {
            // store the slider in a local variable
            var $window = $(window),
            flexslider;
            // tiny helper function to add breakpoints
            function getGridSize() {
                return (window.innerWidth < 320) ? 1 :
                (window.innerWidth < 600) ? 2 :
                (window.innerWidth < 800) ? 3 :
                (window.innerWidth < 900) ? 3 : 4;
            }
            $window.load(function() {
                $('#content #related_pro').flexslider({
                    animation: "slide",
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 210,
                    minItems: getGridSize(), // use function to pull in initial value
                    maxItems: getGridSize() // use function to pull in initial value
                });
            });
        }());
    </script>
    <!--Related Product End-->
@endsection

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
                <div><img src="{!! asset('assets/frontend/image/stars-3.png') !!}" alt="2 reviews" />&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">0 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">Write a review</a></div>
            </div>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-506f325f57fbfc95"></script>
                <!-- AddThis Button END -->
        </div>
    </div>
    <!-- Description and Reviews Tab Start -->
    <div id="tabs" class="htabs"> <a href="#tab-description">Description</a> <a href="#tab-review">Reviews (0)</a> </div>
    <div id="tab-description" class="tab-content">
        <p>{{ $product->description }}</p>
    </div>
    <div id="tab-review" class="tab-content">
        <div id="review"></div>
        <h2 id="review-title">Write a review</h2>
        <br />
        <b>Your Name:</b><br />
        <input type="text" name="name" value="" />
        <br />
        <br />
        <b>Your Review:</b>
        <textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
        <span style="font-size: 11px;"><span style="color: #FF0000;">Note:</span> HTML is not translated!</span><br />
        <br />
        <b>Rating:</b> <span>Bad</span>&nbsp;
        <input type="radio" name="rating" value="1" />
        &nbsp;
        <input type="radio" name="rating" value="2" />
        &nbsp;
        <input type="radio" name="rating" value="3" />
        &nbsp;
        <input type="radio" name="rating" value="4" />
        &nbsp;
        <input type="radio" name="rating" value="5" />
        &nbsp;<span>Good</span><br />
        <br />
        <b>Enter the code in the box below:</b><br />
        <input type="text" name="captcha" value="" />
        <br />
        <br />
        <img src="indexffc1.html?route=product/product/captcha" alt="" id="captcha" /><br />
        <br />
        <div class="buttons">
            <div class="right"><a id="button-review" class="button">Continue</a></div>
        </div>
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

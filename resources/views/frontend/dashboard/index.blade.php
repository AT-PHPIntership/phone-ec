@extends('frontend.layouts.master')

@section('title', 'Home')

@section('sidebar')
  <!-- parent -->
@endsection

@section('slider')
	@parent
@endsection

@section('breadcrumb')
	<!-- parent -->
@endsection

@section('content')
	<!-- Welcom Text Start-->
        <div class="welcome">Welcome to Polishop</div>
        <p><strong>Polishop</strong> Premium Responsive HTML Template. Polishop is a clean and Fully Responsive to use the template for every kind of eCommerce online shop. Great Looks on Desktops, Tablets and Mobiles. Well Documented. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <a href="#">BUY THEME</a>.</p>
        <!-- Welcom Text End-->
        <!-- Featured Product Start-->
        <section class="box">
          <div class="box-heading">Featured</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider featured_carousel">
                <ul class="slides">
                  @foreach($listFeaturedProducts as $listFeatured)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="{{ url(str_slug($listFeatured->name).'-'.$listFeatured->id) }}"><img src="{!! asset('assets/frontend/image/product/lotto-sports-shoes-white-210x210.jpg') !!}" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="{{ url(str_slug($listFeatured->name).'-'.$listFeatured->id) }}">{{ $listFeatured->name }}</a></div>
                      <div class="price"> {{ $listFeatured->current_price }} VNĐ</div>
                      <div class="cart">
                        <form action="{{ url('cart') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="quantity" value="1" />
                          <input type="hidden" name="id" value="{{ url(str_slug($listFeatured->name).'-'.$listFeatured->id) }}" />
                          <input type="submit" value="Add to Cart" id="button-cart" class="button" />
                        </form>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </section>
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
                   (window.innerWidth < 900) ? 4 : 5;
          }
          $window.load(function() {
            $('#content .featured_carousel').flexslider({
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
        <!-- Featured Product End-->
        <!-- Product Tab Start-->
        <section id="product-tab" class="product-tab">
          <ul id="tabs" class="tabs">
            <li><a href="#tab-latest">Latest</a></li>
            <li><a href="#tab-bestseller">Bestseller</a></li>
          </ul>
          <div id="tab-latest" class="tab_content">
            <div class="box-product">
              <div class="flexslider latest_carousel_tab">
                <ul class="slides">
                  @foreach($listLatestProducts as $listLatest)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="{{ url(str_slug($listLatest->name).'-'.$listLatest->id) }}"><img src="{!! asset('assets/frontend/image/product/samsung_syncmaster_941bw-210x210.jpg') !!}" alt="Samsung SyncMaster 941BW" /></a></div>
                      <div class="name"><a href="{{ url(str_slug($listLatest->name).'-'.$listLatest->id) }}">{{ $listLatest->name }}</a></div>
                      <div class="price">{{ $listLatest->current_price }} VNĐ</div>
                      <div class="cart">
                        <form action="{{ url('cart') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="quantity" value="1" />
                          <input type="hidden" name="id" value="{{ url(str_slug($listLatest->name).'-'.$listLatest->id) }}" />
                          <input type="submit" value="Add to Cart" id="button-cart" class="button" />
                        </form>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div id="tab-bestseller" class="tab_content">
            <div class="box-product">
              <div class="flexslider bestseller_carousel_tab">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/apple_cinema_30-210x210.jpg') !!}" alt="Apple Cinema 30&quot;" /></a></div>
                      <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
                      <div class="price"> <span class="price-old">$119.50</span><span class="price-new">$107.75</span> </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/sony_vaio_1-210x210.jpg') !!}" alt="Friendly Jewelry" /></a></div>
                      <div class="name"><a href="product.html">Friendly Jewelry</a></div>
                      <div class="price"> $1,177.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/Jeep-Casual-Shoes-210x210.jpg') !!}" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price"> $131.25 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/lotto-sports-shoes-white-210x210.jpg') !!}" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">Lotto Sports Shoes</a></div>
                      <div class="price"> $589.50 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_touch_1-210x210.jpg') !!}" alt="Sunglass" /></a></div>
                      <div class="name"><a href="product.html">Sunglass</a></div>
                      <div class="price"> $1,177.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <script>
        $(document).ready(function(){
          $('#tabs a').tabs();
            $("#button-cart").click(function(){
                console.log($("#qty").val());
            });
          });
        </script>
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
                   (window.innerWidth < 900) ? 4 : 5;
          }
          $window.load(function() {
            $('#product-tab .featured_carousel_tab, #product-tab .latest_carousel_tab, #product-tab .bestseller_carousel_tab, #product-tab .special_carousel_tab').flexslider({
              animation: "slide",
              animationLoop: false,
              slideshow: false,
              itemWidth: 210,
              minItems: getGridSize(), // use function to pull in initial value
              maxItems: getGridSize(), // use function to pull in initial value
              start: function(){
                  $("#product-tab .tab_content").addClass("deactive");
                  $("#product-tab .tab_content:first").removeClass("deactive"); //Show first tab content
                  } });
          });

        $(document).ready(function() {
            //Default Action
            $("ul#tabs li:first").addClass("active").show(); //Activate first tab
            //On Click Event
            $("ul#tabs li").click(function() {
                $("ul#tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $("#product-tab .tab_content").hide(); 
                var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active content
                return false;
            });
        });}());
        </script>
        <!-- Product Tab End-->
        <!-- Carousel Start-->
        <section id="carousel">
          <ul class="jcarousel-skin-opencart">
            <li><a href="#"><img src="{!! asset('assets/frontend/image/product/brand_logo.jpg') !!}" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="{!! asset('assets/frontend/image/product/brand_logo.jpg') !!}" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="{!! asset('assets/frontend/image/product/brand_logo.jpg') !!}" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="{!! asset('assets/frontend/image/product/brand_logo.jpg') !!}" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="{!! asset('assets/frontend/image/product/brand_logo.jpg') !!}" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="{!! asset('assets/frontend/image/product/brand_logo.jpg') !!}" alt="brand_logo" title="brand_logo" /></a></li>
          </ul>
        </section>
        <!-- Carousel End-->
@endsection
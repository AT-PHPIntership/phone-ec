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
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/iphone_1-210x210.jpg') !!}" alt="iPhone 4s" /></a></div>
                      <div class="name"><a href="product.html">iPhone 4s</a></div>
                      <div class="price"> $120.68 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
                      <div class="clear"></div>
                    </div>
                  </li>
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
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/htc_touch_hd_1-210x210.jpg') !!}" alt="iPhone 5s" /></a></div>
                      <div class="name"><a href="product.html">iPhone 5s</a></div>
                      <div class="price"> $119.50 </div>
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
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/reebok-men-sports-shoes-210x210.jpg') !!}" alt="Reebok Men Sports Shoes" /></a></div>
                      <div class="name"><a href="product.html">Reebok Men Sports Shoes</a></div>
                      <div class="price"> $119.50 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/samsung_tab_1-210x210.jpg') !!}" alt="Eagle Print Top" /></a></div>
                      <div class="name"><a href="product.html">Eagle Print Top</a></div>
                      <div class="price"> $236.99 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/nikon_d300_1-210x210.jpg') !!}" alt="Nikon D300" /></a></div>
                      <div class="name"><a href="product.html">Nikon D300</a></div>
                      <div class="price"> $942.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/samsung_syncmaster_941bw-210x210.jpg') !!}" alt="Samsung SyncMaster 941BW" /></a></div>
                      <div class="name"><a href="product.html">Samsung SyncMaster 941BW</a></div>
                      <div class="price"> $237.00 </div>
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
                      <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/samsung_syncmaster_941bw-210x210.jpg') !!}" alt="Samsung SyncMaster 941BW" /></a></div>
                      <div class="name"><a href="product.html">{{ $listLatest->name }}</a></div>
                      <div class="price"> $237.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
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
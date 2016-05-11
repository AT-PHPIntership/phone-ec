@section('sidebar')
<div id="column-left">
  <!--Category List -->
  @section('categorys-list')
    @if (count($productCategory) > 0)
      <div class="box">
        <div class="box-heading">Categories</div>
        <div class="box-content box-category">
          <ul id="cat_accordion">
            @foreach ($productCategory as $Category)
            <li class="custom_id20"><a class="active" href="{!! url('category/'. $Category->id) !!}">{{ $Category->brand_name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <script type="text/javascript" src="{!! asset('assets/frontend/js/jquery.dcjqaccordion.js') !!}"></script>
    @endif
  @show
  <!--Category List End -->
  <!-- Account Links -->
  @section('account-links')
  <div class="box">
    <div class="box-heading">Account</div>
    <div class="box-content">
      @if (Auth::guest()) 
      <ul class="list-item">
        <li><a href="{{ url('login') }}">Login</a></li>
        <li><a href="{{ url('register') }}">Register</a></li>
        <li><a href="#">Forgotten Password</a></li>
      </ul>
      @else
      <ul class="list-item">
        <li><a href="{{ url('account') }}">My Account</a></li>
        <li><a href="{{ url('account') }}">Order History</a></li>
        <li><a href="{{ url('account') }}">Change Password</a></li>
        <li><a href="{{ url('logout') }}">Log out</a></li>
      </ul>
      @endif
    </div>
  </div>
  @show
  <!-- Account Links End -->
  <!--Bestsellers Part Start-->
  @section('best-sellers-products')
  <div class="box">
    <div class="box-heading">Bestsellers</div>
    <div class="box-content">
      <div class="box-product">
        <div class="flexslider">
          <ul class="slides">
            <li>
              <div class="slide-inner">
                <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/sony_vaio_1-45x45.jpg') !!}" alt="Friendly Jewelry" /></a></div>
                <div class="name"><a href="product.html">Friendly Jewelry</a></div>
                <div class="price">$1,177.00</div>
                <div class="clear"></div>
              </div>
            </li>
            <li>
              <div class="slide-inner">
                <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/apple_cinema_30-45x45.jpg') !!}" alt="Apple Cinema 30&quot;" /></a></div>
                <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
                <div class="price"><span class="price-old">$119.50</span> <span class="price-new">$107.75</span></div>
                <div class="clear"></div>
              </div>
            </li>
            <li>
              <div class="slide-inner">
                <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_classic_1-45x45.jpg') !!}" alt="iPad Classic" /></a></div>
                <div class="name"><a href="product.html">iPad Classic</a></div>
                <div class="price">$119.50</div>
                <div class="clear"></div>
              </div>
            </li>
            <li>
              <div class="slide-inner">
                <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/lotto-sports-shoes-white-45x45.jpg') !!}" alt="Lotto Sports Shoes" /></a></div>
                <div class="name"><a href="product.html">Lotto Sports Shoes</a></div>
                <div class="price">$589.50</div>
                <div class="clear"></div>
              </div>
            </li>
            <li>
              <div class="slide-inner">
                <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/Jeep-Casual-Shoes-45x45.jpg') !!}" alt="Jeep-Casual-Shoes" /></a></div>
                <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                <div class="price">$131.25</div>
                <div class="clear"></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @show
  <!--Bestsellers Part End-->
  <!--Latest Product Start-->
  @section('latest-products')
    @if (count($productLatest) > 0)
      <div class="box">
        <div class="box-heading">Latest</div>
        <div class="box-content">
          <div class="box-product">
            <div class="flexslider">
              <ul class="slides">
                @foreach ($productLatest as $latest)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="{{ url(str_slug($latest->name).'-'.$latest->id) }}"><img src="{!! asset('upload/'.$latest->image) !!}" alt="{{ $latest->name }}" /></a></div>
                      <div class="name"><a href="{{ url(str_slug($latest->name).'-'.$latest->id) }}">{{ $latest->name }}</a></div>
                      <div class="price">{{ number_format($latest->current_price) }}</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    @endif
  @show
  <!--Latest Product End-->
  <!--Banner Start-->
  @section('banner')
  <div class="banner">
    <div><a href="#"><img src="{!! asset('assets/frontend/image/product/small-banner1-220x350.jpg') !!}" alt="banner" title="banner" /></a></div>
  </div>
  @show
  <!--Banner End-->
</div>
@show
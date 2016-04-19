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
        <div class="product-filter">
          <!-- <div class="display"><b>Display:</b> <span class="grid1-icon">Grid</span> <a href="category-list.html" class="list-icon">List</a></div>
          <div class="limit"><b>Show:</b>
            <select >
              <option value="15" selected="selected">15</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div> -->
          <div class="sort"><b>Sort By:</b>
            <select>
              <option value="" selected="selected">Default</option>
              <option value="">Name (A - Z)</option>
              <option value="">Name (Z - A)</option>
              <option value="">Price (Low &gt; High)</option>
              <option value="">Price (High &gt; Low)</option>
              <option value="">Rating (Highest)</option>
              <option value="">Rating (Lowest)</option>
              <option value="">Model (A - Z)</option>
              <option value="">Model (Z - A)</option>
            </select>
          </div>
        </div>
        <div class="product-compare"><a href="#" id="compare-total">Product Compare (0)</a></div>
        <!--Product Grid Start-->
        <div class="product-grid">
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/apple_cinema_30-162x162.jpg') !!}" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;" /></a></div>
            <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br />
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/canon_eos_5d_1-162x162.jpg') !!}" title="Canon EOS 5D" alt="Canon EOS 5D" /></a></div>
            <div class="name"><a href="product.html">Canon EOS 5D</a></div>
            <div class="description">Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're n..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> <br />
              <span class="price-tax">Ex Tax: $80.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-2.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_classic_1-162x162.jpg') !!}" title="iPad Classic" alt="iPad Classic" /></a></div>
            <div class="name"><a href="product.html">iPad Classic</a></div>
            <div class="description"> More room to move.
              
              With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_nano_1-162x162.jpg') !!}" title="iPad Retina 2" alt="iPad Retina 2" /></a></div>
            <div class="name"><a href="product.html">iPad Retina 2</a></div>
            <div class="description"> Video in your pocket.
              
              Its the small iPod with one very big idea: video. The worlds most popular..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/iphone_1-162x162.jpg') !!}" title="iPhone 4s" alt="iPhone 4s" /></a></div>
            <div class="name"><a href="product.html">iPhone 4s</a></div>
            <div class="description">iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name o..</div>
            <div class="price"> $120.68 <br />
              <span class="price-tax">Ex Tax: $101.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/htc_touch_hd_1-162x162.jpg') !!}" title="iPhone 5s" alt="iPhone 5s" /></a></div>
            <div class="name"><a href="product.html">iPhone 5s</a></div>
            <div class="description">HTC Touch - in High Definition. Watch music videos and streaming content in awe-inspiring high defin..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-3.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/palm_treo_pro_1-162x162.jpg') !!}" title="Laptop Treo Pro" alt="Laptop Treo Pro" /></a></div>
            <div class="name"><a href="product.html">Laptop Treo Pro</a></div>
            <div class="description">Redefine your workday with the Palm Treo Pro smartphone. Perfectly balanced, you can respond to busi..</div>
            <div class="price"> $330.99 <br />
              <span class="price-tax">Ex Tax: $279.99</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-5.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/nikon_d300_1-162x162.jpg') !!}" title="Nikon D300" alt="Nikon D300" /></a></div>
            <div class="name"><a href="product.html">Nikon D300</a></div>
            <div class="description"> Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines bra..</div>
            <div class="price"> $942.00 <br />
              <span class="price-tax">Ex Tax: $800.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-1.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/iphone_1-162x162.jpg') !!}" title="iPhone 4s" alt="iPhone 4s" /></a></div>
            <div class="name"><a href="product.html">iPhone 4s</a></div>
            <div class="description">iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name o..</div>
            <div class="price"> $120.68 <br />
              <span class="price-tax">Ex Tax: $101.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_classic_1-162x162.jpg') !!}" title="iPad Classic" alt="iPad Classic" /></a></div>
            <div class="name"><a href="product.html">iPad Classic</a></div>
            <div class="description"> More room to move.
              
              With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/canon_eos_5d_1-162x162.jpg') !!}" title="Canon EOS 5D" alt="Canon EOS 5D" /></a></div>
            <div class="name"><a href="product.html">Canon EOS 5D</a></div>
            <div class="description">Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're n..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> <br />
              <span class="price-tax">Ex Tax: $80.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-2.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/apple_cinema_30-162x162.jpg') !!}" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;" /></a></div>
            <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br />
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/apple_cinema_30-162x162.jpg') !!}" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;" /></a></div>
            <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br />
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/canon_eos_5d_1-162x162.jpg') !!}" title="Canon EOS 5D" alt="Canon EOS 5D" /></a></div>
            <div class="name"><a href="product.html">Canon EOS 5D</a></div>
            <div class="description">Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're n..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> <br />
              <span class="price-tax">Ex Tax: $80.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-2.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_classic_1-162x162.jpg') !!}" title="iPad Classic" alt="iPad Classic" /></a></div>
            <div class="name"><a href="product.html">iPad Classic</a></div>
            <div class="description"> More room to move.
              
              With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/ipod_nano_1-162x162.jpg') !!}" title="iPad Retina 2" alt="iPad Retina 2" /></a></div>
            <div class="name"><a href="product.html">iPad Retina 2</a></div>
            <div class="description"> Video in your pocket.
              
              Its the small iPod with one very big idea: video. The worlds most popular..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="{!! asset('assets/frontend/image/stars-4.png') !!}" alt="Based on 1 reviews." /></div>
          </div>
        </div>
        <!--Product Grid End-->
        <!--Pagination Part Start-->
        <div class="pagination">
          <div class="links"> <b>1</b> <a href="#">2</a> <a href="#">&gt;</a> <a href="#">&gt;|</a></div>
          <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
        </div>
        <!--Pagination Part End-->
@endsection
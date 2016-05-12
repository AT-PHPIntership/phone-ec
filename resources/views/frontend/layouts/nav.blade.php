<nav id="menu">
        <ul>
          <li class="home"><a title="Home" href="/"><span>Home</span></a></li>
          <li class="categories"><a>Categories</a>
            @if (count($productCategory) > 0)
            <div>
              @foreach ($productCategory as $Category)
              <div class="column"> <a href="{!! url('category/'. $Category->id) !!}">{{ $Category->brand_name }}</a></div>
              @endforeach
            </div>
            @endif
          </li>
          <li><a href="about-us">About Us</a></li>
          <li><a href="contact-us">Contact Us</a></li>
          <li><a>Account</a>
            <div>
              @if (Auth::guest()) 
              <ul>
                <li><a href="{{ url('login') }}">My Account</a></li>
                <li><a href="{{ url('login') }}">Order History</a></li>
              </ul>
              @else
              <ul>
                <li><a href="{{ url('account') }}">My Account</a></li>
                <li><a href="{{ url('orders') }}">Order History</a></li>
              </ul>
              @endif
            </div>
          </li>
        </ul>
      </nav>
      <!--Top Menu(Vertical Categories) End-->
      <!-- Mobile Menu Start-->
      <nav id="menu" class="m-menu"> <span>Menu</span>
        <ul>
          <li class="categories"><a>Categories</a>
            @if (count($productCategory) > 0)
              <div>
                @foreach ($productCategory as $Category)
                <div class="column"> <a href="{!! url('category/'. $Category->id) !!}">{{ $Category->brand_name }}</a>
                </div>
                @endforeach
              </div>
            @endif
          </li>
        </ul>
      </nav>
      
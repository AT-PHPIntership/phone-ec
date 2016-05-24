  <footer id="footer">
    <div class="fpart-inner">
      <div class="social-part">
        <!-- Custom Column Part Start-->
        <div class="custom_column part3">
          <h3>Custom Column</h3>
          <p>You can insert any content here.<br>
            <br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
            <br>
            when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>
        </div>
        <!-- Custom Column Part End-->
        <!-- Twitter Feeds Part Start-->
        <div id="twitter_footer" class="part3">
          <h3>NEWSLETTER</h3>
          <form action="{{ url('sub') }}" method="post">
            {{ csrf_field() }}
            <!-- start cms-block NEWSLETTER -->
            <div>Subscribe and Get 50.000 VND Instantly!</div>
            <div style="margin: 10px 0 5px 0"><strong>YOUR EMAIL :</strong></div>
            <input name="sub_email" type="text" placeholder="Your email">
            <input type="submit" class="button" name="subscription" value="Send">
            @if (isset($errors) && $errors->any())
              @foreach ($errors->all() as $error)
                <p><strong>{{ $error }}</strong></p>
              @endforeach
            @elseif (Session::has('message'))
              <p><strong>{{ Session::get('message') }}</strong></p>
            @endif
            <!-- end cms-block NEWSLETTER -->
        </form>
        </div>
        <!-- Twitter Feeds Part End-->
        <!-- Facebook Box Part Start-->
        <div id="facebook" class="part3">
          <h3>Join us on Facebook</h3>
          <div class="line"></div>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-like-box" data-href="http://www.facebook.com/160281810726316" data-width="322" data-show-faces="true" data-stream="false" data-header="false" data-colorscheme="dark" data-connections="16" data-color-scheme="dark" data-border-color="#222222"></div>
        </div>
        <!-- Facebook Box Part End-->
      </div>
      <div class="column">
        <h3>Information</h3>
        <ul>
          <li><a href="about-us.html">About Us</a></li>
          <li><a href="about-us.html">Delivery Information</a></li>
          <li><a href="about-us.html">Privacy Policy</a></li>
          <li><a href="elements.html">Elements</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>Customer Service</h3>
        <ul>
          <li><a href="contact-us.html">Contact Us</a></li>
          <li><a href="#">Returns</a></li>
          <li><a href="sitemap.html">Site Map</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>Extras</h3>
        <ul>
          <li><a href="#">Brands</a></li>
          <li><a href="#">Gift Vouchers</a></li>
          <li><a href="#">Affiliates</a></li>
          <li><a href="#">Specials</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>My Account</h3>
        <ul>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Order History</a></li>
          <li><a href="#">Wish List</a></li>
          <li><a href="#">Newsletter</a></li>
        </ul>
      </div>
      <!-- Contact Details Start-->
      <div class="contact contact_icon">
        <h3>Contact Us</h3>
        <ul>
          <li class="address">Central Square, 22 Hoi Wing Road, Tuen Mun, New Delhi, India</li>
          <li class="mobile">+91 9896989598</li>
          <li class="fax">+91 9896989598</li>
          <li class="email"><a href="mailto:info@contact.com">info@contact.com</a></li>
        </ul>
      </div>
      <!-- Contact Details End-->
      <div class="clear"></div>
      <div id="powered">
        <!-- Payment Images Icon Start-->
        <div class="payments_types part3"> <img src="{!! asset('assets/frontend/image/payment_paypal.png') !!}" alt="paypal" title="PayPal"> <img src="{!! asset('assets/frontend/image/payment_american.png') !!}" alt="american-express" title="American Express"> <img src="{!! asset('assets/frontend/image/payment_2checkout.png') !!}" alt="2checkout" title="2checkout"> <img src="{!! asset('assets/frontend/image/payment_maestro.png') !!}" alt="maestro" title="Maestro"> <img src="{!! asset('assets/frontend/image/payment_discover.png') !!}" alt="discover" title="Discover"> </div>
        <!-- Payment Images Icon End-->
        <!-- Powered by Text Start-->
        <div class="powered_text part3">
          <p>Polishop Html Template © 2013<br />
            Template By <a target="_blank" href="http://harnishdesign.net/">Harnish Design</a></p>
        </div>
        <!-- Powered by Text End-->
        <!-- Follow Social Icons Start-->
        <div class="social part3"> <a href="http://facebook.com/harnishdesign" target="_blank"><img src="{!! asset('assets/frontend/image/facebook.png') !!}" alt="Facebook" title="Facebook"></a> <a href="https://twitter.com/#!/harnishdesign" target="_blank"><img src="{!! asset('assets/frontend/image/twitter.png') !!}" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img src="{!! asset('assets/frontend/image/googleplus.png') !!}" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img src="{!! asset('assets/frontend/image/pinterest.png') !!}" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img src="{!! asset('assets/frontend/image/rss.png') !!}" alt="RSS" title="RSS"> </a> <a href="http://www.vimeo.com/#" target="_blank"> <img src="{!! asset('assets/frontend/image/vimeo.png') !!}" alt="Vimeo" title="Vimeo"> </a> </div>
        <!-- Follow Social Icons End-->
        <div class="clear"></div>
      </div>
      <!-- Back to Top Button Start-->
      <div class="back-to-top" id="back-top"><a title="Back to Top" href="javascript:void(0)" class="backtotop">Top</a></div>
      <!-- Back to Top Button End-->
    </div>
  </footer>
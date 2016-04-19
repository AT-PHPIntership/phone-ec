@include('frontend.layouts.header')
    <div id="container">
      @include('frontend.layouts.sidebar')
      <div id="content">
        <!-- Nivo Slider Start -->
        @section('slider')
        <section class="slider-wrapper">
          <div id="slideshow" class="nivoSlider"> <a class="nivo-imageLink" href="#"><img src="{!! asset('assets/frontend/image/slider/slide-1.jpg') !!}" alt="slide-1" /></a> <a class="nivo-imageLink" href="#"><img src="{!! asset('assets/frontend/image/slider/slide-2.jpg') !!}" alt="slide-2" /></a> <a class="nivo-imageLink" href="#"><img src="{!! asset('assets/frontend/image/slider/slide-3.jpg') !!}" alt="slide-3" /></a> </div>
        </section>
        <script type="text/javascript">
        <!--
          $(document).ready(function() {
              $('#slideshow').nivoSlider();
          });
        -->
        </script>
        @show
        <!-- Nivo Slider End-->
        @section('breadcrumb')
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> &raquo; <a href="#">Electronics</a> </div>
        <!--Breadcrumb Part End-->
        @show
        @yield('content')
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
  @include('frontend.layouts.footer')
  <!--Footer Part End-->
</div>
</body>
</html>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>@yield('title')</title>
<link href="{!! asset('assets/frontend/image/favicon.png') !!}" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="clean modern and elegant corporate look eCommerce html template">
<meta name="author" content="">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="{!! asset('assets/frontend/css/stylesheet.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('assets/frontend/css/slideshow.css') !!}" media="screen" />
<link rel="stylesheet" type="text/css" href="{!! asset('assets/frontend/css/flexslider.css') !!}" media="screen" />
<link rel="stylesheet" type="text/css" href="{!! asset('assets/frontend/js/colorbox/colorbox.css') !!}" media="screen" />
<link rel="stylesheet" type="text/css" href="{!! asset('assets/frontend/css/carousel.css') !!}" media="screen" />
<!-- CSS Part End-->
<!-- JS Part Start-->
<script type="text/javascript" src="{!! asset('assets/frontend/js/jquery-1.7.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/jquery.nivo.slider.pack.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/jquery.flexslider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/jquery.easing-1.3.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/jquery.jcarousel.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/colorbox/jquery.colorbox-min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/tabs.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/cloud_zoom.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/jquery.dcjqaccordion.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/custom.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/js/html5.js') !!}"></script>
<!-- JS Part End-->
<!-- Google Fonts (Droid Sans) Start -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans&amp;v1' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=&amp;v1' rel='stylesheet' type='text/css'>
<!-- Google Fonts (Droid Sans) End -->
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
    <header id="header">
      <div class="htop">
        <div id="language"> <span>Language<b></b></span>
          <ul>
            <li><a title="English"><img src="{!! asset('assets/frontend/image/flags/gb.png') !!}" alt="English" />English</a></li>
            <li><a title="Türkçe"><img src="{!! asset('assets/frontend/image/flags/tr.png') !!}" alt="Türkçe" />Türkçe</a></li>
          </ul>
        </div>
        <div id="currency"> <span>Currency<b></b></span>
          <ul>
            <li> <a title="Euro">€ - Euro</a> </li>
            <li> <a title="Pound Sterling">£ - Pound Sterling</a> </li>
            <li> <a title="US Dollar"><b>$ - US Dollar</b></a> </li>
          </ul>
        </div>
        <div class="links"> <a href="login">Login</a> <a href="register.html">Register</a> <a href="#">My Account</a> <a href="checkout.html">Checkout</a> </div>
      </div>
      <section class="hsecond">
        <div id="logo"><a href="/"><img src="{!! asset('assets/frontend/image/logo.png') !!}" title="Polishop" alt="Polishop" /></a></div>
        <div id="search">
          <div class="button-search"></div>
          <input type="text" name="search" placeholder="Search" value="" />
        </div>
        <!--Mini Shopping Cart Start-->
        <section id="cart">
          <div class="heading">
            <h4><img width="32" height="32" alt="" src="{!! asset('assets/frontend/image/cart-bg.png') !!}"></h4>
            <a><span id="cart-total">2 item(s) - $710.18</span></a> </div>
          <div class="content">
            <div class="mini-cart-info">
              <table>
                <tr>
                  <td class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/lotto-sports-shoes-white-47x47.jpg') !!}" alt="Lotto Sports Shoes" title="Lotto Sports Shoes" /></a></td>
                  <td class="name"><a href="product.html">Lotto Sports Shoes</a></td>
                  <td class="quantity">x&nbsp;1</td>
                  <td class="total">$589.50</td>
                  <td class="remove"><img src="{!! asset('assets/frontend/image/remove-small.png') !!}" alt="Remove" title="Remove" /></td>
                </tr>
                <tr>
                  <td class="image"><a href="product.html"><img src="{!! asset('assets/frontend/image/product/iphone_1-47x47.jpg') !!}" alt="iPhone 4s" title="iPhone 4s" /></a></td>
                  <td class="name"><a href="product.html">iPhone 4s</a></td>
                  <td class="quantity">x&nbsp;1</td>
                  <td class="total">$120.68</td>
                  <td class="remove"><img src="{!! asset('assets/frontend/image/remove-small.png') !!}" alt="Remove" title="Remove" /></td>
                </tr>
              </table>
            </div>
            <div class="mini-cart-total">
              <table>
                <tr>
                  <td class="right"><b>Sub-Total:</b></td>
                  <td class="right">$601.00</td>
                </tr>
                <tr>
                  <td class="right"><b>Eco Tax (-2.00):</b></td>
                  <td class="right">$4.00</td>
                </tr>
                <tr>
                  <td class="right"><b>VAT (17.5%):</b></td>
                  <td class="right">$105.18</td>
                </tr>
                <tr>
                  <td class="right"><b>Total:</b></td>
                  <td class="right">$710.18</td>
                </tr>
              </table>
            </div>
            <div class="checkout"><a class="button" href="cart">View Cart</a> &nbsp; <a class="button" href="checkout">Checkout</a></div>
          </div>
        </section>
        <!--Mini Shopping Cart End-->
        <div class="clear"></div>
      </section>
      <!--Top Menu(Vertical Categories) Start-->
      @include('frontend.layouts.nav')
      <!-- Mobile Menu End-->
    </header>
    <!--Header Part End-->
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>@yield('title')</title>
<link href="{!! asset('assets/frontend/image/favicon.png') !!}" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="clean modern and elegant corporate look eCommerce html template">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div class="links"> <a href="login">Login</a> <a href="register.html">Register</a> <a href="#">My Account</a> <a href="{{ url('cart') }}">Checkout</a> </div>
        <div class="links">
        @if (Auth::guest()) 
        <a href="login">Login</a> <a href="register">Register</a>
        @else
        <a href="account">{{ Auth::user()->name }}</a>
        <a href="account">My Account</a>
        <a href="checkout.html">Checkout</a> 
        <a href="{{ url('/logout') }}">Logout</a> 
        @endif
        </div>
      </div>
      <section class="hsecond">
        <div id="logo"><a href="/"><img src="{!! asset('assets/frontend/image/logo.png') !!}" title="Polishop" alt="Polishop" /></a></div>
        <form action="{{ url('search') }}" method="GET" role="search">
        <div id="search">
          <button class="button-search" type="submit"></button>
          <input type="text" name="search" placeholder="Search" required="" value="" />
        </div>
        </form>
        <!--Mini Shopping Cart Start-->
        <section id="cart">
          <div class="heading">
            <h4><img width="32" height="32" alt="" src="{!! asset('assets/frontend/image/cart-bg.png') !!}"></h4>
            <a>
              @if (Session::has('carts') && count(Session::get('carts')>0))
                <span id="cart-total" style="background: none">{{ count(session()->get('carts')) }} item(s)</span>
              @else
                <span id="cart-total">0 item</span>
              @endif
            </a> 
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
    

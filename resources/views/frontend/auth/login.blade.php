@extends('frontend.layouts.master')

@section('title', 'Login')

@section('sidebar')
	@parent
    <!-- sidebar content -->
    @section('categorys-list')
      <!-- parent -->
    @stop
    @section('account-links')
      @parent
    @stop
    @section('best-sellers-products')
      <!-- parent -->
    @stop
    @section('latest-products')
      <!-- parent -->
    @stop
    @section('banner')
      <!-- parent -->
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
<h1>Account Login</h1>
        <div class="login-content">
          <div class="left">
            <h2>New Customer</h2>
            <div class="content">
              <p><b>Register Account</b></p>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
              <a class="button" href="register">Continue</a></div>
          </div>
          <div class="right">
            <h2>Returning Customer</h2>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
              {!! csrf_field() !!}
              <div class="content">
                <p>I am a returning customer</p>
                <b>E-Mail Address:</b><br>
                <input type="text" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <br>
                <br>
                <b>Password:</b><br>
                <input type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <br>
                <a href="{{ url('/password/reset') }}">Forgotten Password</a><br>
                <br>
                <input type="submit" class="button" value="Login">
              </div>
            </form>
          </div>
        </div>
@endsection
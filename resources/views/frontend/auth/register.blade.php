@extends('frontend.layouts.master')

@section('title', 'Account')

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
      @parent
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
<h1>Register Account</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {!! csrf_field() !!}
          
          <div class="content">
          <h2>Your Personal Details</h2>
            <table class="form">
              <tbody>
                <tr>
                  <td>Name:</td>
                  <td>
                    <input type="text" class="large-field" name="name" value="{{ old('name') }}">
                  </td>
                </tr>
                <tr>
                  <td>E-Mail:</td>
                  <td>
                    <input type="text" class="large-field" name="email" value="{{ old('email') }}">
                  </td>
                </tr>
                <tr>
                  <td>Telephone:</td>
                  <td>
                    <input type="text" class="large-field" name="phone" value="{{ old('phone') }}">
                  </td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td>
                    <input type="text" class="large-field" name="address" value="{{ old('address') }}">
                  </td>
                </tr>
                <tr>
                  <td>Password:</td>
                  <td>
                    <input type="password" class="large-field" name="password">
                  </td>
                </tr>
                <tr>
                  <td>Password Confirm:</td>
                  <td>
                    <input type="password" class="large-field" name="password_confirmation">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="buttons">
            <div class="left">
              <input type="submit" class="button" value="Register">
            </div>
          </div>
        </form>
@endsection

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
<h1>My Account</h1>
<form enctype="multipart/form-data" method="post" action="#">
  <h2>Your Details</h2>
  <div class="content">
    <table class="form">
      <tbody>
        <tr>
          <td>Name:</td>
          <td>Pham Tan Hoang</td>
          <td><a href="#">Edit</a></td>
        </tr>
        <tr>
          <td>E-Mail:</td>
          <td>phamtanhoang@gmail.com</td>
          <td><a href="#">Edit</a></td>
        </tr>
        <tr>
          <td>Address:</td>
          <td>27/24 Phan Tu</td>
          <td><a href="#">Edit</a></td>
        </tr>
        <tr>
          <td>Telephone:</td>
          <td>0917214096</td>
          <td><a href="#">Edit</a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <h2>Change Password</h2>
  <div class="content">
    <table class="form">
      <tbody>
        <tr>
          <td>Old Password:</td>
          <td><input class="large-field" type="password" value="" name="password"></td>
        </tr>
        <tr>
          <td>New Password:</td>
          <td><input class="large-field" type="password" value="" name="password"></td>
        </tr>
        <tr>
          <td>New Password Confirm:</td>
          <td><input class="large-field" type="password" value="" name="confirm"></td>
        </tr>
        <tr>
          <td>
            <div class="left">
              <input type="submit" class="button" value="Save">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</form>
@endsection
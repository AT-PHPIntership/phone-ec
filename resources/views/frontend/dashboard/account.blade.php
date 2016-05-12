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
<h1>Account Details</h1>
<h2>Your Details</h2>
<div class="content">
  <table class="form">
    <tbody>
      <tr>
        <td>Name:</td>
        <td>{{ Auth::user()->name }}</td>
      </tr>
      <tr>
        <td>E-Mail:</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
      <tr>
        <td>Address:</td>
        <td>{{ Auth::user()->address }}</td>
      </tr>
      <tr>
        <td>Telephone:</td>
        <td>{{ Auth::user()->phone }}</td>
      </tr>
      <tr>
        <td>
          <div class="left">
            <a href="{{ url('account/'.Auth::user()->id.'/edit') }}">
              <input type="button" class="button" value="Edit information">
            </a>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<h2>Change Password</h2>
<div class="content">
  <table class="form">
    <form enctype="multipart/form-data" method="post" action="{{ url('changepass/'.Auth::user()->id) }}">
    {!! csrf_field() !!}
      <tbody>
        <tr>
          <td>Old Password:</td>
          <td><input class="large-field" type="password" value="" name="old_password"></td>
        </tr>
        <tr>
          <td>New Password:</td>
          <td><input class="large-field" type="password" value="" name="password"></td>
        </tr>
        <tr>
          <td>New Password Confirm:</td>
          <td><input class="large-field" type="password" value="" name="password_confirmation"></td>
        </tr>
        <tr>
          <td>
            <div class="left">
              <input type="submit" class="button" value="Change">
            </div>
          </td>
        </tr>
      </tbody>
    </form>
  </table>
</div>

@endsection
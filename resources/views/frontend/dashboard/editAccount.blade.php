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
  @if (count($errors) > 0)
  <!-- Form Error List -->
  <div class="alert alert-danger">
      <strong>Whoops! Something went wrong!</strong>
      <br><br>
      <ul>
          @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
          @endforeach
      </ul>
  </div>
  @endif
  <form role="form" action="{{ url('account/'.Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
  {!! csrf_field() !!}
  {!! method_field('PATCH') !!}
  <h2>Your Details</h2>
  <div class="content">
    <table class="form">
      <tbody>
        <tr>
          <td>Name:</td>
          <td><input type="text" name="name" value="{{ Auth::user()->name }}"></input></td>
        </tr>
        <tr>
          <td>E-Mail:</td>
          <td><input type="text" name="email" value="{{ Auth::user()->email }}"></input></td>
        </tr>
        <tr>
          <td>Address:</td>
          <td><input type="text" name="address" value="{{ Auth::user()->address }}"></input></td>
        </tr>
        <tr>
          <td>Telephone:</td>
          <td><input type="text" name="phone" value="{{ Auth::user()->phone }}"></input></td>
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
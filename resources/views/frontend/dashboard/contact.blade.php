@extends('frontend.layouts.master')

@section('title', 'Contact')

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
<h1>Contact Us</h1>
<h2>Our Location</h2>
<div class="contact-info">
  <div class="content">
    <div class="left">
      <h4><b>Address:</b></h4>
      <p>Central Square, 22 Hoi Wing Road, Tuen Mun, New Delhi,<br>
        India. 3800004</p>
    </div>
    <div class="right">
      <h4><b>Telephone:</b></h4>
      +91 9898989898<br>
      +91 8787878787 <br>
    </div>
  </div>
</div>
@if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Contact Form</h2>
<form action="{{ url('contact') }}" method="POST" role="form">
  {{ csrf_field() }}
  <div class="content"> <b>First Name:</b><br>
    <input class="large-field" type="text" placeholder="Your name" name="name">
    <br>
    <br>
    <b>E-Mail Address:</b><br>
    <input class="large-field" type="text" placeholder="Your email" name="email">
    <br>
    <br>
    <b>Enquiry:</b><br>
    <textarea style="width: 98%;" rows="10" cols="40" name="enquiry" placeholder="Your enquiry"></textarea>
  </div>
  <div class="buttons">
    <div class="right">
      <input type="submit" class="button" value="Continue" id="send">
    </div>
  </div>
</form>

@endsection
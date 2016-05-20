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
<div class="content">
    <h1>Create New Password</h1>
    @if (session('status'))
        <div class="success">
            {{ session('status') }}
        </div>
    @endif
    @if (isset($errors) && $errors->any())
        @foreach ($errors->all() as $error)
            <div class="warning">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">
    <table class="form">
        <tbody>
            <tr>
                <td>E-Mail Address: </td>
                <td><input type="text" name="email" value="{{ $email or old('email') }}"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" class="form-control" name="password_confirmation"></td>
            </tr>
            <tr>
                <td><input type="submit" class="button" value="Reset Password"></td>
            </tr>
        </tbody>

    </table>

    </form>
</div>
@endsection
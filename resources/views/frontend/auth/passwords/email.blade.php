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
    <h1>Reset Password</h1>
    @if (session('status'))
        <div class="success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->has('email'))
        <div class="warning">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('password/email') }}">
    {!! csrf_field() !!}
    <table class="form">
        <tbody>
            <tr>
                <td>E-Mail Address</td>
                <td><input type="text" class="large-field" name="email" value="{{ old('email') }}"></td>
                <td><input type="submit" class="button" value="Send Password Reset Link"></td>
            </tr>
        </tbody>

    </table>

    </form>
</div>

        
@endsection

@extends('backend.layouts.master')

@section('title', 'Edit User')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit user</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ url('admin/users/'.$user->id) }}" method="PUT" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{$user['name']}}" required="" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{$user['email']}}" required="" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" value="{{$user['address']}}" required="" class="form-control" placeholder="Enter address">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" name="phone" value="{{$user['phone']}}" required="" class="form-control" placeholder="Enter phone number">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="{{$user['password']}}" required="" class="form-control" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label>Status : </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline1" value="1" 
                                                    @if ($user['active'] == 1)
                                                        checked=""
                                                    @endif> Activated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline2" value="0"
                                                    @if ($user['active'] == 0)
                                                        checked=""
                                                    @endif> Deactivated
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                        <a class="btn btn-sm btn-primary" href="{!! url('admin/users') !!}">Cancel</a>
                                    </form>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
@endsection
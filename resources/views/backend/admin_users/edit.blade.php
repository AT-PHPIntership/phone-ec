@extends('backend.layouts.master')

@section('title', 'Edit Admin User')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit admin user</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ url('admin/account/' . $adminUser->id) }}" method="POST" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        {!! method_field('PATCH') !!}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ $adminUser->name }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ $adminUser->email }}" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" value="{{ $adminUser->address }}" class="form-control" placeholder="Enter address">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" name="phone" value="{{ $adminUser->phone }}" class="form-control" placeholder="Enter phone number">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="{{ $adminUser->password }}" class="form-control" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label>Status : </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline1" value="1"
                                                @if ($adminUser->active == 1) 
                                                   checked="" 
                                                @endif>
                                                    Activated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline2" value="0"
                                                @if ($adminUser->active == 0)
                                                    checked=""
                                                @endif>
                                                    Deactivated
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        <a class="btn btn-sm btn-primary" href="{!! url('admin/account') !!}">Cancel</a>
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
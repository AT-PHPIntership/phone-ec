@extends('backend.layouts.master')

@section('title', 'Create Admin Users')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new admin user</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ url('admin/account') }}" method="POST" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label>Status : </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline1" value="1" checked=""> Activated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline2" value="0">Deactivated
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
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
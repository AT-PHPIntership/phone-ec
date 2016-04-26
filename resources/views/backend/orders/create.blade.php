@extends('backend.layouts.master')

@section('title', 'Create Orders')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new order</h1>
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
                                <form role="form" action="{{ url('admin/orders') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>name</label>
                                        <input class="form-control" name="user_name" value="{{ old('user_name') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>user</label>
                                             
                                        <input class="form-control" name="user_id" >
                                    </div>
                                    <div class="form-group">
                                        <label>status</label>
                                        <input class="form-control" name="status"  value="{{ old('status') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>address</label>
                                        <input class="form-control" name="user_address"  value="{{ old('user_address') }}">  
                                    </div>
                                    <div class="form-group">
                                        <label>phone</label>
                                        <input class="form-control" name="user_phone" value="{{ old('user_phone') }}" > 
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                            <!-- /.col-lg-12 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection

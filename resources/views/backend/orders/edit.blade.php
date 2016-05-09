@extends('backend.layouts.master')

@section('title', 'Update Orders')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update a order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @include('common.errors')
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ url('admin/orders/'. $order->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('patch') }}
                                        <div class="form-group">
                                            <label>id</label>
                                            <input class="form-control" name="id" value="{{ $order->id }}">
                                        </div>
                                        <div class="form-group">
                                        <label>user_name</label>
                                        <input class="form-control" name="user_name" value="{{ $order['user_name'] }}">
                                    </div>
                                        
                                        <div class="form-group">
                                            <label>user_id</label>
                                            <input class="form-control" type="number" name="user_id" value="{{ $order->user_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label>status</label>
                                            <input class="form-control" type="number" name="status" value="{{ $order->status }}">
                                        </div>

                                        <div class="form-group">
	                                        <label>user_address</label>
	                                        <input class="form-control" name="user_address" value="{{ $order['user_address'] }}">
                                    	</div>
                                       <div class="form-group">
                                            <label>user_phone</label>
                                            <input class="form-control" type="number" name="user_phone" value="{{ $order->user_phone }}">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
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

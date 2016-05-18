@extends('backend.layouts.master')

@section('title', 'Update Products')

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
                                    <form role="form" action="{{ url('admin/orders/'. $orders->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('patch') }}
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Orders are comfirmed</option>
                                                <option value="2">Orders was moved</option>
                                                <option value="3">Orders was shipped successfully</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name='Update'>Update</button>
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

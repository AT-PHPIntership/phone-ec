@extends('backend.layouts.master')

@section('title', 'Orders Manage')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Orders Manage
                        <div class="clearfix"></div>
                    </div> 
                    <!-- /.panel-heading -->
                    @if (count($orders) > 0)
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="odd gradeX">
                                                <td><a href="{{ url('admin/orders/'.$order['id']) }}">{{ $order['id'] }}</a></td>
                                                <td>{{ $order['user_name'] }}</td>
                                                <td>{{ $order['user_address'] }}</td>
                                                <td>{{ $order['user_phone'] }}</td>
                                                <td>{{ $order['total_price'] }}</td>
                                                <td>
                                                    @if ($order->status == 1)
                                                        Orders are comfirmed
                                                    @elseif ($order->status == 2)
                                                        Orders was moved
                                                    @elseif ($order->status == 3)
                                                        Orders was shipped successfully
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ url('admin/orders/'.$order->id.'/edit') }}" class="btn btn-circle btn-outline btn-primary" name='update' ><i class="fa fa-edit" ></i></a>
                                                    <input type="hidden" value="{{ $order['id'] }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            {!! $orders->links() !!}
                        </div> 
                        <!-- /.panel-body -->
                    @else
                        <div class="alert alert-info">
                            <strong>Info!</strong> There are no orders.
                        </div>
                    @endif
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection

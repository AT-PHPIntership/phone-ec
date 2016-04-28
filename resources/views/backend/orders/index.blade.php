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
                        <a href="{{ url('admin/orders/create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add new order</a>
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
                                            <th>id</th>
                                            <th>user_name</th>
                                            <th>user_id</th>
                                            <th>status</th>
                                            <th>user_address</th>
                                            <th>user_phone</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="odd gradeX">
                                                <td>{{ $order['id'] }}</td>
                                                <td>{{ $order['user_name'] }}</td>
                                                <td>{{ $order['user_id'] }}</td>
                                                <td>{{ $order['status'] }}</td>
                                                
                                                <td>{{ $order['user_address'] }}</td>
                                                <td>{{ $order['user_phone'] }}</td>
                                                

                                                <td class="text-right">
                                                    <a href="{{ url('admin/orders/'.$order->id.'/edit') }}" class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-edit"></i></a>
                                                    <button type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></button>
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

    @if (count($orders) > 0)
    <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete a order "<span id='idDel'></span>"</h4>
                </div>
                <div class="modal-body text-center alert alert-danger">
                    <h3 class="text-danger">Are you sure delete this order?</h3>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        $(document).ready(function(){
            $(document).on('click',".btnDel", function(){
                var id = $(this).next().val();
                $('form').attr('action','orders/'+id);
                $('#idDel').text(id);
            });
        });
    </script>
@endsection

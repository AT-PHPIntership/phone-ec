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
                    @if (count($details) > 0)
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
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $detail)
                                            <tr class="odd gradeX">
                                                <td>{{ $detail['id'] }}</td>
                                                <td>{{ $detail->products->name }}</td>
                                                <td><img src="{{ asset('upload/'.$detail->products->image) }}" alt="{{ $detail->products->name }}" width="80" height="80"></td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>{{ $detail->products->current_price }}</td>
                                                <td>{{ $detail->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div> 
                        <!-- /.panel-body -->
                    @else
                        <div class="alert alert-info">
                            <strong>Info!</strong> There are no orders details.
                        </div>
                    @endif
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

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

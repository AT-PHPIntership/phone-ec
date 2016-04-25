@extends('backend.layouts.master')

@section('title', 'Products Manage')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products Manage
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add new product</a>
                    <div class="clearfix"></div>
                </div> 
                <!-- /.panel-heading -->
                @if (count($products) > 0)
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Old price (VND)</th>
                                        <th>Current price (VND)</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Digital</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="odd gradeX">
                                            <td>{{ $product['id'] }}</td>
                                            <td><img src="{{ asset('upload/'.$product['image']) }} " alt="" width="80" height="80"></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->brands->brand_name }}</td>
                                            <td>{{ number_format($product->old_price) }}</td>
                                            <td>{{ number_format($product->current_price) }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->des_tech }}</td>
                                            <td class="text-right">
                                                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-edit"></i></a>
                                                <button type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></button>
                                                <input type="hidden" value="{{ $product['id'] }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        {!! $products->links() !!}
                    </div> 
                    <!-- /.panel-body -->
                @else
                    <div class="alert alert-info">
                        <strong>Info!</strong> There are no products.
                    </div>
                @endif
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

@if (count($products) > 0)
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete a product "<span id='idDel'></span>"</h4>
            </div>
            <div class="modal-body text-center alert alert-danger">
                <h3 class="text-danger">Are you sure delete this product?</h3>
            </div>
            <div class="modal-footer">
                <form action="{{ url('admin/products/'.$product->id) }}" method="POST">
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
            $('form').attr('action','products/'+id);
            $('#idDel').text(id);
        });
    });
</script>

@endsection
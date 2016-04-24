@extends('backend.layouts.master')

@section('title', 'Brands Manage')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Brands</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Brands Manage
                    <a href="{{ url('admin/brands/create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add new brand</a>
                    <div class="clearfix"></div>
                </div> 
                <!-- /.panel-heading -->
                @if (count($brands) > 0)
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr class="odd gradeX">
                                            <td>{{ $brand['id'] }}</td>
                                            <td>{{ $brand['brand_name'] }}</td>
                                            <td class="text-right">
                                                <a href="{{ url('admin/brands/'.$brand->id.'/edit') }}" class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-edit"></i></a>
                                                <button type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></button>
                                                <input type="hidden" value="{{ $brand['id'] }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        {!! $brands->links() !!}
                    </div> 
                    <!-- /.panel-body -->
                @else
                    <div class="alert alert-info">
                        <strong>Info!</strong> There are no brands.
                    </div>
                @endif
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

@if (count($brands) > 0)
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete a brand "<span id='idDel'></span>"</h4>
            </div>
            <div class="modal-body text-center alert alert-danger">
                <h3 class="text-danger">Are you sure delete this brand?</h3>
            </div>
            <div class="modal-footer">
                <form action="{{ url('admin/brands/'.$brand->id) }}" method="POST">
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
            $('form').attr('action','brands/'+id);
            $('#idDel').text(id);
        });
    });
</script>

@endsection
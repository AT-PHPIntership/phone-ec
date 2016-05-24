@extends('backend.layouts.master')

@section('title', 'Categories Manage')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categories</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categories Manage
                        <a href="{{ url('admin/categories/create') }}" id="create" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add new category</a>
                        <div class="clearfix"></div>
                    </div> 
                    <!-- /.panel-heading -->
                    @if (count($cates) > 0)
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        
                        <div class="panel-body">
                             
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">                                 
                                    <thead>
                                        <tr>
<!--                                      <th>Category Parent</th>-->
                                            <th>Category Name</th>                                           
                                            <th>Category Status</th>
                                            <th>Category Image</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                                     
                                        @foreach ($cates as $cate)
                                            <tr class="odd gradeX">
                                                <td>
                                                    @if($cate['parent_id'] == 0)
                                                    
                                                    @else
                                                       @foreach($cates as $item)
                                                            @if($item['id'] == $cate['parent_id'])
                                                                {{ $item['cate_name'] }} >
                                                            @endif
                                                       @endforeach
                                                    @endif
                                                 {{ $cate['cate_name'] }}
                                                </td>
                                                
                                                @if($cate->cate_status == 1)
                                                    <td><font color="green">Active</font></td>
                                                @else
                                                    <td><font color="red">Deactive</font></td>
                                                @endif
                                                
                                                @if($cate['cate_image'] == NULL)
                                                    <td><img src="{{ asset('upload/noimage.jpg') }}" width="50" /></td>
                                                @else
                                                    <td><img src="{{ asset('upload/'.$cate['cate_image']) }}" width="50" /></td>                                 
                                                @endif
                                                <td class="text-right">
                                                    <a href="{{ url('admin/categories/'.$cate->id.'/edit') }}" id="update" class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-edit"></i></a>
                                                    <a data-toggle="modal" data-target="#confirmDelete" id="del" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></a>
                                                    <input type="hidden" value="{{ $cate['id'] }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            {!! $cates->links() !!}
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

    @if (count($cates) > 0)
    <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete a category "<span id='idDel'></span>"</h4>
                </div>
                <div class="modal-body text-center alert alert-danger">
                    <h3 class="text-danger">Are you sure delete this category?</h3>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/categories/'.$cate->id) }}" method="POST">
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
                $('form').attr('action','categories/'+id);
                $('#idDel').text(id);
            });
        });
    </script>
@endsection

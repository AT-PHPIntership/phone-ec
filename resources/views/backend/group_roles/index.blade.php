@extends('backend.layouts.master')

@section('title', 'Group role manage')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Group Role</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Group Role Manager
                    <a href="{!! url('admin/groups/create') !!}" class="btn btn-primary btn-sm pull-right" >
                        <i class="fa fa-plus-circle"></i> Add new group role
                    </a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
            @if (count($data))
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Group Role</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($group as $item)    
                                <tr class="gradeA">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @foreach ($data as $data_item)

                                        @if ($data_item->name == $item->name)
                                        {{ $data_item->module }} -> 
                                        <span style="color: green">
                                          @if ($data_item->see == 1)
                                             show - 
                                          @endif

                                          @if ($data_item->addNew == 1)
                                            - create - 
                                          @endif
                                          
                                          @if ($data_item->edit == 1)
                                            - update -
                                          @endif

                                          @if ($data_item->destroy == 1)
                                            - delete 
                                          @endif
                                        </span> <br>
                                        @endif

                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/groups/'. $item->id .'/edit') }}" class="btn btn-circle btn-outline btn-primary" name="edit"><i class="fa fa-edit"></i></a>

                                        <a type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel" name="delete"><i class="fa fa-trash-o"></i></a>
                                        <input type="hidden" value="{{ $item->id }}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            @else 
                <br>
                <div class="alert alert-info">
                  <strong>Info!</strong> There are no Group role!
                </div>
            @endif  
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@if (count($data))
        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Group Role "<b><span id='idDel'></span></b>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">Are you sure delete this Group Role?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/groups/' . $item->id) }}" method="POST">
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
                    $('form').attr('action','groups/'+id);
                    $('#idDel').text(id);
                });
            });
        </script>        
@endsection

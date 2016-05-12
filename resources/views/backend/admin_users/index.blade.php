@extends('backend.layouts.master')

@section('title', 'Admin Users manage')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                            <a href="{!! url('admin/account/create') !!}" class="btn btn-primary btn-sm pull-right" >
                                <i class="fa fa-plus-circle"></i> Add new user
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                    @if (count($adminUsers))
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
                                            <th>Email(s)</th>
                                            <th>Address</th>
                                            <th>Phone number</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($adminUsers as $itemUser)
                                        <tr class="gradeA">
                                            <td>{{ $itemUser->id }}</td>
                                            <td>{{ $itemUser->name }}</td>
                                            <td>{{ $itemUser->email }}</td>
                                            <td>{{ $itemUser->address }}</td>
                                            <td>{{ $itemUser->phone }}</td>
                                            <td class="text-center">
                                            {{ $itemUser->active }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('admin/account/' . $itemUser->id . '/edit') }}" class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-edit"></i></a>

                                                <button type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></button>
                                                <input type="hidden" value="{{ $itemUser->id }}">
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
                              <strong>Info!</strong> There are no admin user!
                            </div>
                    @endif   
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        @if (count($adminUsers))
        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Admin User "<b><span id='idDel'></span></b>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">Are you sure delete this admin user?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/account/' . $itemUser->id) }}" method="POST">
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
                    $('form').attr('action','account/'+id);
                    $('#idDel').text(id);
                });
            });
        </script>
@endsection

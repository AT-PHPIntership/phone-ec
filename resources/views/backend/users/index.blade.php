@extends('backend.layouts.master')

@section('title', 'Users manage')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                            <a href="{!! url('admin/users/create') !!}" id="create" class="btn btn-primary btn-sm pull-right" >
                                <i class="fa fa-plus-circle"></i> Add new user
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                        @if (count($users) > 0)
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @elseif (Session::has('message-warning'))
                                <div class="alert alert-danger">{{ Session::get('message-warning') }}</div>
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
                                            @foreach ($users as $user)
                                            <tr class="gradeA">
                                                <td>{{$user['id']}}</td>
                                                <td>{{$user['name']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>{{$user['address']}}</td>
                                                <td>{{$user['phone']}}</td>
                                                <td class="text-center">{{$user['active']}}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}" id='edit' class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-edit"></i></a>
                                                    <a id='del' data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></a>
                                                    <input type="hidden" value="{{ $user['id'] }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                {!! $users->links() !!}
                            </div>
                            <!-- /.panel-body -->
                        @else 
                            <br>
                            <div class="alert alert-info">
                              <strong>Info!</strong> There are no user!
                            </div>
                        @endif
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        @if (count($users) > 0 )
        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete User "<b><span id='idDel'></span></b>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">Are you sure delete this user?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
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
                    $('form').attr('action','users/'+id);
                    $('#idDel').text(id);
                });
            });
        </script>
@endsection

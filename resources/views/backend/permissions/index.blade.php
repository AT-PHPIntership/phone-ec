@extends('backend.layouts.master')

@section('title', trans('labels.LabelPermissionsManager'))

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('labels.LabelPermissions') }}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('labels.TitlePermission') }}
                            <a href="{!! url('admin/permissions/create') !!}" class="btn btn-primary btn-sm pull-right" id="create">
                                <i class="fa fa-plus-circle"></i> {{ trans('labels.labelAddPermission') }}
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
                                            <th>Module</th>
                                            <th>Show</th>
                                            <th>Create</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $item)    
                                        <tr class="gradeA">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->module }}</td>
                                            <td>
                                                @if ($item->see == \Config::get('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.LableNo') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.LableYes') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->inset == \Config::get('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.LableNo') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.LableYes') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->edit == \Config::get('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.LableNo') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.LableYes') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->destroy == \Config::get('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.LableNo') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.LableYes') }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('admin/permissions/'. $item->id .'/edit') }}" class="btn btn-circle btn-outline btn-primary" name="edit"><i class="fa fa-edit"></i></a>

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
                          {{ trans('labels.LabelNoData') }}
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
                        <h4 class="modal-title">{{ trans('labels.labelDeletePermission') }} "<b><span id='idDel'></span></b>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">{{ trans('labels.confirmDeletePermission') }}</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/permissions/' . $item->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit" class="btn btn-danger btn-sm">{{ trans('labels.BtnDelete') }}</button>
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-dismiss="modal">{{ trans('labels.BtnCancel') }}</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        @endif
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $(".btnDel").on('click', function () {
            var id = $(this).next().val();
            $('form').attr('action', 'permissions/' + id);
            $('#idDel').text(id);
        });
    });
</script>
@endsection
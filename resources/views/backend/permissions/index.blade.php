@extends('backend.layouts.master')

@section('title', trans('labels.label_permissions_manager'))

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('labels.label_permissions') }}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('labels.title_permission') }}
                            <a href="{!! url('admin/permissions/create') !!}" class="btn btn-primary btn-sm pull-right" id="create">
                                <i class="fa fa-plus-circle"></i> {{ trans('labels.label_add_permission') }}
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
                                            <th>{{ trans('labels.label_id') }}</th>
                                            <th>{{ trans('labels.label_module') }}</th>
                                            <th>{{ trans('labels.btn_show') }}</th>
                                            <th>{{ trans('labels.btn_create') }}</th>
                                            <th>{{ trans('labels.btn_update') }}</th>
                                            <th>{{ trans('labels.btn_delete') }}</th>
                                            <th>{{ trans('labels.label_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $item)    
                                        <tr class="gradeA">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->module }}</td>
                                            <td>
                                                @if ($item->see == config('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.label_no') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.label_yes') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->insert == config('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.label_no') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.label_yes') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->edit == config('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.label_no') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.label_yes') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->destroy == config('app.no_permission'))
                                                    <span style="color: red">{{ trans('labels.label_no') }}</span>
                                                @else
                                                    <span style="color: green">{{ trans('labels.label_yes') }}</span>
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
                          {{ trans('messages.no_data') }}
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
                        <h4 class="modal-title">{{ trans('labels.label_delete_permission') }} "<b><span id='idDel'></span></b>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">{{ trans('labels.confirm_delete_permission') }}</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/permissions/' . $item->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <input type="hidden" id="module" value="{{ strtolower(trans('labels.label_permissions')) }}">
                        <button type="submit" class="btn btn-danger btn-sm">{!! trans('labels.btn_delete') !!}</button>
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-dismiss="modal">{{ trans('labels.btn_cancel') }}</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        @endif
@endsection

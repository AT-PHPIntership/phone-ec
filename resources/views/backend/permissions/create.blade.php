@extends('backend.layouts.master')

@section('title', trans('labels.label_add_permission'))

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('labels.label_add_permission') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>{{ trans('messages.error') }}</strong>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ url('admin/permissions') }}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>{{ trans('labels.label_module') }}</label>
                                    <select name="module" id="module" class="form-control" required="required">
                                        @foreach ($modules as $module)
                                        <option value="{{ $module }}">{{ $module }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('labels.label_permissions') }}</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="see" value="{{ config('app.has_permission') }}">
                                            {{ trans('labels.btn_show') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="inset" value="{{ config('app.has_permission') }}">
                                            {{ trans('labels.btn_create') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="edit" value="{{ config('app.has_permission') }}">
                                            {{ trans('labels.btn_update') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="destroy" value="{{ config('app.has_permission') }}">
                                            {{ trans('labels.btn_delete') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-sm btn-default">{{ trans('labels.btn_reset') }}</button>
                                <button type="submit" class="btn btn-sm btn-primary">{{ trans('labels.btn_create') }}</button>
                            </form>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
                
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@endsection
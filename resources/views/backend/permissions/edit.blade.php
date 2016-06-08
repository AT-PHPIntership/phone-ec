@extends('backend.layouts.master')

@section('title', trans('labels.label_edit_permission'))

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('labels.label_edit_permission') }}</h1>
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
                            <form role="form" action="{{ url('admin/permissions/' . $permission->id) }}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <div class="form-group">
                                    <label>{{ trans('labels.label_module') }}</label>
                                    <select name="module" id="module" class="form-control" required="required">
                                        @foreach ($modules as $module)
                                        <option value="{{ $module }}" 
                                        {!! $module == $permission->module ? 'selected' : '' !!}
                                        >
                                            {{ $module }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('labels.label_permissions') }}</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="see" value="{{ $permission->see }}" 
                                            {!! $permission->see == config('app.has_permission') ? 'checked' : '' !!}
                                            >
                                            {{ trans('labels.btn_show') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="insert" value="{{ $permission->insert }}" 
                                            {!! $permission->insert == config('app.has_permission') ? 'checked' : '' !!}
                                            >
                                            {{ trans('labels.btn_create') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="edit" value="{{ $permission->edit }}" 
                                            {!! $permission->edit == config('app.has_permission') ? 'checked' : '' !!}
                                            >
                                            {{ trans('labels.btn_update') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="destroy" value="{{ $permission->destroy }}" 
                                            {!! $permission->destroy == config('app.has_permission') ? 'checked' : '' !!}
                                            >
                                            {{ trans('labels.btn_delete') }}
                                        </label>
                                    </div>
                                </div>
                                <a class="btn btn-sm btn-default" href="{!! url('admin/permissions') !!}" name="cancel">{{ trans('labels.btn_cancel') }}</a>
                                <input type="submit" class="btn btn-sm btn-primary" value="{{ trans('labels.btn_update') }}">
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

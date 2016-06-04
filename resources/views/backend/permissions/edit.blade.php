@extends('backend.layouts.master')

@section('title', 'Create Admin Users')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('labels.labelEditPermission') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>{{ trans('labels.LabelError') }}</strong>
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
                                    <label>{{ trans('labels.labelModule') }}</label>
                                    <select name="module" id="module" class="form-control" required="required">
                                        @foreach ($modules as $module)
                                        <option value="{{ $module }}" 
                                        @if ($module == $permission->module)
                                            selected
                                        @endif    
                                        >
                                            {{ $module }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('labels.LabelPermissions') }}</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="see" value="1" 
                                            @if ($permission->see == \Config::get('app.has_permission'))
                                                checked
                                            @endif
                                            >
                                            {{ trans('labels.BtnShow') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="create" value="1" 
                                            @if ($permission->addNew == \Config::get('app.has_permission'))
                                                checked
                                            @endif
                                            >
                                            {{ trans('labels.BtnCreate') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="update" value="1" 
                                            @if ($permission->edit == \Config::get('app.has_permission'))
                                                checked
                                            @endif
                                            >
                                            {{ trans('labels.BtnUpdate') }}
                                        </label>

                                        <label>
                                            <input type="checkbox" name="delete" value="1" 
                                            @if ($permission->destroy == \Config::get('app.has_permission'))
                                                checked
                                            @endif
                                            >
                                            {{ trans('labels.BtnDelete') }}
                                        </label>
                                    </div>
                                </div>
                                <a class="btn btn-sm btn-default" href="{!! url('admin/permissions') !!}" name="cancel">{{ trans('labels.BtnCancel') }}</a>
                                <input type="submit" class="btn btn-sm btn-primary" name="edit">{{ trans('labels.BtnUpdate') }}>
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

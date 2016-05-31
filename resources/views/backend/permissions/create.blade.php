@extends('backend.layouts.master')

@section('title', 'Create Admin Users')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new permission</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Whoops! Something went wrong!</strong>
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
                                            <label>Module</label>
                                            <select name="module" id="module" class="form-control" required="required">
                                                @foreach ($modules as $module)
                                                <option value="{{ $module }}">{{ $module }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Permission</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="see" value="1">
                                                    Show
                                                </label>

                                                <label>
                                                    <input type="checkbox" name="create" value="1">
                                                    Create
                                                </label>

                                                <label>
                                                    <input type="checkbox" name="update" value="1">
                                                    Update
                                                </label>

                                                <label>
                                                    <input type="checkbox" name="delete" value="1">
                                                    Delete
                                                </label>
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
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
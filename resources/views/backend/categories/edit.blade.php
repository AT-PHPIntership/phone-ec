@extends('backend.layouts.master')

@section('title', trans('labels.update_cate'))

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! trans('labels.edit_cate') !!}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row --> 
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @if ($errors && $errors->any())
                        <div class="alert alert-danger">
                            {!! trans('labels.prolem_input') !!}
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ url('admin/categories/'.$data->id) }}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    {!! method_field('PATCH') !!}
                                    <div class="form-group">
                                        <label>Category Parent</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="0">----------Root----------</option>                                     
                                            @foreach($cates as $cate)
                                                <option value="{{ $cate->id }}" {!! $cate->id == $data->parent_id ? "selected" : "" !!}>{{ $cate->cate_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="cate_name" value="{!! $data->cate_name !!}">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Description</label>
                                        <textarea class="form-control" name="cate_description">{!! $data->cate_description !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" class="form-control" name="cate_image">
                                    </div>
                                    <div class="form-group">
                                        <label>Category status</label>
                                            <div class="radio">
                                                <label class="radio-inline">
                                                  <input type="radio" name="cate_status" value="1" {{ ($data->cate_status == 1) ? "checked" : "" }}>
                                                  <font color="green">Active</font>                                                
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="cate_status" value="0" {{ ($data->cate_status == 0) ? "checked" : "" }}>
                                                  <font color="red">Deactive</font>
                                                </label>
                                            </div> 
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
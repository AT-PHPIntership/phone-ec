@extends('backend.layouts.master')

@section('title', 'Create Products')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row --> 
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            {!! trans('messages.proleminput') !!}
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
                                <form role="form" action="{{ url('admin/categories') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                       
                                        <label>Category Parent</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="" selected disabled style="display:none">Please choose category parent</option>
                                            <option value="0">----------Root----------</option>
                                            @foreach($cates as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                                                    @foreach($cate['children'] as $childFirst)
                                                        <option value='{{ $childFirst->id }}'>-- {{ $childFirst->cate_name }}</option> 
                                                        @foreach($childFirst['children'] as $childSecond)
                                                            <option value='{{ $childSecond->id }}'>---- {{ $childSecond->cate_name }}</option>
                                                            @foreach($childSecond['children'] as $childThree)
                                                                <option value='{{ $childThree->id }}'>------ {{ $childThree->cate_name }}</option>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </li>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="cate_name" value="{!! old('cate_name') !!}">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Description</label>
                                        <textarea class="form-control" name="cate_description">{!! old('cate_description') !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" class="form-control" name="cate_image">
                                    </div>
                                    <div class="form-group">
                                        <label>Category status</label>
                                            <div class="radio">
                                                <label class="radio-inline">
                                                  <input type="radio" name="cate_status" value="1" checked>
                                                  <font color="green">Active</font>                                                
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="cate_status" value="0">
                                                  <font color="red">Deactive</font>
                                                </label>
                                            </div> 
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
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
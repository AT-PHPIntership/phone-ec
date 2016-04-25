@extends('backend.layouts.master')

@section('title', 'Create Products')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @include('common.errors')
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Brands</label>
                                            <select class="form-control" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image">
                                        </div>
                                        <div class="form-group">
                                            <label>Old price</label>
                                            <input class="form-control" type="number" min="1000" step="1000" name="old_price" value="{{ old('old_price') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Current price</label>
                                            <input class="form-control" type="number" min="1000" step="1000" name="current_price" value="{{ old('current_price') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control" type="number" min="1" step="1" name="quantity" value="{{ old('quantity') }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Desciprtion</label>
                                            <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Parameter</label>
                                            <textarea class="form-control" rows="5" name="des_tech">{{ old('des_tech') }}</textarea>
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
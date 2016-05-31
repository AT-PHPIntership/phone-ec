@extends('backend.layouts.master')

@section('title', 'Create Admin Users')

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new admin user</h1>
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
                                    <form role="form" action="{{ url('admin/accounts') }}" method="POST" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label>Status : </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline1" value="1" checked=""> Activated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadiosInline2" value="0">Deactivated
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <div class="panel panel-default">
                                              <!-- Default panel contents -->
                                              <div class="panel-heading"><strong>Group Role:</strong></div>
                                            @foreach ($group as $value)  
                                                <div class="panel-body">
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="{{ $value['id'] }}" name="{{ $value['name'] }}">
                                                    {{ $value['name'] }}
                                                </label>
                                                </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">Module</th>
                                                            <th style="text-align: center;">Show</th>
                                                            <th style="text-align: center;">Create</th>
                                                            <th style="text-align: center;">Update</th>
                                                            <th style="text-align: center;">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($groupPermission as $valuePermission)
                                                        @if ($value['name'] == $valuePermission->name)
                                                        <tr>
                                                            <td style="text-align: center">
                                                                {{ $valuePermission->module }}
                                                            </td>
                                                            <td style="text-align: center">
                                                                @if ($valuePermission->see == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                                @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                                @endif
                                                            </td>
                                                            <td style="text-align: center">
                                                                @if ($valuePermission->addNew == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                                @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                                @endif
                                                            </td>
                                                            <td style="text-align: center">
                                                                @if ($valuePermission->edit == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                                @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                                @endif
                                                            </td>
                                                            <td style="text-align: center">
                                                                @if ($valuePermission->destroy == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                                @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
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
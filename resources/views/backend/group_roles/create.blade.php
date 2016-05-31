@extends('backend.layouts.master')

@section('title', 'Create Group Role')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add new group role</h1>
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
                            <form role="form" action="{{ url('admin/groups') }}" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>Group Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter group name">
                                </div>
                                <div class="form-group">
                                    <label>Group Permission</label>
                                    <?php
                                        $keyed = $permissions->keyBy('module');
                                    ?>
                                    @foreach ($keyed as $key => $module)
                                        <div class="panel panel-default">
                                          <!-- Default panel contents -->
                                          <div class="panel-heading"><strong>{{ $key }}</strong></div>
                                          
                                          <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Show</th>
                                                        <th style="text-align: center;">Create</th>
                                                        <th style="text-align: center;">Update</th>
                                                        <th style="text-align: center;">Delete</th>
                                                        <th style="text-align: center;">
                                                        <a href="#" class="btn btn-default btn-md clear" id="{{ $key }}">Clear Select</a>
                                                        <input type="hidden" value="{{ $key }}">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($permissions as $role)

                                                    @if ($role['module'] == $key)
                                                    <tr>
                                                        <td style="text-align: center">
                                                            @if ($role['see'] == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                            @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if ($role['addNew'] == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                            @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if ($role['edit'] == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                            @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if ($role['destroy'] == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                                            @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="{{$key}}" id="{{$key}}" value="{{ $role['id'] }}">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
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
<script>
    $(document).ready(function(){
        $(document).on('click',".clear", function(){
            var key = $(this).next().val();
            $('input:radio[name='+key+']:checked').prop('checked', false).checkboxradio("refresh");
        });
    });
</script>
@endsection
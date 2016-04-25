@extends('backend.layouts.master')

@section('title', 'Rating Manage')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rating</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Rating Manage
                        <div class="clearfix"></div>
                    </div> 
                    <!-- /.panel-heading -->
                    @if (count($ratings) > 0)
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Brand</th>
                                            <th>Username</th>
                                            <th>Score</th>
                                            <th>Comment</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ratings as $rating)
                                            <tr class="odd gradeX">
                                                <td>{{ $rating['id'] }}</td>
                                                <td><img src="{{ asset('upload/'.$rating->products->image) }} " alt="" width="80" height="80"></td>
                                                <td>{{ $rating->products->name }}</td>
                                                <td>{{ $rating->products->brands->brand_name }}</td>
                                                <td>{{ $rating->users->name }}</td>
                                                <td>{{ $rating->score }}</td>
                                                <td>{{ $rating->comment }}</td>
                                                <td class="text-right">
                                                    <button type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></button>
                                                    <input type="hidden" value="{{ $rating->id }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            {!! $ratings->links() !!}
                        </div> 
                        <!-- /.panel-body -->
                    @else
                        <div class="alert alert-info">
                            <strong>Info!</strong> There are no rates.
                        </div>
                    @endif
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    @if (count($ratings) > 0)
        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete a rating "<span id='idDel'></span>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">Are you sure delete this rating?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/rating/'.$rating->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function(){
            $(document).on('click',".btnDel", function(){
                var id = $(this).next().val();
                $('form').attr('action','rating/'+id);
                $('#idDel').text(id);
            });
        });
    </script>
@endsection

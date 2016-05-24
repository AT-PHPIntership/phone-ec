@extends('backend.layouts.master')

@section('title', 'Contact manage')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contact</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                    @if (count($contacts))
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email(s)</th>
                                            <th>Enquiry</th>
                                            <th>Create At</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $itemContact)
                                        <tr class="gradeA">
                                            <td>{{ $itemContact->id }}</td>
                                            <td>{{ $itemContact->name }}</td>
                                            <td>{{ $itemContact->email }}</td>
                                            <td>{{ $itemContact->enquiry }}</td>
                                            <td>{{ date('Y-m-d',strtotime($itemContact->created_at)) }}</td>
                                            <td class="text-center">
                                                <a name="show" href="{{ url('admin/contact/'.$itemContact->id) }}" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-eye"></i></a>
                                                <a name="del" type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></a>
                                                <input type="hidden" value="{{ $itemContact->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    @else 
                        <br>
                        <div class="alert alert-info">
                          <strong>Info!</strong> There are no contact!
                        </div>
                    @endif  
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        @if (count($contacts) > 0 )
        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Contact "<b><span id='idDel'></span></b>"</h4>
                    </div>
                    <div class="modal-body text-center alert alert-danger">
                        <h3 class="text-danger">Are you sure delete this contact?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/contact/'.$itemContact->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-dismiss="modal">Cancel</button>
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
                    $('form').attr('action','contact/'+id);
                    $('#idDel').text(id);
                });
            });
        </script>
@endsection
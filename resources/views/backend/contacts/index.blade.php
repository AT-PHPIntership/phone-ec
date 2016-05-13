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
                                            <td class="text-center">
                                                <a href="{{ url('admin/contact/'.$itemContact->id) }}" class="btn btn-circle btn-outline btn-primary" ><i class="fa fa-eye"></i></a>
                                            </td> 
                                            <td>     
                                                <form action="{!! url('admin/contact/'. $itemContact->id .'') !!}" method="POST" role="form">
                                                    {!! csrf_field() !!}
                                                    {!! method_field('DELETE') !!}
                                                    <button type="submit" data-toggle="modal" data-target="#confirmDelete" class="btn btn-circle btn-outline btn-danger btnDel"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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

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
                            <strong>Information contact of user:</strong> 
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <p><strong>Name:</strong> {{ $contact->name }}</p>
                                <p><strong>Email:</strong> {{ $contact->email }}</p>
                                <p><strong>Enquiry:</strong> {{ $contact->enquiry }}</p>
                                <p><strong>Day send contact:</strong> {{ date('Y-m-d', strtotime($contact->created_at)) }}</p>
                                <a class="btn btn-sm btn-primary" href="{!! url('admin/contact') !!}">Cancel</a>
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
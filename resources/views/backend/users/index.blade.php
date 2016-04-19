@extends('backend.layouts.master')

@section('title', 'Users manage')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                            <button type="button" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add new user</button>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">5</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td class="center">5.5</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td class="center">6</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td class="center">7</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td class="center">6</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">
                                            <button type="button" class="btn btn-circle btn-outline btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-circle btn-outline btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
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
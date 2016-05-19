@extends('frontend.layouts.master')

@section('title', 'Orders Manage')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                     
                    <!-- /.panel-heading -->
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                       
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                 <div id="dataTables-example_filter" class="dataTables_filter">

                                 <form action="{{url('orders-tracking')}}" method="post">
                                 {{csrf_field()}}
                                    <label>Search:
                                    <input class="form-control input-sm" type="text" placeholder="" name="searchorders" aria-controls="dataTables-example" required="">
                                    </label>

                                    <label>Email:
                                    <input class="form-control input-sm" type="email" placeholder="" name="email" aria-controls="dataTables-example" required="">
                                    </label>
                                    
                                    <button type="submit" name="Search" id="search" value="search">Search</button>              
                                                 
                                    
                                </form>
                                </div>
                            </div>
                            <!-- /.table-responsive --> 
                            <h2></h2> 
                            
                            <h2>
                            @if (!empty($orderItem))
                            Your order status:  
                                @if ($orderItem->status == 1)
                                    Orders are comfirmed
                                    Orders was moved
                                @elseif ($orderItem->status == 3)
                                    Orders was shipped successfully
                                @endif
                             @endif
                            </h2>
                            

                         
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

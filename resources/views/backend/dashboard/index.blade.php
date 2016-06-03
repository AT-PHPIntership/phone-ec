@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Report</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  @if (count($data) > 0)
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Total Order Chart</h3>
              <div class="box-tools">
                  <a href="{{ action('Backend\DashboardController@index', 'DAYNAME') }}" class="btn btn-sm btn-success">With Day</a>
                  <a href="{{ action('Backend\DashboardController@index', 'MONTHNAME') }}" class="btn btn-sm btn-success">With Month</a>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px; margin-top:10px"></div>
            </div><!-- /.box-body-->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Top 3 User</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">

                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name User</th>
                  <th>Total Order</th>
                  <th>Date</th>
                </tr>
              @foreach ($data['user'] as $key => $value)
                <tr>
                  <td>{{ $key }}.</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->total }}</td>
                  <td>{{ $value->date }}</td>
                </tr>
              @endforeach  
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Top 3 Product</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name Product</th>
                  <th>Total Order</th>
                  <th>Date</th>
                </tr>
              @foreach ($data['product'] as $key => $value)
                <tr>
                  <td>{{ $key }}.</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->total }}</td>
                  <td>{{ $value->date }}</td>
                </tr>
              @endforeach                
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div>
    </section><!-- /.content -->
  @else
    <div class="alert alert-info">
        <strong>Info!</strong> There are no order.
    </div>
  @endif
</div>
@endsection

@section('script')
    <script src="{!! asset('assets/backend/plugins/jquery.flot.min.js') !!}"></script>
    <script src="{!! asset('assets/backend/plugins/jquery.flot.categories.min.js') !!}"></script>
    <script>
      $(function () {
        /*
         * BAR CHART
         * ---------
         */
        // get array report from controller
        var arr = <?php echo json_encode($data['order']) ?>;

        // get condition of report (WEEKDAY or MONTH)
        var reportCondition = Object.keys(arr[0])[0];

        // check condition report then set data for char
        if (reportCondition == 'DAYNAME') {
          //set value default for bar_data
          var bar_data = {
            data: [["Monday", 0], ["Tuesday", 0], ["Wednesday", 0], ["Thursday", 0], ["Friday", 0], ["Saturday", 0], ["Sunday", 0]],
            color: "#3c8dbc"
          };

          // set value for bar_data with arr report
          for (i=0; i < bar_data.data.length; i++)
          {
            for (var j = 0; j < arr.length; j++) {
              if (arr[j].DAYNAME == bar_data.data[i][0]) {
                bar_data.data[i][1] = arr[j].total;
              }
            }
          }
        } else if (reportCondition == 'MONTHNAME') {
          //set value default for bar_data
          var bar_data = {
            data: [["January", 0], ["February", 0], ["March", 0], ["April", 0], ["May", 0], ["June", 0], ["July", 0], ["August", 0], ["September", 0], ["October", 0], ["November", 0], ["December", 0]],
            color: "#3c8dbc"
          };

          // set value for bar_data with arr report
          for (i=0; i < bar_data.data.length; i++)
          {
            for (j = 0; j < arr.length; j++) {
              if (arr[j].MONTHNAME == bar_data.data[i][0]) {
                bar_data.data[i][1] = arr[j].total;
              }
            }
          }
        }
        
        $.plot("#bar-chart", [bar_data], {
          grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#f3f3f3",
            leftColor: "red"
          },
          series: {
            bars: {
              show: true,
              barWidth: 0.5,
              align: "center"
            }
          },
          xaxis: {
            mode: "categories",
            tickLength: 0
          }
        });

      });
    </script>
@endsection

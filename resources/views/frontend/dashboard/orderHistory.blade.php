@extends('frontend.layouts.master')

@section('title', 'Order History')

@section('sidebar')
	@parent
    <!-- sidebar content -->
    @section('categorys-list')
      <!-- parent -->
    @stop
    @section('account-links')
      @parent
    @stop
    @section('best-sellers-products')
      <!-- parent -->
    @stop
    @section('latest-products')
      @parent
    @stop
    @section('banner')
      <!-- parent -->
    @stop
    <!-- sidebar content end -->
@endsection

@section('slider')
	<!-- parent -->
@endsection

@section('breadcrumb')
	@parent
@endsection

@section('content')
<h1>Order History</h1>
<h2>Recent Orders</h2>
<div class="bottom-padding">
    <!-- Table  -->
    <table class="form">
        <thead>
            <tr class="first last">
                <th>#</th>
                <th>Date</th>
                <th>Ship To</th>
                <th><span class="nobr">Order Total</span></th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>100000022</td>
                <td>4/30/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1,306.84</span></td>
                <td class="text-primary"><em>New</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Performed</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Canceled</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Performed</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Pending</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Canceled</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Pending</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Performed</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Performed</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
            <tr>
                <td>100000021</td>
                <td>3/03/14</td>
                <td>Mr. Atiar</td>
                <td><span class="price">$1702.04</span></td>
                <td class="text-color"><em>Canceled</em></td>
                <td class="text-center last">
                  <a href="#" class="button">View Order</a>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Table  -->
    <!--Pagination Part Start-->
    <div class="pagination">
      <div class="links"> <b>1</b> <a href="#">2</a> <a href="#">&gt;</a> <a href="#">&gt;|</a></div>
      <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
    </div>
    <!--Pagination Part End-->
</div>
@endsection
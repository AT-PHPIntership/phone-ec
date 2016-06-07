@extends('backend.layouts.master')

@section('title', 'Chat Work')

@section('content')
 <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chat Work</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="chat" id="chatwindow">
      
                  </div>
                  
                <!-- /.box-body -->
                <div class="box-footer">
                  <div id="form">
                    <textarea   name="message" id="messagebox" placeholder="Message : "></textarea>
                  </div>
                </div>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection

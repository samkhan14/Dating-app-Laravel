@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')


        
          <div class="col-sm-8 col-sm-offset-4">
          <h1 class="chat-header">welcome, <span id="username">{{ $username}}</span></h1>
          <div class="chat-window"></div>
          <div class="col-sm-12">
          <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
          <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="isNotTyping()">
          </div>
          </div>
@endsection           
          
 
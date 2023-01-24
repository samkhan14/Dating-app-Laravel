<?php use App\User; ?>

@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')

     <div class="main-form" id="grad1">
      <div class="row justify-content-center ">
      <div class="col-12 col-sm-12 text-center p-0">
          <div class="card">
              <h2><strong>Friends List</strong></h2> 
              @if(Session::has('flash_message_error'))         
              <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong> {{ session('flash_message_error') }}</strong>
              </div>
            @endif
      
            @if(Session::has('flash_message_success'))         
              <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong> {{ session('flash_message_success') }}</strong>
              </div>
            @endif
                         
              <div class="row">
            <div class="col-sm-12 mx-0">  
                            
                <table id="responses" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>                            
                            <th>Date & Time</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($friendsList as $request)   
                    <?Php
                   
                      $sender_name = User::getName($request->id);
                       $sender_city = User::getCity($request->id);
                       $sender_username = User::getUserName($request->id);
                    
                   
                    ?>                   
                    
                        <tr align="center">                         
                            
                        <td><a target="_blank" href="{{ url('profile/'.$sender_username)}}">{{ $sender_name}}</a></td>
                        <td>{{$sender_city}}</td>                        
                        <td>{{$request->created_at}} </td>
                        <td>
                      
                        <a href="{{ url('reject-frnd-req/'.$request->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                       
                         </td>                                                                  
                        </tr>
                        @endforeach
                    </tbody>
                            
                </table>
                  </div>
                       
              </div>
        
          </div>
          
          
      </div>
      </div>
      </div>

      @endsection

      {{--    js section  ============================================ --}}

      <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

      <!--<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>-->
       
  
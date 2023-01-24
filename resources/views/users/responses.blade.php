<?php use App\User; ?>

@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')


      <!-- review Form -->
      <div class="main-form" id="grad1">
      <div class="row justify-content-center ">
      <div class="col-12 col-sm-12 text-center p-0">
          <div class="card">
              <h2><strong>Your Responses and all history are here</strong></h2> 
              
             <!--response notification code-->
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
            <div class="col-md-12 mx-0">  
                            
                <table id="responses" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Response</th>
                            <th>Date & Time</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($responses as $response)                      
                    <?php
                        $sender_name = User::getName($response->sender_id);
                        $sender_city = User::getCity($response->sender_id);
                        $sender_username = User::getUserName($response->sender_id);
                        $encoded_msg = encrypt($response->message);
                    ?>
                        <tr align="center">
                         
                             @if($response->seen == 0)
                             <?php $bold_response = 'style=font-weight:bold;'; ?>
                             @else
                             <?php $bold_response = 'style=font-weight:normal;'; ?>
                             @endif   
                        <td {{ $bold_response }}>{{ $sender_name}}</td>
                        <td>{{$sender_city}}</td>
                        <td><?php echo nl2br($response->message); ?> <a title="View Details" href="#"></a></td>
                        <td>{{$response->created_at}}</td> 
                        <td>                       
                       
                        <a href="{{ url('contact/'.$sender_username.'?encoded_msg='.$encoded_msg)}}" target="_blank"><i class="fa fa-reply" aria-hidden="true"></i></a>&nbsp;

                        <a rel="{{ $response->id}}" class="deleteResponse" href="javascript:"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                        
                        <a title="View Details" href="#response_details{{ $response->id }}" data-toggle="modal" data-target="#response_details" data-ticket-type="pro-access">View
                        <i class="fa fa-file-text-o" aria-hidden="true"></i></a>&nbsp;
                                            {{-- modal code --}}
                        {{-- <div id="response_details{{ $response->id }}" class="modal fade">          
                            <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                            {{-- </button>
                        <h4 class="modal-title">Response Msg</h4>                     
                        </div>
                        <div class="modal-body">
                            {{ $response->message}}                        
                        </div><!-- /.modal-content -->                  
                    </div> <!-- /.modal id -->       --}}
      
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

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

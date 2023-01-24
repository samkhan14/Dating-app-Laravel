<?php use App\User; ?>

@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')    


      <!-- review Form -->

      <div class="main-form" id="grad1">
        <div class="row justify-content-center ">
        <div class="col-12 col-sm-12 text-center p-0">
            <div class="card">

              <h2><strong>Send Messages History</strong></h2>              

              <div class="row">

            <div class="col-sm-12 mx-0">              

                <table id="responses" class="display" style="width:100%">

                    <thead>

                        <tr>

                            <th>Name</th>

                            <th>Location</th>

                            <th>Message</th>

                            <th>Date & Time</th>

                            <th>Actions</th>

                           

                            

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($sent_msg as $msg)                      

                    <?php

                    $receiver_name = User::getName($msg->receiver_id);

                    $receiver_city = User::getCity($msg->receiver_id);

                     ?>

                        <tr>

                        <td>{{ $receiver_name}}</td>

                        <td>{{$receiver_city}}</td>

                        <td>{{ $msg->message}}</td>

                        <td>{{$msg->created_at}}</td>

                        <td><a href="" target="_blank"><i class="fa fa-reply" aria-hidden="true"></i></a>



                            <a   href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                            

                            <a title="View Details" href="#">View

                            <i class="fa fa-file-text-o" aria-hidden="true"></i></a></td>                                                    

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





@extends('layouts.frontLayouts.front_design')

@section('content')




          <div class="row py-5 px-4">

            <div class="col-xl-10 col-md-8 col-sm-10 mx-auto">

                <!-- Profile widget -->

                <div class="bg-white shadow rounded overflow-hidden">

                    <div class="px-4 pt-0 pb-4 bg-dark">

                        <div class="media align-items-end profile-header">

                            @foreach($user_detail->photos as $key => $photo)

                                @if($photo->default_photo == "Yes")

                                <?php  $user_photo = $user_detail->photos[$key]->photo;  ?>

                                @else

                                <?php $user_photo = $user_detail->photos[0]->photo; ?>

                                @endif

                                @endforeach



                                @if(!empty($user_photo))

                            <div class="profile mr-3">

                                <img src="{{ asset('img/frontend_images/photos/'.$user_photo)}}" alt="..." width="160" class="rounded mb-1 img-thumbnail">

                                <a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a>

                            </div>



                            @else

                            <div class="profile mr-3">

                              <img src="{{ asset('img/frontend_images/site/default-photo.png')}}" alt="..." width="160" class="rounded mb-1 img-thumbnail">



                          </div>

                            @endif



                             <div class="media-body mb-5 text-white">

                                <h4 class="mt-0 mb-0">{{ $user_detail->name}}</h4>



                                 <p class="small mb-4"> <i class="fa fa-map-marker mr-2"> {{ $user_detail->details->country}}</i>

                                    </p>

                            </div>

                                {{--

                            <div class="media-body mb-5  text-white">

                              <div class="float-right mb-4">

                                <a  href="" ><h4>Contact me</h4></a>

                              </div>



                            </div> --}}

                        </div>

                    </div>



                    <div class="bg-light p-4 d-flex justify-content-end text-center under-menu">

                        <ul class="list-inline mb-0">

                            <li class="list-inline-item">

                                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>

                            </li>

                            <li class="list-inline-item">

                                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>

                            </li>

                            <li class="list-inline-item">

                                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Following</small>

                            </li>

                            <li class="list-inline-item">

                                <h5 class="font-weight-bold mb-0 d-block">25</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Friends</small>

                            </li>

                            <li class="list-inline-item">

                                <h5 class="font-weight-bold mb-0 d-block"></h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>More</small>

                            </li>

                        </ul>





                    </div>









                    <div class="py-4 px-4">

                        <div class="container">

                            {{-- <h1>Bootstrap 4 Vertical Nav Tabs</h1> --}}

                            @if(Auth::check())

                              @if(Auth::User()->username == $user_detail->username)

                            <a href="{{ url('/step/2')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a> &nbsp;

                            @else

                            <a href="{{ url('/contact/'.$user_detail->username)}}"><i class="fa fa-comment"></i> Contact me</a> &nbsp;

                            @endif

                            @else

                            <a href="{{ url('/contact/'.$user_detail->username)}}"><i class="fa fa-comment"></i> Send Message </a> &nbsp;

                            @endif







                            @if(!empty($friendReq))

                            @if(Auth::check() && Auth::User()->username != $user_detail->username)

                            <strong>

                              @if($friendReq== "Add Friend")

                            <a href="{{ url('/add-friend/'.$user_detail->username)}}" style="color: red"><i class="fa fa-user-plus" aria-hidden="true"></i> {{$friendReq}}</a>



                             @elseif($friendReq=="Unfriend")

                            <a href="{{ url('/remove-friend/'.$user_detail->username)}}" style="color:green"><i class="fa fa-minus-square" aria-hidden="true"></i> {{$friendReq}}</a>



                            @elseif($friendReq=="Confirm Friend Request")

                            <a href="{{ url('/confirm-frnd-req/'.$user_detail->username)}}" style="color:green"><i class="fa fa-minus-square" aria-hidden="true"></i> {{$friendReq}}</a>



                            @else

                          <span style="color:green;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> &nbsp; {{$friendReq}}</span>

                          @endif

                          </strong>

                          @endif

                          <br>

                            @endif

                          <hr>

                          <div class="row">

                            <div class="col-md-2 mb-3">

                                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">

                          <li class="nav-item">

                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>

                          </li>

                          <li class="nav-item">

                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About me</a>

                          </li>

                          <li class="nav-item">

                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Education & Carrier</a>

                          </li>

                          <li class="nav-item">

                            <a class="nav-link" id="Photos-tab" data-toggle="tab" href="#Photos" role="tab" aria-controls="Photos" aria-selected="false">Photos</a>

                          </li>

                        </ul>

                            </div>

                            <!-- /.col-md-4 -->

                                <div class="col-md-10">

                              <div class="tab-content" id="myTabContent">

                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



                            <!-- ======= Recent profiles  Section ======= -->

          <section id="team" class="team">

            <div class="container">



              <div class="section-title" data-aos="fade-up">

                <h2>Friends List</h2>



              </div>



              <div class="row">

                @if(count($friendsList)>0)

                <?php $count = 1; ?>

                @foreach($friendsList as $user)

                @if(!empty($user->details) && $user->details->status == 1)

                  @if($count<=4)

                  @if(Auth::check())

                  @if(Auth::user()->username != $user->details->username)

                  <div class="col-lg-4 col-md-6 ">

                    @foreach($user->photos as $key => $photo)

                    @if($photo->default_photo == "Yes")

                    <?php  $user_photo = $user->photos[$key]->photo;  ?>

                    @else

                    <?php $user_photo = $user->photos[0]->photo; ?>

                    @endif

                    @endforeach



                  <div class="member" data-aos="zoom-in">



                      @if(!empty($user_photo))

                    <div class="pic">

                      <a href="{{ url('profile/'.$user->username)}}">

                    <img src="{{ asset('img/frontend_images/photos/'.$user_photo)}}" class="img-fluid" alt=""></a></div>



                    @else



                    <div class="pic">

                    <a href="">

                      <img src="{{ asset('img/frontend_images/site/default-photo.png')}}" class="img-fluid" alt=""></div>

                    @endif



                    <div class="member-info">

                    <h4>{{$user->name}}</h4>

                      <span>

                        {{-- conver dob to age --}}

                        <?php

                        echo $diff = date('Y') - date('Y',strtotime($user->details->dob));  ?> Yrs

                      </span>

                      <div class="social">

                        <!-- <a href=""><i class="icofont-twitter"></i></a>

                        <a href=""><i class="icofont-facebook"></i></a>

                        <a href=""><i class="icofont-instagram"></i></a> -->

                        <a href="#chatme{{ $user->id}}">Connect With me</i></a>

                      </div>

                    </div>

                  </div>

                </div>

                @endif

                @else

                <div class="col-lg-4 col-md-6 ">

                  @foreach($user->photos as $key => $photo)

                  @if($photo->default_photo == "Yes")

                  <?php  $user_photo = $user->photos[$key]->photo;  ?>

                  @else

                  <?php $user_photo = $user->photos[0]->photo; ?>

                  @endif

                  @endforeach



                <div class="member" data-aos="zoom-in">



                    @if(!empty($user_photo))

                  <div class="pic">

                    <a href="{{ url('profile/'.$user->username)}}">

                  <img src="{{ asset('img/frontend_images/photos/'.$user_photo)}}" class="img-fluid" alt=""></a></div>



                  @else



                  <div class="pic">

                  <a href="">

                    <img src="{{ asset('img/frontend_images/site/default-photo.png')}}" class="img-fluid" alt=""></div>

                  @endif



                  <div class="member-info">

                  <h4>{{$user->name}}</h4>

                    <span>

                      {{-- conver dob to age --}}

                      <?php

                      echo $diff = date('Y') - date('Y',strtotime($user->details->dob));  ?> Yrs

                    </span>

                    <div class="social">

                      <!-- <a href=""><i class="icofont-twitter"></i></a>

                      <a href=""><i class="icofont-facebook"></i></a>

                      <a href=""><i class="icofont-instagram"></i></a> -->

                      <a href="#chatme{{ $user->id}}">Connect With me</i></a>

                    </div>

                  </div>

                </div>

              </div>

                @endif

                <?php $count = $count+1; ?>

                @endif

                @endif

                @endforeach

                @else

                 <h2>No Friends</h2>

                @endif

              </div>

            </div>

          </section><!-- End Team Section -->

                          </div>

                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                          <h2>Here All Information about me </h2>

                          <div class="table-responsive">

                            <table class="table table-striped table-hover table-bordered">

                              <thead>

                                <tr>

                                      <th>Full Name</th>



                                      <th>Profile Id</th>



                                      <th>Date of Birth</th>



                                      <th>Gender</th>



                                      <th>Height</th>



                                      <th>Marital Status</th>



                                      <th>Body Type</th>



                                      <th>Country</th>



                                      <th>City</th>



                                      <th>State</th>



                                      <th>Language's</th>



                                      <th>Hobbies</th>







                                </tr>



                              </thead>



                              <tbody>



                                <tr>



                                  <td>{{$user_detail->name}}</td>



                                  <td>{{$user_detail->details->username}}</td>



                                  <td>{{$user_detail->details->dob}}</td>



                                  <td>{{$user_detail->details->gender}}</td>



                                  <td>{{$user_detail->details->height}}</td>



                                  <td>{{$user_detail->details->marital_status}}</td>



                                  <td>{{$user_detail->details->body_type}}</td>



                                  <td>{{$user_detail->details->country}}</td>



                                  <td>{{$user_detail->details->city}}</td>



                                  <td>{{$user_detail->details->state}}</td>



                                  <td>{{$user_detail->details->languages}}</td>



                                  <td>{{$user_detail->details->hobbies}}</td>



                                 </tr>



                                 <tr>

                                   <th>About MySelf</th>

                                   <th>About My Prefered Partner</th>

                                 </tr>



                                 <tr>

                                 <td> {{ $user_detail->details->about_myself}}</td>

                                 <td> {{ $user_detail->details->about_partner}}</td>

                                 </tr>



                              </tbody>



                            </table>







                            </div>

                          </div>

                          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                          <h2>Education & Carrier</h2>

                          <div class="table-responsive">

                            <table class="table table-striped table-hover table-bordered">

                              <thead>

                                <tr>

                                      <th>Education</th>



                                      <th>Occupation</th>



                                      <th>Income</th>



                                </tr>



                              </thead>



                              <tbody>



                                <tr>



                                  <td>{{$user_detail->details->education}}</td>



                                  <td>{{$user_detail->details->occupation}}</td>



                                  <td>{{$user_detail->details->income}}</td>



                                 </tr>





                              </tbody>



                            </table>







                            </div>

                          </div>



                          <div class="tab-pane fade" id="Photos" role="tabpanel" aria-labelledby="Photos-tab">

                            <h2>My Portfolio</h2>

                            <hr>



                            <div class="imgal-container">

                              @foreach($user_detail->photos as $key => $photo)

                              <br>

                              <img src="/img/frontend_images/photos/<?php echo $user_detail->photos[$key]->photo?>" alt="Image Alt Text" class="imgal-img">





                              @endforeach



                            </div>





                            </div>

                          </div>





                        </div>

                            </div>

                            <!-- /.col-md-8 -->

                          </div>







                        </div>

                        <!-- /.container -->





                            {{-- <div class="row">

                                <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/nicole-honeywill-546848-unsplash_ymprvp.jpg" alt="" class="img-fluid rounded shadow-sm"></div>

                                <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294927/dose-juice-1184444-unsplash_bmbutn.jpg" alt="" class="img-fluid rounded shadow-sm"></div>

                                <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294926/cody-davis-253925-unsplash_hsetv7.jpg" alt="" class="img-fluid rounded shadow-sm"></div>

                                <div class="col-lg-6 pl-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/tim-foster-734470-unsplash_xqde00.jpg" alt="" class="img-fluid rounded shadow-sm"></div>

                            </div>

                            <div class="py-4">

                                <h5 class="mb-3">Recent posts</h5>

                                <div class="p-4 bg-light rounded shadow-sm">

                                    <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

                                    <ul class="list-inline small text-muted mt-3 mb-0">

                                        <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>

                                        <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>

                                    </ul>

                                </div>

                            </div> --}}



                    </div>

                </div><!-- End profile widget -->



            </div>

        </div>

        @endsection






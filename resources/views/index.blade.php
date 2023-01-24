<?php
use App\Country;
use App\User;
?>

@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.front_header')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
        <div class="infoForslide">
          <h1>This Platform for those Peoples who want take rest yourself</h1>
          <h2>Many packges available here for you which you want.please visit here below </h2>
          {{-- <a href="#about" class="btn-get-started scrollto">Come for SignUp</a> --}}
        </div>
      </div>
       <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
       
        
      </div> 
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

   <!-- ======= Searching area  Section ======= -->  
   
   <section class="search-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h3 style="color:whitesmoke; text-align: center;">Public Chat</h3>
          @if(Auth::check())
    <h3><a href="{{ url('/chat/'.Auth::User()['username'])}}" target="_blank"> Live Chat</a></h3>
    @endif
      <iframe src="https://www6.cbox.ws/box/?boxid=847392&boxtag=qFBzIQ" width="100%" height="450" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>	
       </div>
        </div>
        <div class="col-sm-6">
          
        </div>
      </div>
      
</section>
   <!-- ======= Searching area  Section ======= -->  
   
   <section class="search-sec">
       <div class="container">
        <h2 class="text-center mt-0" style="color: whitesmoke">Find Your Partner</h2> &nbsp;
       <form action="{{ url('profile/search')}}" method="post" novalidate="novalidate">
        {{ csrf_field()}}
               <div class="row">
                   <div class="col-lg-12">
                       <div class="row">
                           <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                               <select class="form-control search-slt" id="exampleFormControlSelect1" name="gender">
                                   <option>Looking for ?</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                                   
                               </select> 
                           </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-0">                     
                               <select class="form-control search-slt" 
                               id="exampleFormControlSelect1" name="miniAge">
                               <option>Of Age ?</option>
                               <?php $mincount = 16;
                               while($mincount <= 48 ){ ?>                                   
                               <option value="{{ $mincount}}">{{ $mincount }}years</option>
                                   <?php $mincount = $mincount + 1; }?>                       
                               </select>
                           </div>
                             <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                               <select class="form-control search-slt" id="exampleFormControlSelect1" name="maxAge">
                                   <option>To 45 Years</option>
                                   <?php $maxcount = 16;
                                   while($maxcount <= 50){ ?>
                                   <option value="{{$maxcount}}"@if($maxcount =="32") selected @endif>{{$maxcount}}years</option>
                                   <?php $maxcount = $maxcount + 1;} ?>
                               </select>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                             <?php $getcountries = Country::get(); ?>
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="country">
                              <option value="">Anywhere</option>
                              @foreach($getcountries as $country)
                            <option value="{{$country->name}}" @if($country->name == "Pak") selected @endif > {{$country->name}}</option>
                                @endforeach                                
                            </select>
                        </div>
                           <div class="col-lg-3 col-md-2 col-sm-12 p-0">
                               <button type="submit" class="wrn-btn">Search</button>
                           </div>
                       </div>
                   </div>
               </div>
           </form>
          </div>
   </section>


  <!-- ======= Recent profiles  Section ======= -->
  <section id="team" class="team">
    <div class="container">
        
      <div class="section-title" data-aos="fade-up">
        <h2>Recent Profiles</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <?php $count = 1; ?>
        @foreach($recent_users as $user)
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
      </div>
    </div>
  </section><!-- End Team Section -->

   <!-- ======= Services ( agreement site) Section ======= -->
   <section id="services" class="services section-bg">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2> Three good reasons for Core69 </h2>
        
        <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
          <div class="icon-box-2">
            <img src="{{ asset('img/frontend_images/site/round1.png')}}" style="width: 155px; height: 155px;margin-left: 20px;" alt="no">
            <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
            <h4 class="title"><a href="">Maximum anonymity and security</a></h4>
              
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box-2 ">
            <img src="{{ asset('img/frontend_images/site/round2.png')}}" style="width: 155px; height: 155px;margin-left: 20px;" alt="no">
            <h4 class="title"><a href=""> Treated and tested profiles </a></h4>
           
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box-2">
            <img src="{{ asset('img/frontend_images/site/round3.png')}}" style="width: 155px; height: 155px;margin-left: 20px;" alt="no">
            <h4 class="title"><a href=""> No subscriptions, no hidden costs </a></h4>
           
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box-2 ">
            <img src="{{ asset('img/frontend_images/site/round1.png')}}" style="width: 155px; height: 155px;margin-left: 20px;" alt="no">
            <h4 class="title"><a href="">Maximum Languages Supported</a></h4>
            
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

   <!-- ======= Team (top clients) Section ======= -->
   <section id="team" class="team">
    <div class="container">
        
      <div class="section-title" data-aos="fade-up">
        <h2>Recent Profiles</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        
        <div class="col-lg-4 col-md-6">
          <div class="member" data-aos="zoom-in">
            <div class="pic"><img src="{{ asset('img/frontend_images/site/beauty1.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Daisy</h4>
              <span>Platinium link pkg</span>
              <div class="social">
                <!-- <a href=""><i class="icofont-twitter"></i></a>
                <a href=""><i class="icofont-facebook"></i></a>
                <a href=""><i class="icofont-instagram"></i></a> -->
                <a href="#chatme">Connect With me</i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="{{ asset('img/frontend_images/site/man2.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Sarah Jhonson</h4>
              <span>Platinium link pkg</span>
              <div class="social">
                <a href="#chatme">Connect With me</i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="{{ asset('img/frontend_images/site/cute3.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>William Anderson</h4>
              <span>Platinium link pkg</span>
              <div class="social">
                <a href="#chatme">Connect With me</i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->

   <!-- ======= Services ( Rating and avg) Section ======= -->
   <section id="services" class="services section-bg">
    <div class="container">
        
      <div class="section-title" data-aos="fade-up">
        <h2> Innovation In Online Dating </h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit..</p> 
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
          <div class="icon-box">
            <img src="{{ asset('img/frontend_images/site/dil.png')}}" style="width: 146px; height: 146px;" alt="no">
            <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
            <h4 class="title"><a href=""> Date Quote </a></h4>
              <p>Day by day new singles and chances on your right partner.</p>
              <b style="text-align: center; font-size: 50px;" >56%</b>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box ">
            <img src="{{ asset('img/frontend_images/site/pcicon.png')}}" style="width: 146px; height: 146px;" alt="no">
            <h4 class="title"><a href="">  Success rate  </a></h4>
            <p>Day by day new singles and chances on your right partner.</p>
            <b style="text-align: center; font-size: 50px;">46%</b>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <img src="{{ asset('img/frontend_images/site/aeroicon.png')}}" style="width: 146px; height: 146px;" alt="no">
            <h4 class="title"><a href="">  Women men  </a></h4>
            <p>Day by day new singles and chances on your right partner.</p>
            <b style="text-align: center; font-size: 50px;">78%</b>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box icon-box-blue">
            <img src="{{ asset('img/frontend_images/site/usericon.png')}}" style="width: 146px; height: 146px;" alt="no">
            <h4 class="title"><a href="">New Member</a></h4>
            <p>Day by day new singles and chances on your right partner.</p>
            <b style="text-align: center; font-size: 50px;">67.918</b>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

   <!-- ======= Team Section (wordl testimonals) ======= -->
   <section id="team" class="team">
     <div class="map">
    <div class="container">  
      
       
      <div class="section-title" data-aos="fade-up">
        <h2>Connect Eith Amazing People</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. </p>
      </div>

      <div class="row">

        <div class="col-lg-10 col-md-8">
          <div class="member" data-aos="zoom-in">
            <div class="pic"><img src="{{ asset('img/frontend_images/site/people backg.png')}}"  class="img-fluid" alt=""></div>
           
          </div>
        </div>         

      </div>

    </div>
    </div>
  </section><!-- End Team Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container">
      

      <div class="section-title" data-aos="fade-up">
        <h2> What members say about us </h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="owl-carousel testimonials-carousel" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <img src="{{ asset('img/frontend_images/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
          <h3>Saul Goodman</h3>
          <h4>Ceo &amp; Founder</h4>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <img src="{{ asset('img/frontend_images/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
          <h3>Sara Wilsson</h3>
          <h4>Designer</h4>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <img src="{{ asset('img/frontend_images/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
          <h3>Jena Karlis</h3>
          <h4>Store Owner</h4>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <img src="{{ asset('img/frontend_images/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
          <h3>Matt Brandon</h3>
          <h4>Freelancer</h4>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <img src="{{ asset('img/frontend_images/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
          <h3>John Larson</h3>
          <h4>Entrepreneur</h4>
        </div>

      </div>

    </div>
  </section>
  <!-- End Testimonials Section -->

      
      <!-- Modal login/reg Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Please Login</h4>               
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li> | &nbsp;
                <li><a data-toggle="tab" href="#registration-form">  Register <span class="glyphicon glyphicon-pencil"></span></a></li>
            </ul>

            </div>
            <div class="modal-body">                     
              @if(empty(Auth::check()))
              <div class="tab-content">                

                <div id="login-form" class="tab-pane active">
                    <form action="{{ url('login')}}" method="post"> 
                      {{ csrf_field() }}

                        <div class="form-group">
                            <label for="Name">User Name:</label>
                             {{-- for error msg --}}
                          @if(Session::has('flash_message_error'))         
                          <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong> {{ session('flash_message_error') }}</strong>
                          </div>
                        @endif
                            <input type="text" class="form-control" id="email" name="username" placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" name="pwd">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>   
                   {{-- login form close --}}


                    {{-- Registration form  --}}
                <div id="registration-form" class="tab-pane fade">
                    <form action="{{ url('/register')}}" method="post">
                      {{csrf_field() }}
                        <div class="form-group">
                            <label for="Name">Your Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Full Name" name="name">
                        </div>
                        <div class="form-group">
                          <label for="User Name">User Name:</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your User Name" name="name">
                      </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter new email" >
                        </div>
                        <div class="form-group">
                            <label for="Password">Password:</label>
                            <input type="password" class="form-control" name="password" id="pass" placeholder="Password"><span id="passstrength"></span>
                        </div>
                        <div class="form-group">
                          <label for="Confirm Password">Password:</label>
                          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                      </div>

                      <div class="form-group">
                        <label for="Aggrement">Aggrement:</label>
                        <input type="checkbox" class="form-control" name="agree" id="agree">
                    </div>

                        <button type="submit" name="submit" class="btn btn-default">Register Now</button>
                    </form>
                </div>  
                {{-- end Registration form --}}

            </div>
            @endif
              
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      
  </main><!-- End #main -->

@endsection                                                       
@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.front_header')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
        <div>
          <h1>This Platform for those Peoples who want take rest yourself</h1>
          <h2>Many packges available here for you which you want.please visit here below </h2>
          <a href="#about" class="btn-get-started scrollto">Come for SignUp</a>
        </div>
      </div>
       <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
       
        
      </div> 
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
   
  <!-- ======= Recent profiles  Section ======= -->
  <section id="team" class="team">
    <div class="container">
        
      <div class="section-title" data-aos="fade-up">
        <h2>Searched Profiles</h2>
       
      </div>

      <div class="row">
        <?php $count = 1; ?>
        @foreach($searched_users as $user)
        @if(!empty($user->details) && $user->details->status == 1)           
          @if($count<=4)         
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
        <?php $count = $count+1; ?>
        @endif
        @endif
        @endforeach        
      </div>
    </div>
  </section><!-- End Team Section -->

      
  </main><!-- End #main -->

@endsection                                                       
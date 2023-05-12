
@php
use App\User;

$datingCount = User::datingProfileExist(Auth::id());
if($datingCount == 1){
  $datingcountText = "My Profile";
}
else{

$datingcountText = "Add Dating Profile";
  }


@endphp

 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
  <div class="container d-flex">
    <div class="logo mr-auto">
    <h1 class="text-light"><a href="{{ url('/home')}}"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="{{ url('/')}}"><img src="{{ asset('img/frontend_images/site/logo1.png')}}" alt="noimg" ></a>
    </div>

    @if(empty(Auth::check()))
    <nav class="nav-menu d-none d-lg-block">
      <ul>
      <li class="active"><a href="{{ url('/')}}">Home</a></li>
        <li class="drop-down"><a href="#">Dating Routes</a>
          <ul>
            <li><a href="#" >Deep Drop Down 1</a></li>
            <li><a href="#">Deep Drop Down 2</a></li>
            <li><a href="#">Deep Drop Down 3</a></li>
            <li><a href="#">Deep Drop Down 4</a></li>
            <li><a href="#">Deep Drop Down 5</a></li>
          </ul>
        </li>
          <li><a href="#portfolio">Membership</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Login</button>
      </ul>
    </nav><!-- .nav-menu -->
    {{-- --else --}} @else
    <nav class="nav-menu d-none d-lg-block">
      <ul>
      <li class="active"><a href="{{ url('/')}}">Home</a></li>
        <li class="drop-down"><a href="#">More</a>
        <ul>
          <li><a href="{{url('/step/2')}}">{{ $datingcountText }}</a></li>

          @if ($datingCount == 1)
          <li><a href="{{url('/step/3')}}">My photos</a></li>
          @endif

          <li><a href="{{url('/responses')}}">Inbox</a></li>
          <li><a href="{{url('/sent-messages')}}">Send Msgs</a></li>
          <li><a href="{{url('/friends-requests')}}">Friend Request</a></li>
          <li><a href="{{url('/friends')}}">Friends</a></li>
        </ul>
      </li>
      <li><a href="#portfolio">Membership</a></li>
      <li><a href="#contact">Contact Us</a></li>
      <li><a href="{{ url('/logout')}}" class="btn">Logout</a></li>
      </ul>
    </nav>
    <!-- <div class="header-social-links">
      <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
      <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </
    </div> -->
    @endif
  </div>
</header><!-- End Header -->

{{-- @php
    use App\User;
    $datingCount = User::datingProfileExist(Auth::User()['id']);
    if($datingCount == 1){
      $datingcountText = "My Profile";
    }
    else{
     
    $datingcountText = "Add Dating Profile";
      }
    
    
@endphp

<!-- ======= Header ======= -->
<header id="header" ">
  <div class="container d-flex">
      
  <div class="logo mr-auto">
  <h1 class="text-light"><a href="{{ url('/')}}"></a></h1>
  <!-- Uncomment below if you prefer to use an image logo -->
  <a href="{{ url('/')}}"><img src="{{ asset('img/frontend_images/site/logo1.png')}}" alt="noimg" ></a> 
  </div>    
  
  
<a href="{{url('/step/2')}}" class="btn" >{{ $datingcountText }}</a> &nbsp;&nbsp;&nbsp;

@if ($datingCount == 1) {
<a href="{{url('/step/3')}}" class="btn" >My photos</a>&nbsp;&nbsp;&nbsp;  
}    
@endif

@if(Auth::check())

<a href="{{url('/responses')}}" class="btn" >Inbox</a> &nbsp;

<a href="{{url('/sent-messages')}}" class="btn" >Send Msgs</a> &nbsp;

<a href="{{url('/friends-requests')}}" class="btn" >Friend Request</a> &nbsp;
<a href="{{url('/friends')}}" class="btn" >Friends</a> &nbsp;

<a href="{{url('/logout')}}" class="btn" >Logout</a>
 @endif

  </div>
  
  <h3 style="text-align: center; color:whitesmoke">
    Wellcome to @php echo Auth::User()['name'];
 @endphp</h3>
  </header><!-- End Header --> --}}
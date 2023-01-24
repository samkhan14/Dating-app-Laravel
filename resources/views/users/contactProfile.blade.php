 

      <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')

   
      <!-- review Form -->
       {{-- <div class="container-fluid" id="grad1">
      <div class="row justify-content-center ">
      <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"> --}}
          <!-- For demo purpose -->

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
                </div>                
            </div>       
                
            
    </div>
    <br>
     {{-- flash msg --}}
     @if(Session::has('flash_message_error'))         
     <div class="alert alert-error alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button> 
             <strong> {{ session('flash_message_error') }}</strong>
     </div>
   @endif

   @if(Session::has('flash_message_success'))         
     <div class="alert alert-success alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button> 
             <strong> {{ session('flash_message_success') }}</strong>
     </div>
   @endif 
   {{-- end --}}
    <div class="col-sm-6">   
      <?php
        if(!empty($_GET['encoded_msg'])) {
          $decoded_msg = decrypt($_GET['encoded_msg']);
        } ?>    
    <form action="{{ url('contact/'.$user_detail->username)}}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><h3>Your Message</h3> </label>
                <textarea class="form-control" id="exampleFormControlTextarea1 message" rows="3" name="message" required >
                  <?php
                    if (!empty($decoded_msg)) {
                      echo "\n\n\n--------------$user_detail->username Wrote:\n";
                      echo $decoded_msg;
                    } ?>

                </textarea>
                  
              </div>
              
              <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
        </form>
        
       
    </div>
</div>
</div>


    


      {{--    js section  ============================================ --}}

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <script src="{{ asset('js/frontend_js/imgal.js')}}"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>


      </body>
      </html>



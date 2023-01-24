@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')

   
    <!-- file upload -->

    <div class="container">  

            <h2 style="text-align: center; font-weight: 700;color: #000; text-transform: uppercase;">

              You can upload multiple photos of your choice

            </h2>        

            @if(Session::has('flash_message_error'))         

            <div class="alert alert-danger fade show">

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

              

            <div class="row">

              <div class="col-sm-12 mx-0">

                <form id="msform" method="post" action="{{ url('/step/3')}}" enctype="multipart/form-data">

                  @csrf

                <input type="hidden" name="user_id" value="{{ Auth::User()->id}}">

                  <fieldset>

                    <div class="form-card">

                      <h2 class="fs-title">Upload a photo's

                      </h2>

                      <input type="file"  name="photo[]" id="photos-form" multiple="multiple" />  

                    </div>

                    <input type="submit" name="submit" class="btn" value="Submit">

                  </fieldset>

                </form>

              </div> 

            </div>    

            {{-- end row --}}


            <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Image Gallery</h1>

  <hr class="mt-2 mb-5">
  
  <!--fetching images-->

  <div class="row text-center text-lg-left row-allimgs mb-5">
    @foreach ($user_photos as $photo)
    <div class="col-sm-6">
     
      <div class="box">
      <a href="/img/frontend_images/photos/{{$photo->photo}}" class="d-block thumbnail fancybox"  rel="ligthbox">
            <img class="img-thumbnail img-gl img-responsive" src="/img/frontend_images/photos/{{ $photo->photo}}" alt="">
          </a> 
          
          <h5>Status :</h5>

                  <span>
                    @if ( $photo->status == 1)
                      Active
                    @else
                    InActive
                  @endif
                  
                  @if($photo->default_photo == "Yes")
                    (default)

                    @endif

                  </span>

              <a rel="{{$photo->photo}}" href="javascript:"><button type="button" class="btn btn-danger btn-sm deletePhoto">Delete</button></a>

              <a href="/default-photo/{{ $photo->photo }}">
                @if($photo->default_photo != "Yes")
                  <button type="button" class="btn btn-danger btn-sm def-photo">Default</button></a>
                @endif
    </div>  {{-- box --}}
    
    </div>
    @endforeach  
  </div>


           
    </div>
    @endsection 

    {{--    js section  ============================================ --}}

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    </script>


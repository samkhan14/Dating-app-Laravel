<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Persnol Information
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/step-form/step-form-css.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha256-iXUYfkbVl5itd4bAkFH5mjMEN5ld9t3OHvXX3IU8UxU=" crossorigin="anonymous" />
     --}}
     <link rel="stylesheet" href="{{ asset('css/frontend_css/sweetalert.css')}}"> 
    

    
    {{-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/
                                 bootstrap.min.css">  --}}
    
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha256-egVvxkq6UBCQyKzRBrDHu8miZ5FOaVrjSqQqauKglKc=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/frontend_js/sweetalert.min.js')}}"></script>
     <script src="{{ asset('/js/frontend_js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="{{ asset('js/frontend_js/jquery.js')}}">
    </script>
    <script src="{{ asset('js/frontend_js/jquery.validate.js')}}">
    </script>
    <script src="{{ asset('js/frontend_js/additional-methods.js')}}">
    </script>
   
  </head>
  <body>
    @include('layouts.frontLayouts.front_inner-header')
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
      <div class="row justify-content-center ">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
          <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <h2>
              You can upload multiple photos of your choice
            </h2>        
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

            <div class="row">
              <div class="col-md-12 mx-0">
                @foreach ($user_photos as $photo)               
                <div class="box">
                  <span class="photo">
                  <img src="/img/frontend_images/photos/{{ $photo->photo}}" class="" alt="No Image">
                  </span>
                  <p>Status :</p>
                  <p>
                    @if ( $photo->status == 1)
                      Active
                    @else 
                    InActive 
                  @endif

                  @if($photo->default_photo == "Yes")
                    (default)
                    @endif
                </p>
              <a rel="{{$photo->photo}}" class="deletePhoto"  href="javascript:">
                <button type="button" class="btn btn-danger btn-sm">Delete</a></button>
              <a href="/default-photo/{{ $photo->photo }}">
                @if($photo->default_photo != "Yes")
                  <button type="button" class="btn btn-danger btn-sm">Default</a>
                  </button>  @endif
                </div> <br>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{--    js section  ============================================ --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    
    {{-- jquery for sweetalert --}}
   <script>
              
     $(".deletePhoto").click(function() {
		var photo = $(this).attr('rel');		
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
               showCancelButton:true,
               confirmButtonColor:'#3085d6',
               confirmButtonText:'Yes Delete it !',
               cancelButtonText:'No, Cancel !',
               confirmButtonClass:'btn btn-success',
               canselButtonClass:'btn btn-danger',
               buttonsStyling:false,
               reverseButtons:true
		},
			function() {
				window.location.href="/delete-photo/"+photo;
			});
  });

   </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Meet EveryOne</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha256-k66BSDvi6XBdtM2RH6QQvCz2wk81XcWsiZ3kn6uFTmM=" crossorigin="anonymous" /> --}}
  
<!-- Vendor CSS Files -->
   <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
   <link href="{{ asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
   <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
   <link href="{{ asset('vendor/aos/aos.css')}}" rel="stylesheet">
   {{-- custom css --}}
  <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css')}}" /> 
  <link rel="stylesheet" href="{{ asset('css/frontend_css/step-form/step-form-css.css')}}">
{{-- addition css --}}
<link rel="stylesheet" href="{{ asset('css/frontend_css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{ asset('css/frontend_css/sweetalert.css')}}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="{{ asset('css/frontend_css/imgal.min.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="{{ asset('css/frontend_css/font-awesome.css')}}">   -->

<!-- <script>
 $(function() {
   $( "#dob" ).datepicker({
   	changeMonth: true,
    changeYear: true,
   	maxDate: '0',
   	yearRange:'1950:2018'
   });
 });
 </script> --> 
 
 <script>
          $(document).ready( function () {
            $('#responses').DataTable();
            } );
      </script>
 
 <script>
 $(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
  </script>
    
    <script>
      // Buy tickets select the ticket type on click
    $('#buy-ticket-modal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var ticketType = button.data('ticket-type');
      var modal = $(this);
      modal.find('#ticket-type').val(ticketType);
    })
    </script>
    
    <script>
      $(document).ready(function(){
        var current_fs, next_fs, previous_fs;
        //fieldsets
        var opacity;
        $(".next").click(function(){
          current_fs = $(this).parent();
          next_fs = $(this).parent().next();
          //Add Class Active
          $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
          //show the next fieldset
          next_fs.show();
          //hide the current fieldset with style
          current_fs.animate({
            opacity: 0}
                             , {
            step: function(now) {
              // for making fielset appear animation
              opacity = 1 - now;
              current_fs.css({
                'display': 'none',
                'position': 'relative'
              }
                            );
              next_fs.css({
                'opacity': opacity}
                         );
            }
            ,
            duration: 600
          }
                            );
        }
                        );
        $(".previous").click(function(){
          current_fs = $(this).parent();
          previous_fs = $(this).parent().prev();
          //Remove class active
          $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
          //show the previous fieldset
          previous_fs.show();
          //hide the current fieldset with style
          current_fs.animate({
            opacity: 0}
                             , {
            step: function(now) {
              // for making fielset appear animation
              opacity = 1 - now;
              current_fs.css({
                'display': 'none',
                'position': 'relative'
              }
                            );
              previous_fs.css({
                'opacity': opacity}
                             );
            }
            ,
            duration: 600
          }
                            );
        }
                            );
        $('.radio-group .radio').click(function(){
          $(this).parent().find('.radio').removeClass('selected');
          $(this).addClass('selected');
        }
                                      );
        $(".submit").click(function(){
          return false;
        }
                          )
      }
                       );
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
   
    
      <script>
              
        $(".deleteResponse").click(function() {
           var res = $(this).attr('rel');		
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
                   window.location.href="/delete-response/"+res;
               });
     });
   
      </script>
      
      <script> 
            var username;
            $(document).ready(function(){
                username = $('#username').html();
                pullData();
                $(document).keyup(function(e){
                  if(e.keyCode == 13){
                      sendMessage(); //if user press enter
                  }
                  else {
                      isTyping(); // if user is typing
                  }
                });
            });

            function pullData(){
                retrieveChatMessages();
                retrieveTypingStatus();
                setTimeout(pullData,3000);
            }

            function  retrieveChatMessages(){
                $.post('/chat/retrieveChatMessages',{username:username},function(data){
                    if(data.length > 0){
                        $('.chat-window').append('<br><div>'+data+'</div><br>');
                    }
                });
            }

            function  retrieveTypingStatus(){
                $.post('/chat/retrieveTypingStatus',{username:username},function(username){
                    if(username.length > 0){
                        $("#typingStatus").html(username+'is typing');
                    } 
                    else
                    {
                        $("#typingStatus").html('');
                    }
                })
            }



            function sendMessage(){
              var text = $('#text').val();
              if(text.length > 0){
                  $.post('/chat/send-message',{text:text,username:username},function(){
                      $('.chat-window').append('<br><div style"text-align:right"><strong>'+username+':</strong>'+text+'</div><br>');
                      $("#text").val("");
                      isNotTyping();
                  });
              }
            }

            function isTyping(){
                username = $('#username').html();
                $.post('/chat/isTyping',{username:username});
            }

            function isNotTyping(){
                $.post('/chat/isnottyping',{username:username});
            }
        </script>
</head>
<body>
  @include('layouts.frontLayouts.front_header')


    @yield('content')
    
    
  

@include('layouts.frontLayouts.front_footer')   
 
<!-- Vendor JS Files -->
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>    
<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('vendor/venobox/venobox.min.js')}}"></script>
<script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('js/frontend_js/templatejs/main.js')}}"></script>
 {{-- additional js --}}
 <script src="{{ asset('js/frontend_js/jquery-3.2.1.js')}}"></script>
<script src="{{ asset('js/frontend_js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/main.js')}}"></script>
<script src="{{ asset('js/frontend_js/jquery.validate.js')}}"></script>
<script src="{{ asset('js/frontend_js/additional-methods.js')}}"></script>
<script src="{{ asset('js/frontend_js/jquery-ui.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

 
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Control</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token()}}">
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />
<link href="font-awesome/{{ asset('fonts/backend_fonts/css/font-awesome.css" rel="stylesheet') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />
<link href='httpbackend_css/://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="{{ asset('css/backend_css/modalcss.css')}}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


<script>
  // Buy tickets select the ticket type on click
$('#buy-ticket-modal').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget);
  var ticketType = button.data('ticket-type');
  var modal = $(this);
  modal.find('#ticket-type').val(ticketType);
})
</script>




</head>
<body>

@include('layouts.adminLayouts.admin_header')

@include('layouts.adminLayouts.admin_sidebar')


@yield('content')



<!--Footer-part-->
@include('layouts.adminLayouts.admin_footer')

<!--end-Footer-part-->



<script src="{{ asset('js/backend_js/jquery.min.js ') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.ui.custom.js ') }}"></script> 
<script src="{{ asset('js/backend_js/bootstrap.min.js ') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.uniform.js ') }}"></script> 
<script src="{{ asset('js/backend_js/select2.min.js ') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.validate.js ') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.js ') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.form_validation.js ') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</body>
</html>

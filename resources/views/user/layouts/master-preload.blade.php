<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="{{ asset('user/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('user/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('user/assets/css/home.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/cart.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/thank-you.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/profile.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/preload.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/header.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/footer.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/superslides.css') }}">

	<script type="text/javascript" src="{{ asset('user/assets/js/jquery-2.0.2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/assets/js/main.js') }}"></script>
	<script src="{{ asset('user/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('user/bootstrap/js/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('user/bootstrap/css/bootstrap.min.css') }}">
	<link rel="icon" href="{{ asset('/images/logo-ico.jpg') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<style>
		
		@font-face {
		    font-family: donair;
		    src: url('{{ asset('/user/fonts/misstral.ttf') }}');
		}

		@font-face {
		    font-family: myriad;
		    src: url('{{ asset('/user/fonts/myriad.ttf') }}');
		}

	</style>
	
</head>
<body>
	

	@section('contentt')
	@show

  	
</body>
</html>
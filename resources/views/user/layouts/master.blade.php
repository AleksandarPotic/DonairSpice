<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta name="keywords" content="@yield('keywords')">
	<meta name="description" content="@yield('description')">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('user/assets/css/home.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/cart.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/thank-you.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/profile.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/preload.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/pre-checkout.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/checkout.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/header.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/footer.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/superslides.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/404.css') }}">
	<script src="{{ asset('user/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('user/bootstrap/js/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('user/bootstrap/css/bootstrap.min.css') }}">
	<link rel="icon" href="{{ asset('/images/logo-ico.jpg') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	@include('user.header')
	

	@section('content')
	@show


	@include('user.footer')
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="{{ asset('user/assets/js/jquery.easing.1.3.js') }}"></script>
  	<script src="{{ asset('user/assets/js/jquery.animate-enhanced.min.js') }}"></script>
  	<script src="{{ asset('user/assets/js/jquery.superslides.js') }}" type="text/javascript" charset="utf-8"></script>
  	<script src="{{ asset('user/assets/js/slider.js') }}"></script>	
  	<script src="{{ asset('user/assets/js/testimonials-slider.js') }}"></script>
  	<script src="{{ asset('user/assets/js/helper.js') }}"></script>
  	<script src="{{ asset('user/assets/js/helper2.js') }}"></script>
  	<script src="{{ asset('user/assets/js/profile-open.js') }}"></script>
  	<script src="{{ asset('user/assets/js/pre-checkout-open.js') }}"></script>
  	<script src="{{ asset('user/assets/js/instagram-feed.js') }}"></script>
  	<script src="{{ asset('user/assets/js/credit-card.js') }}"></script>
  	<script src="{{ asset('user/assets/js/cart.js') }}"></script>

	@section('script-part')
	@show
	@section('script-part-two')
	@show
	
</body>
</html>
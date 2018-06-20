@section('title', 'Donair Spice | Home Page')

@extends('user.layouts.master-preload')

@section('contentt')

	
	
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
				<div class="object"></div>
			</div>
		</div>
	</div>

	

	

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="{{ asset('user/assets/js/jquery.easing.1.3.js') }}"></script>
  	<script src="{{ asset('user/assets/js/jquery.animate-enhanced.min.js') }}"></script>
  	<script src="{{ asset('user/assets/js/jquery.superslides.js') }}" type="text/javascript" charset="utf-8"></script>
  	<script src="{{ asset('user/assets/js/slider.js') }}"></script>	
  	<script src="{{ asset('user/assets/js/testimonials-slider.js') }}"></script>
  	<script src="{{ asset('user/assets/js/helper.js') }}"></script>
  	<script src="{{ asset('user/assets/js/helper2.js') }}"></script>
  	<script src="{{ asset('user/assets/js/profile-open.js') }}"></script>
  	<script src="{{ asset('user/assets/js/typed.js') }}"></script>

	<script>
		
		$(document).ready(function(){

			setTimeout(function() {
				window.location.href = "{{ route('home') }}";
				}, 2000);
			
		});
		

	</script>

@endsection
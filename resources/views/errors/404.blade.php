@section('title', 'Donair Spice | 404 Page')

@extends('user.layouts.master')

@section('content')

	
	<div class="container justify-content-center" id="thank-section2">
		 <div class="row align-self-center">
		 	<div class="col-12 col-sm-12 col-md-6 offset-lg-1 col-lg-4" id="check2">
		 		<img class="img-fluid" src="{{ asset('/images/spice-v.png') }}">
		 	</div>
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thank-title2">
		 		<h1 class="text-center">Error 404</h1>
		 		<h4>Sorry, no <span id="doner">Donair Spice</span> here. You will be redirected to our Home Page shortly.</h4>
		 	</div>
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thanks-text2">
		 		
		 	</div>
		 </div>
	</div>

	<div class="container justify-content-center" id="thank-section22">
		 <div class="row align-self-center">
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thank-title2">
		 		<h1 class="text-center">Error 404</h1>
		 		<div class="offset-3 col-6 offset-sm-3 col-sm-6 col-md-6 offset-lg-1 col-lg-4" id="check2">
		 		<img id="spice" class="img-fluid" src="{{ asset('/images/spice-v.png') }}">
		 	</div>
		 		<h4>Sorry, no <span id="doner">Donair Spice</span> here. You will be redirected to our Home Page shortly.</h4>
		 	</div>
		 	
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thanks-text2">
		 		
		 	</div>
		 </div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			setTimeout(function() {
				window.location.href = "/";
				}, 333500);
			
		});
	</script>


@endsection
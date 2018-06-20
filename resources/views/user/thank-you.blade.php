@section('title', 'Donair Spice | Thank You Page')

@section('keywords', '')
@section('description', '')

@extends('user.layouts.master')

@section('content')

	
	<div class="container justify-content-center" id="thank-section">
		 <div class="row align-self-center">
		 	<div class="col-12 col-sm-12 col-md-6 offset-lg-1 col-lg-4" id="check">
		 		<img class="img-fluid" src="{{ asset('/images/donko.png') }}" alt="Donair Spice">
		 	</div>
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thank-title">
		 		<h1 class="text-center">Thank You</h1>
		 		<h4>Thank you for ordering our <span id="doner">Donair Spice</span> ! You will be redirected to our Home Page shortly.</h4>
		 	</div>
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thanks-text">
		 		
		 	</div>
		 </div>
	</div>

	<div class="container justify-content-center" id="thank-section23">
		 <div class="row align-self-center">
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thank-title">
		 		<h1 class="text-center">Thank You</h1>
		 		<div class="offset-3 col-6 offset-sm-3 col-sm-6 col-md-6 offset-lg-1 col-lg-4" id="check">
		 		<img class="img-fluid" src="{{ asset('/images/donko.png') }}" alt="Donair Spice">
		 	</div>
		 		<h4>Thank you for ordering our <span id="doner">Donair Spice</span> ! You will be redirected to our Home Page shortly.</h4>
		 	</div>
		 	
		 	<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="thanks-text">
		 		
		 	</div>
		 </div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			setTimeout(function() {
				window.location.href = '{{ route('home') }}';
				}, 3500);
			
		});
	</script>


@endsection
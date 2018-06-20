@section('title', 'Donair Spice | Profile Page')

@section('keywords', '')
@section('description', '')

@extends('user.layouts.master')

@section('content')
	

	<!--// Front  Image -->
	<div class="container-fluid" style="background-image: url('{{ asset('/images/two.jpg') }}');" id="profile-section">
		
	</div> <!--// End of Front Image -->
	


	<!--// Orange Section with Profile Tabs -->
	<div class="container-fluid" id="profile-content">
		<div class="row">
			<div class="container">
				<div class="row" id="profile-tabs">
					<div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right" id="right-button">
						<button class="btn btn-default" id="profile-btn"><b>PROFILE</b></button>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="left-button">
						<button class="btn btn-default" id="history-btn"><b>ORDER HISTORY</b></button>
					</div>
				</div>
			</div>
		</div>
	</div> <!--// End of Orange Section -->
				
	

	<!--// Personal Information Part -->
	<div class="container" id="p-info">
		<form action="{{ route('profile.info') }}" method="POST">
			@csrf
			<div class="row" id="profile">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="personal-info">
					<h1>Personal Information</h1><br>
					<div class="row">
						<input type="hidden" name="id" value="{{ Auth::user()->id }}">
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
						  	<div class="form-group">
						    	<input type="text" class="form-control" id="inlineFormInputGroup" name="first_name" aria-describedby="emailHelp" value="{{ Auth::user()->first_name }}" placeholder="First Name" required>
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="text" class="form-control" id="inlineFormInputGroup" name="last_name" aria-describedby="emailHelp" value="{{ Auth::user()->last_name }}" placeholder="Last Name" required>
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="email" class="form-control" id="inlineFormInputGroup" name="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}" placeholder="Email" required>
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="number" class="form-control" id="inlineFormInputGroup" name="phone" aria-describedby="emailHelp" value="{{ Auth::user()->phone }}" placeholder="Phone Number">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="text" class="form-control" id="inlineFormInputGroup" name="address" aria-describedby="emailHelp" value="{{ Auth::user()->address }}" placeholder="Address">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="text" class="form-control" id="inlineFormInputGroup" name="postal_code" aria-describedby="emailHelp" value="{{ Auth::user()->postal_code }}" placeholder="Postal Code">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="text" class="form-control" id="inlineFormInputGroup" name="city" aria-describedby="emailHelp" value="{{ Auth::user()->city }}" placeholder="City">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="text" class="form-control" id="inlineFormInputGroup" name="province" aria-describedby="emailHelp" value="{{ Auth::user()->province }}" placeholder="Province">
						  	</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="card-data">
					<h1>Card Information</h1><br>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
						    	<input type="number" class="form-control" id="inlineFormInputGroup" name="card" aria-describedby="emailHelp" @if(Auth::user()->card) value="{{ decrypt(Auth::user()->card) }}" @endif placeholder="Card Number">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="number" class="form-control" id="inlineFormInputGroup" name="expiry_month" aria-describedby="emailHelp" @if(Auth::user()->expiry_month) value="{{ decrypt(Auth::user()->expiry_month) }}" @endif placeholder="Expire Month">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="number" class="form-control" id="inlineFormInputGroup" name="expiry_year" aria-describedby="emailHelp" @if(Auth::user()->expiry_year) value="{{ decrypt(Auth::user()->expiry_year) }}" @endif placeholder="Expire Year">
						  	</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<input type="number" class="form-control" id="inlineFormInputGroup" name="cvv" aria-describedby="emailHelp" @if(Auth::user()->cvv) value="{{ decrypt(Auth::user()->cvv) }}" @endif placeholder="CVV">
						  	</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="submit">
				<div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
					<button type="submit" class="btn btn-default"><b>SAVE INFORMATION</b></button>
				</div>
			</div>
		</form>	
	</div> <!--// End Personal Information -->




	<!--// Order History Part -->
	<div class="container" id="c-info">

		@if($orders->count() != 0)

		<div class="row">
			<table class="table">
			  <tbody id="tbody">
			  	@foreach($orders as $order)
					<tr>
						<form action="{{ route('cart.store') }}" method="POST">
							@csrf
							<input type="hidden" name="size" value="{{ $order->size }}">
							<input type="hidden" name="quantity" value="{{ $order->quantity }}">
							<input type="hidden" name="name" value="Donair Spice">
							  <td><img class="image" src="{{ asset('/images/logo.jpg') }}" alt="Donair Spice"> <span class="logo-name">Donair Spice</span> - {{ $order->size }} Pieces</td>
							  <td class="center" id="padding"><b>${{ number_format($order->total_price,2) }}</b></td>
							  <td class="right"><input type="number" name="qu" value="{{ $order->quantity }}" min="1" max="10" disabled> </td>
							  <td class="right" id="padding-price"><b><button class="price" style="border: none; cursor: pointer;">Order Now</button></b></td>
						</form>
					</tr>
				  @endforeach
			  </tbody>
			</table>
		</div>

		@else

		<!--// This Section will be appear when Order History is Empty -->
		<div class="row" id="empty-history">
			<div class="col-12 text-center">
				<h1 style="margin-bottom: 15px;">You didn't order anything yet...</h1>
				<a href="{{ route('home') }}"><button class="btn btn-default">BACK to SHOP</button></a>
			</div>
		</div> <!--// End Empty Section -->

		@endif

	</div> <!--// End of Order History -->	


@endsection
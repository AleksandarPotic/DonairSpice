@section('title', 'Donair Spice | Pre Checkout Page')

@section('keywords', '')
@section('description', '')

@extends('user.layouts.master')

@section('content')

	
	<div class="container" id="pre-checkout-section">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-7 col-lg-7" id="left-precheckout">
				<form action="{{ route('pre-checkout.store') }}" id="full_form" method="POST">
					@csrf
					<h1>Donair Spice</h1>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb" id="breadcrumb">
						  <li class="breadcrumb-item" style="cursor: pointer;"><a href="{{ route('cart') }}" style="text-decoration: none; color: black;">Cart</a></li>
						<li class="customer_button breadcrumb-item active" id="customer_active" style="cursor: pointer;">Customer Information</li>
						<li class="shipping_button breadcrumb-item" id="shipping_active" style="cursor: pointer;">Shipping Method</li>
						<li class="payment_button breadcrumb-item" id="payment_active" style="cursor: pointer;">Payment Method</li>
					  </ol>
					</nav>

					<div class="alert alert-success text-center" id="customer_message" style="display: none;background-color: #d3a713; color: black; border: none;">
						<strong> All input fields must be filled.</strong>
					</div>

					<div class="alert alert-success text-center" id="coupon_message" style="display: none;background-color: #d3a713; color: black; border: none;">
						<strong> Coupons are valid only for our users.</strong>
					</div>
					<div class="alert alert-success text-center" id="shipping_message" style="display: none;background-color: #d3a713; color: black; border: none;">
						<strong> Please choose shipping method.</strong>
					</div>
					<div class="alert alert-success text-center" id="payment_message" style="display: none;background-color: #d3a713; color: black; border: none;">
						<strong> Please choose payment method.</strong>
					</div>
					@if(session()->has('message_coupon'))
						<div class="alert alert-success text-center" id="coupon_m2" style="background-color: #d3a713; color: black; border: none;">
							<strong>{{ session('message_coupon') }}</strong>
						</div>
					@endif
					@if(session()->has('payment_message'))
						<div class="alert alert-success text-center" id="coupon_m2" style="background-color: #d3a713; color: black; border: none;">
							<strong>{{ session('payment_message') }}</strong>
						</div>
					@endif
					<div class="row" id="user-information">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							@if(Auth::guest())
								<ul class="list-inline">
									<li class="list-inline-item right-bread"><b>Already have an Account? <a href="#"><label for="modal-toggle" onclick="openSignUp();"><span id="log-in" style="cursor: pointer;">Log In</span></label></a></b></li>
								</ul>
							@endif

							<div class="form-group left-check-info">
								<input type="email" name="email" class="form-control" @if(!Auth::guest()) value="{{ Auth::user()->email }}" @endif id="email" aria-describedby="emailHelp" placeholder="Enter Email" onblur="this.placeholder = 'Enter Email'" onfocus="this.placeholder = ''" required>
							</div>

							<div class="boxes">
								<label class="containerr">Keep me up to date on news and exclusive offers!
								  <input type="checkbox" name="mess" checked="checked">
								  <span class="checkmark"></span>
								</label>
							</div>

							<h3>Shipping Address</h3>
							<div class="row left-check-info">
								@if(!Auth::guest())
									<input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
								@endif
								<div class="col-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'First Name'" onfocus="this.placeholder = ''"  name="fName" class="form-control" id="fName" @if(!Auth::guest()) value="{{ Auth::user()->first_name }}" @endif aria-describedby="emailHelp" placeholder="First Name">
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'Last Name'" onfocus="this.placeholder = ''"  name="lName" class="form-control" id="lName" @if(!Auth::guest()) value="{{ Auth::user()->last_name }}" @endif aria-describedby="emailHelp" placeholder="Last Name">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'Company'" onfocus="this.placeholder = ''" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'Address'" onfocus="this.placeholder = ''" name="address" class="form-control" id="address" aria-describedby="emailHelp" @if(!Auth::guest()) value="{{ Auth::user()->address }}" @endif placeholder="Address">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'City'" onfocus="this.placeholder = ''" name="city" class="form-control" id="city" aria-describedby="emailHelp" @if(!Auth::guest()) value="{{ Auth::user()->city }}" @endif placeholder="City">
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'Country'" onfocus="this.placeholder = ''" name="country" class="form-control" id="country" aria-describedby="emailHelp" @if(!Auth::guest()) value="{{ Auth::user()->province }}" @endif placeholder="Country">
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'Postal Code'" onfocus="this.placeholder = ''" name="postalCode" class="form-control" id="postalCode" aria-describedby="emailHelp" @if(!Auth::guest()) value="{{ Auth::user()->postal_code }}" @endif placeholder="Postal Code">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" onblur="this.placeholder = 'Phone'" onfocus="this.placeholder = ''" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" @if(!Auth::guest()) value="{{ Auth::user()->phone }}" @endif placeholder="Phone">
									</div>
								</div>
									<input type="hidden" id="pay_name" name="pay_name" value="Paypal">
									<input type="hidden" id="ship_name" name="ship_name" value="Shipping_one">
									<input type="hidden" id="ship_price" name="ship_price" value="5">


									@if(session('coupon'))
										<input type="hidden" name="total_price" id="t_price_s" value="{{ session('coupon')['newSubtotal'] }}">
									@else
										<input type="hidden" name="total_price" id="t_price_s" value="{{ Cart::total() }}">
									@endif

									@if(session('coupon'))
										<input type="hidden" id="t_price" value="{{ session('coupon')['newSubtotal'] }}">
									@else
										<input type="hidden" id="t_price" value="{{ Cart::total() }}">
									@endif
							</div>

							<div class="col-12 col-sm-12 col-md-5 col-lg-5" id="right-precheckout2">

								@foreach(Cart::content() as $item)
									<input type="hidden" name="quantity" value="{{ $item->qty }}">
									<input type="hidden" name="product_name" value="{{ $item->name }}">
									<input type="hidden" name="size" value="{{ $item->options->size }}">
									<div class="ordered-item">
										<ul class="list-inline">
											<li class="list-inline-item"><img src="{{ asset('/images/logo.jpg') }}" alt="Donair Spice"></li>
											<li class="list-inline-item"><b>{{ $item->options->size }} Donair Spice</b></li>
											<li class="list-inline-item text-right"><b>${{ number_format($item->price,2) }}</b></li>
										</ul>
									</div>
								@endforeach


								<div class="cart-part">
									@if(Auth::guest())
										<form action="#" method="POST">
											@csrf
											<div class="input-group">
												<label class="sr-only" for="inlineFormInputGroup">Username</label>
												<div class="input-group mb-2">
													<input type="text" name="code" class="form-control" id="inlineFormInputGroup" placeholder="Enter Code" style="text-transform: uppercase;" required>
													<div class="input-group-prepend">
														<button type="button" class="input-group-text app_log_out" id="apply" style="cursor: pointer;">Apply</button>
													</div>
												</div>
											</div>
										</form>
									@else
										@if(session('coupon'))
										<form action="{{ route('coupon.destroy') }}" method="GET">
											@csrf
											<div class="input-group">
												<label class="sr-only" for="inlineFormInputGroup">Username</label>
												  <div class="input-group mb-2">
													<input type="text" class="form-control" value="{{ session('coupon')['name'] }}" id="inlineFormInputGroup" placeholder="Discount" disabled>
													<div class="input-group-prepend">
													  <button type="button" class="input-group-text apply_d" id="apply" style="cursor: pointer;">Remove Coupon</button>
													</div>
												</div>
											</div>
										</form>
										@else
											<form action="{{ route('coupon') }}" method="POST">
												@csrf
												<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
												<div class="input-group">
													<label class="sr-only" for="inlineFormInputGroup">Username</label>
													<div class="input-group mb-2">
														<input type="text" class="form-control code_mob" id="inlineFormInputGroup" placeholder="Enter Code" style="text-transform: uppercase;" required>
														<div class="input-group-prepend">
															<button type="button" class="input-group-text apply_m" id="apply" style="cursor: pointer;">Apply</button>
														</div>
													</div>
												</div>
											</form>
										@endif
									@endif
									<ul class="list-inline">
										<li class="list-inline-item"><b>Sub-Total</b></li>
										<li class="list-inline-item cart-right"><b>${{ number_format(Cart::subtotal(),2) }}</b></li>
										<li class="list-inline-item"><b>Tax(15%)</b></li>
										<li class="list-inline-item cart-right"><b>${{ number_format(Cart::tax(),2) }}</b></li>
										<li class="list-inline-item"><b>Shipping</b></li>
										<li class="list-inline-item cart-right"><b class="shipping_price">---</b></li>
										@if(session('coupon'))
											@if(session('coupon')['type'] == 'fixed')
												<li class="list-inline-item"><b>Discount(${{ number_format(session('coupon')['discount'],2) }})</b></li>
											@else
												<li class="list-inline-item"><b>Discount({{ session('coupon')['discount'] }}%)</b></li>
											@endif
											<li class="list-inline-item right"><b>${{ number_format(session('coupon')['discount_price'],2) }}</b></li>
										@endif
									</ul>

								</div>
								<div id="linee"></div>
								<br>
								<ul class="list-inline">
									@if(!session('coupon'))
										<li class="list-inline-item"><b>Total</b></li>
										<li class="list-inline-item cart-right"><b class="total_dollar">${{ number_format(Cart::total(),2) }}</b></li>
									@else
										<li class="list-inline-item"><b>Total</b></li>
										<li class="list-inline-item cart-right"><b class="total_dollar">${{ number_format(session('coupon')['newSubtotal'],2) }}</b></li>
									@endif
								</ul>
							</div>

							<div class="row" id="action">
								<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="return-cart">
									<a href="{{ route('cart') }}"><button type="button" class="btn btn-default"><b>Return to Cart</b></button></a>
								</div>
								<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="contnue-shipping">
									<a href="#"><button type="button" class="btn btn-default shipping_button"><b>Continue</b></button></a>
								</div>
							</div>
						</div>
					</div>



					<div class="row" id="shipping-information" style="display: none;">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12" id="methode-shipping-box">
							<h3>Shipping Method</h3>
							<label class="containerr">Standard Shipping
							  <input class="shipp_form" type="radio" name="shipping_method" alt="5.00" value="Shipping-one" id="shipping-one">
							  <span class="checkmark"></span>
							</label>

							<label class="containerr">Premium #1 Shipping
							  <input class="shipp_form" type="radio" name="shipping_method" alt="12.00" value="Shipping-two" id="shipping-two">
							  <span class="checkmark"></span>
							</label>
						</div>

						<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="return-cart">
							<a href="#"><button type="button" class="btn btn-default customer_button"><b>Back</b></button></a>
						</div>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="contnue-shipping">
							<a href="#"><button type="button" class="btn btn-default payment_button"><b>Continue</b></button></a>
						</div>
					</div>


					<div class="row" id="pay_id" style="display:none;">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Payment Method</h3>
							<label class="containerr">Paypal
								<input class="pay_form" type="radio" name="pay_method" value="Paypal" id="payment-one" checked>
								<span class="checkmark"></span>
							</label>

							<label class="containerr">Credit or Debit Card
								<input class="pay_form" type="radio" name="pay_method" value="Card or Debit Card" id="payment-two">
								<span class="checkmark"></span>
							</label>
						</div>

						<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="return-cart">
							<a href="#"><button type="button" class="btn btn-default shipping_button"><b>Back</b></button></a>
						</div>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6" id="contnue-shipping">
							<button type="button" class="btn btn-default continue_b"><b>Continue</b></button>
						</div>
					</div>
				</form>

			</div>


			<div class="col-12 col-sm-12 col-md-5 col-lg-5" id="right-precheckout">

				@foreach(Cart::content() as $item)
					<div class="ordered-item">
						<ul class="list-inline">
							<li class="list-inline-item"><img src="{{ asset('/images/logo.jpg') }}" alt="Donair Spice"></li>
							<li class="list-inline-item"><b>{{ $item->options->size }} Donair Spice</b></li>
							<li class="list-inline-item text-right"><b>${{ number_format($item->price,2) }}</b></li>
						</ul>
					</div>
				@endforeach


				<div class="cart-part">
					@if(Auth::guest())
						<form action="#" method="POST">
							@csrf
							<div class="input-group">
								<label class="sr-only" for="inlineFormInputGroup">Username</label>
								<div class="input-group mb-2">
									<input type="text" name="code" class="form-control" id="inlineFormInputGroup" placeholder="Enter Code" style="text-transform: uppercase;" required>
									<div class="input-group-prepend">
										<div class="input-group-text app_log_out" id="apply" style="cursor: pointer;">Apply</div>
									</div>
								</div>
							</div>
						</form>
					@else
						@if(session('coupon'))
						<form action="{{ route('coupon.destroy') }}" method="GET" id="form_d">
							@csrf
							<div class="input-group">
								<label class="sr-only" for="inlineFormInputGroup">Username</label>
								  <div class="input-group mb-2">
									<input type="text" class="form-control" value="{{ session('coupon')['name'] }}" id="inlineFormInputGroup" placeholder="Discount" disabled>
									<div class="input-group-prepend">
									  <button type="submit" class="input-group-text" id="apply" style="cursor: pointer;">Remove Coupon</button>
									</div>
								</div>
							</div>
						</form>
						@else
							<form action="{{ route('coupon') }}" method="POST" id="form_m">
								@csrf
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
								<div class="input-group">
									<label class="sr-only" for="inlineFormInputGroup">Username</label>
									<div class="input-group mb-2">
										<input type="text" name="code" class="form-control code_mob2" id="inlineFormInputGroup" placeholder="Enter Code" style="text-transform: uppercase;" required>
										<div class="input-group-prepend">
											<button type="submit" class="input-group-text" id="apply" style="cursor: pointer;">Apply</button>
										</div>
									</div>
								</div>
							</form>
						@endif
					@endif
					<ul class="list-inline"> 
						<li class="list-inline-item"><b>Sub-Total</b></li>
						<li class="list-inline-item cart-right"><b>${{ number_format(Cart::subtotal(),2) }}</b></li>
						<li class="list-inline-item"><b>Tax(15%)</b></li>
						<li class="list-inline-item cart-right"><b>${{ number_format(Cart::tax(),2) }}</b></li>
						<li class="list-inline-item"><b>Shipping</b></li>
						<li class="list-inline-item cart-right"><b class="shipping_price">---</b></li>
						@if(session('coupon'))
							@if(session('coupon')['type'] == 'fixed')
								<li class="list-inline-item"><b>Discount(${{ number_format(session('coupon')['discount'],2) }})</b></li>
							@else
								<li class="list-inline-item"><b>Discount({{ session('coupon')['discount'] }}%)</b></li>
							@endif
							<li class="list-inline-item right"><b>${{ number_format(session('coupon')['discount_price'],2) }}</b></li>
						@endif
					</ul>
					
				</div>
				<div id="linee"></div>
				<br>
				<ul class="list-inline">
					@if(!session('coupon'))
						<li class="list-inline-item"><b>Total</b></li>
						<li class="list-inline-item cart-right"><b class="total_dollar">${{ number_format(Cart::total(),2) }}</b></li>
					@else
						<li class="list-inline-item"><b>Total</b></li>
						<li class="list-inline-item cart-right"><b class="total_dollar">${{ number_format(session('coupon')['newSubtotal'],2) }}</b></li>
					@endif
				</ul>
			</div>
		</div>
	</div>

@endsection
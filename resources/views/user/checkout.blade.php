@section('title', 'Donair Spice | Checkout Page')

@section('keywords', '')
@section('description', '')

@extends('user.layouts.master')

@section('content')

	
	<div class="container" id="last-checkout">
		<div class="row">
			<div class="col-12" id="checkout-title">
				<h1>Checkout</h1>
			</div>
			<form action="@if($payment_method == 'Cash') {{ route('order.delivery') }} @elseif($payment_method == 'Paypal') {{ route('payment_paypal') }} @else {{ route('payment_credit_card') }} @endif" id="form_information" method="POST">
				@csrf
				@if(!Auth::guest())
					<input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
				@endif
				<input type="hidden" name="fName" value="{{ $fName }}">
				<input type="hidden" name="lName" value="{{ $lName }}">
				<input type="hidden" name="email" value="{{ $email }}">
				<input type="hidden" name="phone" value="{{ $phone }}">
				<input type="hidden" name="company" value="{{ $company }}">
				<input type="hidden" name="address" value="{{ $address }}">
				<input type="hidden" name="city" value="{{ $city }}">
				<input type="hidden" name="country" value="{{ $country }}">
				<input type="hidden" name="postalCode" value="{{ $postalCode }}">
				<input type="hidden" name="shipping_method" value="{{ $shipping_method }}">
				<input type="hidden" name="payment_method" value="{{ $payment_method }}">
				<input type="hidden" name="total_price" value="{{ $total_price }}">
				<input type="hidden" name="product_id" value="{{ $product_id }}">
				<input type="hidden" name="quantity" value="{{ $quantity }}">
				<input type="hidden" name="size" value="{{ $size }}">

			</form>

			<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="checkout-left">
				<div class="row delivery-info">
					<div class="col-12">
						<h3>Customer Information</h3>
						<p>{{ $fName }} {{ $lName }}</p>
						<p>{{ $email }}</p>
						<p>{{ $phone }}</p>
						<p>{{ $address }}</p>
						<p>{{ $city }}</p>
						<p>{{ $country }}</p>
						<p>{{ $postalCode }}</p>
					</div>
				</div>

				<div class="row delivery-info">
					<div class="col-12">
						<h3>Shipping & Payment Information</h3>
						<p>{{ $shipping_method }}</p>
						<p>{{ $payment_method }}</p>
					</div>
				</div>

				<div class="row delivery-info">
					<div class="col-12">
						<h3>Your Cart</h3>
						<table class="table">
						  <tbody id="tbody">
						  	@foreach(Cart::content() as $item)
								<tr>
									<td id="ordered-item"><span id="font">Donair Spice</span> - {{ $item->options->size }} Pieces</td>
									<td class="right"><input type="number" name="qnt" id="qty_id" value="{{ $item->qty }}" min="1" max="10" disabled> <span class="delete"></span></td>
									<td class="right" id="padding-price"><b><span class="price">${{ number_format($item->price,2) }}</span></b></td>
								</tr>
							@endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="checkout-right">

				<div class="row">
					<div class="col-12 col-sm-12 col-md-9 offset-md-3 col-lg-9 offset-lg-3">
						<div id="place-order">
							@if($payment_method == 'Cash')
								<button class="btn btn-default place_button"><b>Place Your Order</b></button>
							@elseif($payment_method == 'Paypal')
								<div style="text-align: center;">
									<input class="responsive place_button" type="image" name="submit" border="0" src="{{ asset('images/paypal_button.png') }}" height="55px" width="240px" alt="Buy Now">
								</div>
							@else
								<form action="{{ route('payment_credit_card') }}" method="POST" id="online-payment-form">
									<div id="item" class="text-center">
										<h3>Payment Details</h3>
										<h5 class="text-center">
											<i class="fa fa-cc-visa" style="font-size:36px; color: black;"></i>
											<i class="fa fa-cc-mastercard" style="font-size:36px; color: black;"></i>
											<i class="fa fa-cc-discover" style="font-size:36px; color: black;"></i>
											<i class="fa fa-cc-amex" style="font-size:36px; color: black;"></i>
										</h5>
										<hr>
										<table class="table">
											<tr>
												@csrf
												<div class="row">
													<div class="input-group col-12" style="margin-bottom: 15px">
														<input class="form-control input-card" style="border: 1px solid #d3a713;color: black!important;" type="number" id="card_number_valid" name="card_number" placeholder="Valid Card Number" @if(!Auth::guest()) @if(Auth::user()->card) value="{{ decrypt(Auth::user()->card) }}" @endif @endif required>
														<div class="input-group-prepend">
															<div class="input-group-text payment-color" style="background-color: #d3a713; border-color: #d3a713"><i id="fa-ico" class="fa fa-credit-card" style="font-size:28px; width: 32px; color: white"></i></div>
														</div>
													</div>

													<div class="input-group col-4">
														<select class="form-control" style="border: 1px solid #d3a713;color: black!important;" name="month" id="" required>
															<option value="01" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '01') selected @endif @endif @endif>01</option>
															<option value="02" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '02') selected @endif @endif @endif>02</option>
															<option value="03" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '03') selected @endif @endif @endif>03</option>
															<option value="04" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '04') selected @endif @endif @endif>04</option>
															<option value="05" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '05') selected @endif @endif @endif>05</option>
															<option value="06" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '06') selected @endif @endif @endif>06</option>
															<option value="07" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '07') selected @endif @endif @endif>07</option>
															<option value="08" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '08') selected @endif @endif @endif>08</option>
															<option value="09" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '09') selected @endif @endif @endif>09</option>
															<option value="10" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '10') selected @endif @endif @endif>10</option>
															<option value="11" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '11') selected @endif @endif @endif>11</option>
															<option value="12" @if(!Auth::guest())  @if(Auth::user()->expiry_month) @if(decrypt(Auth::user()->expiry_month) == '12') selected @endif @endif @endif>12</option>
														</select>
													</div>
													<div class="input-group col-4">
														<select class="form-control" style="border: 1px solid #d3a713;color: black!important;" name="year" id="" required>
															<option value="35" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '35') selected @endif @endif @endif>35</option>
															<option value="34" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '34') selected @endif @endif @endif>34</option>
															<option value="33" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '33') selected @endif @endif @endif>33</option>
															<option value="32" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '32') selected @endif @endif @endif>32</option>
															<option value="31" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '31') selected @endif @endif @endif>31</option>
															<option value="30" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '30') selected @endif @endif @endif>30</option>
															<option value="29" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '29') selected @endif @endif @endif>29</option>
															<option value="28" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '28') selected @endif @endif @endif>28</option>
															<option value="27" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '27') selected @endif @endif @endif>27</option>
															<option value="26" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '26') selected @endif @endif @endif>26</option>
															<option value="25" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '25') selected @endif @endif @endif>25</option>
															<option value="24" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '24') selected @endif @endif @endif>24</option>
															<option value="23" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '23') selected @endif @endif @endif>23</option>
															<option value="22" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '22') selected @endif @endif @endif>22</option>
															<option value="21" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '21') selected @endif @endif @endif>21</option>
															<option value="20" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '20') selected @endif @endif @endif>20</option>
															<option value="19" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '19') selected @endif @endif @endif>19</option>
															<option value="18" @if(!Auth::guest())  @if(Auth::user()->expiry_year)  @if(decrypt(Auth::user()->expiry_year) == '18') selected @endif @endif @else selected @endif>18</option>
														</select>
													</div>
													<div class="input-group col-4">
														<input class="form-control input-card" style="border: 1px solid #d3a713;color: black!important;" type="number" id="cvv" name="cvd" placeholder="CVV"  @if(!Auth::guest()) @if(Auth::user()->cvv) value="{{ decrypt(Auth::user()->cvv) }}" @endif @endif required>
													</div>
													@if(!Auth::guest())
														<input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
													@endif
													<input type="hidden" name="fName" value="{{ $fName }}">
													<input type="hidden" name="lName" value="{{ $lName }}">
													<input type="hidden" name="email" value="{{ $email }}">
													<input type="hidden" name="phone" value="{{ $phone }}">
													<input type="hidden" name="company" value="{{ $company }}">
													<input type="hidden" name="address" value="{{ $address }}">
													<input type="hidden" name="city" value="{{ $city }}">
													<input type="hidden" name="country" value="{{ $country }}">
													<input type="hidden" name="postalCode" value="{{ $postalCode }}">
													<input type="hidden" name="shipping_method" value="{{ $shipping_method }}">
													<input type="hidden" name="payment_method" value="{{ $payment_method }}">
													<input type="hidden" name="total_price" value="{{ $total_price }}">
													<input type="hidden" name="product_id" value="{{ $product_id }}">
													<input type="hidden" name="quantity" value="{{ $quantity }}">
													<input type="hidden" name="size" value="{{ $size }}">
												</div>
											</tr>
										</table>
									</div>
									<button type="submit" class="btn btn-default submit-payment" @if(Auth::guest()) disabled @endif><b>Place Your Order</b></button>
								</form>
							@endif
							<ul class="list-inline" id="first-ul">
								<li class="list-inline-item"><b>Sub-Total</b></li>
								<li class="list-inline-item right-price">${{ number_format(Cart::subtotal(),2) }}</li>
								<li class="list-inline-item"><b>Tax(15%)</b></li>
								<li class="list-inline-item right-price">${{ number_format(Cart::tax(),2) }}</li>
								<li class="list-inline-item"><b>Shipping</b></li>
								<li class="list-inline-item right-price">${{ number_format($ship_price,2) }}</li>
								@if(session('coupon'))
									@if(session('coupon')['type'] == 'fixed')
										<li class="list-inline-item"><b>Discount(${{ number_format(session('coupon')['discount'],2) }})</b></li>
									@else
										<li class="list-inline-item"><b>Discount({{ session('coupon')['discount'] }}%)</b></li>
									@endif
									<li class="list-inline-item right">${{ number_format(session('coupon')['discount_price'],2) }}</li>
								@endif
							</ul>
							<ul class="list-inline" id="second-ul">
									<li class="list-inline-item"><b>Total</b></li>
									<li class="list-inline-item cart-right"><b>${{ number_format($total_price,2) }}</b></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@endsection

	@section('script-part')
		
	@endsection
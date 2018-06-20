
@if(Cart::count() != 0)

    <!--// Cart Item Part When Cart is not Empty -->
    <div class="container-fluid" id="cart-section">
        <div class="row">
            <div class="container">

                <div class="row" id="cart-title">
                    <div class="col-12">
                        <h1>Your Cart</h1>
                    </div>
                </div>
                @if(session()->has('message_coupon'))
                    <div class="alert alert-success text-center" id="coupon_m2" style="background-color: #d3a713; color: black; border: none;">
                        <strong>{{ session('message_coupon') }}</strong>
                    </div>
                @endif
                <div class="alert alert-success text-center" id="coupon_m" style="display: none; background-color: #d3a713; color: black; border: none;">
                    <strong> Coupons are valid only for our users.</strong>
                </div>
                <div class="alert alert-success text-center" id="qty_m" style="display: none; background-color: #d3a713; color: black; border: none;">
                    <strong> Quantity must be between 1 and 10.</strong>
                </div>

                <div class="row">
                    <table class="table">
                        <thead id="thead">
                        <tr>
                            <th scope="col">YOUR CART ITEMS</th>
                            <th id="turn-off" scope="col" class="center">Price</th>
                            <th scope="col" class="right">Quantity</th>
                            <th id="turn-off" scope="col" class="right">Sub-Total</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @foreach(Cart::content() as $item)
                            <input type="hidden" value="{{ $item->qty }}" id="qty_value">
                            <tr>
                                <td><img class="image" src="{{ asset('/images/logo.jpg') }}" alt="Donair Spice"> <span class="logo-name">{{ $item->name }}</span> - {{ $item->options->size }} Pcs</td>
                                <td class="center specialClass" id="padding"><b>${{ number_format($item->price,2) }}</b></td>
                                <td class="right"><input type="number" name="qnt" id="qty_id" value="{{ $item->qty }}" min="1" max="10" onchange="Qty('{{ $item->rowId }}')" @if(session('coupon')) disabled @endif> @if(!session('coupon')) <span class="delete"><a onclick="Delete()" style="cursor: pointer;"><i class="fas fa-times"></i></a></span> @endif</td>
                                <td class="right specialClass" id="padding-price"><b><span class="price">${{ number_format($item->price * $item->qty,2) }}</span></b></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="row" id="cart-box">
                    <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-5 offset-md-7 col-lg-3 offset-lg-9" id="cartt">
                        @if(Auth::guest())
                            <label class="sr-only" for="cupon">Username</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="cupon" placeholder="Enter Code" style="text-transform: uppercase;">
                                <div class="input-group-prepend">
                                    <a href="#"><div class="input-group-text" id="input-group-text" style="cursor: pointer;" onclick="Coupon()">Apply</div></a>
                                </div>
                            </div>
                        @else
                            @if(!session('coupon'))
                                <form action="{{ route('coupon') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <label class="sr-only" for="cupon">Username</label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="code" class="form-control" id="cupon" placeholder="Enter Code" style="text-transform: uppercase;" required>
                                        <div class="input-group-prepend">
                                            <button type="submit" class="input-group-text" id="input-group-text" style="cursor: pointer;">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('coupon.destroy') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <label class="sr-only" for="cupon">Username</label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="code" class="form-control" id="cupon" value="{{ session('coupon')['name'] }}" disabled>
                                        <div class="input-group-prepend">
                                            <button type="submit" class="input-group-text" id="input-group-text" style="cursor: pointer;">Remove Coupon</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endif

                        <ul class="list-inline">
                            <li class="list-inline-item">Sub-Total</li>
                            <li class="list-inline-item right">${{ number_format(Cart::subtotal(),2) }}</li>
                            <li class="list-inline-item">Tax(15%)</li>
                            <li class="list-inline-item right">${{ number_format(Cart::tax(),2) }}</li>
                            @if(session('coupon'))
                                @if(session('coupon')['type'] == 'fixed')
                                    <li class="list-inline-item">Discount(${{ number_format(session('coupon')['discount'],2) }})</li>
                                @else
                                    <li class="list-inline-item">Discount({{ session('coupon')['discount'] }}%)</li>
                                @endif
                                <li class="list-inline-item right">${{ number_format(session('coupon')['discount_price'],2) }}</li>
                                <li class="list-inline-item"><b>Total</b></li>
                                <li class="list-inline-item right"><b>${{ number_format(session('coupon')['newSubtotal'],2) }}</b></li>
                            @else
                                <li class="list-inline-item"><b>Total</b></li>
                                <li class="list-inline-item right"><b>${{ number_format(Cart::total(),2) }}</b></li>
                            @endif
                        </ul>
                    </div>
                </div>


                <div class="row" id="cart-checkout">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="continue-shopping">
                        <a href="{{ route('home') }}"><b><span id="left-arrow"><i class="fas fa-arrow-left"></i></span> CONTINUE SHOPPING</b></a>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="checkout">
                        <a href="{{ route('pre-checkout') }}"><b>CHECK-OUT <span id="right-arrow"><i class="fas fa-arrow-right"></i></span></b></a>
                    </div>
                </div>

            </div>
        </div>
    </div><!--// End of Cart Part -->

@else

    <div class="container-fluid justify-content-center" id="cart-empty" style="margin-top: 100px;">

        <div class="row">
            <div class="container align-self-center">
                <div class="row">
                    <div class="col-12 text-center" id="empty">
                        <h1 id="cart-icon"><i class="fab fa-opencart fa-4x"></i></h1><br>
                        <h2>Cart is Currently Empty</h2>
                        <a href="{{ route('home') }}"><button class="btn btn-default"><b>BACK TO SHOP</b></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@csrf

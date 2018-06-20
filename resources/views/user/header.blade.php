<!-- ==============================DESKTOP NAV================== -->

<nav class="navbar navbar-expand-lg navbar-light" id="navigation">
 <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('/images/logo.jpg') }}" width="90" height="90" class="d-inline-block align-top" alt="Donair Spice">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end navbarNavDropdown" id="navbarNavDropdown">
    <ul class="navbar-nav" id="cart_num">
      <li class="nav-item active" onclick="scrollIt('about-section');">
        <a class="nav-link">about <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" onclick="scrollIt('product-section')";>
        <a class="nav-link">shop</a>
      </li>
      <li class="nav-item" onclick="scrollIt('review-section')";>
        <a class="nav-link">faqs</a>
      </li>
      <li class="nav-item" onclick="scrollIt('contact-section')";>
        <a class="nav-link">contact</a>
      </li>


      <li class="nav-item" style="display:block;">
          <a href="{{ route('cart') }}" style="text-decoration: none;">
            <div class="container" id="cart">
                <div class="row">
                    <div class="col-6 text-left">
                        <p>Cart<i class="fas fa-shopping-cart"></i><span class="badge badge-light">{{ Cart::count() }}</span></p>
                    </div>
                    <div class="col-4 text-right">
                        @if(!session('coupon'))
                            <p class="sub_hed">${{ number_format(Cart::total(),2) }}</p>
                        @else
                            <p class="sub_hed">${{ number_format(session('coupon')['newSubtotal'],2) }}</p>
                        @endif
                    </div>
                </div>
            </div>
          </a>
      </li>
        <!-- ===============OVA DVA SU KADA NIJE ULOGOVAN=============-->
        @if(Auth::guest())
      <li class="nav-item" style="display:block;">
        <div class="container" id="log-sign">
        	<div class="row">
        		<div id="no-padding" class="col-12 text-left">
        			<p><a href="#"><label for="modal-toggle" onclick="openSignUp();"><span class="hoverable"> Log In </span></label></a> <span class="color"> | </span> <a href="#"><label for="modal-toggle" onclick="openLogin();"><span class="hoverable"> Sign Up </span></label></a> </p>
        		</div>
        	</div>
        </div>
      </li>
       <!-- ============/OVA DVA SU KADA NIJE ULOGOVAN===========-->
        @else
       <!-- ===========OVA DVA SU KADA JE ULOGOVAN===========-->

		<li class="nav-item" style="border:1px dashed #d3a713; padding: 6px; font-size: 1.2rem;">
            <div class="container" id="log-sign">
                <div class="row">
                    <div class="col-12 text-left">
                        <p class="text-center"> Hello, <a href="{{ route('profile') }}" style="text-decoration: none;"><span class="hoverable"> {{ Auth::user()->first_name }} </span></a>

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" style="text-decoration: none; color: white;">Sign out</a>
                        </p>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </li>
       @endif
       <!-- ===========OVA DVA SU KADA JE ULOGOVAN===========-->

    </ul>
  </div>
</nav>

<!-- ==========================/DESKTOP NAV================== -->



<!-- ==============================MOBILE NAV================-== -->

<nav class="navbar navbar-expand-lg navbar-light" id="mobile-navigation">
 <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('/images/logo.jpg') }}" width="70" height="70" class="d-inline-block align-top" alt="Donair Spice">
  </a>

<!-- ========OVO JE BLOK ZA MOBILNI KADA NIJE ULOGOVAN======== -->
    @if(Auth::guest())
  <div id="mobile-nav-pics-not-logged-in" class="nesto12" style="display:block;">

	<a href="#"><label for="modal-toggle" onclick="openSignUp();"><i class="fas fa-user icons" title="Already have account? Login here!"></i></label></a>

	<a href="#"><label for="modal-toggle" onclick="openLogin();"><i class="fas fa-user-plus icons" title="Don't have an account? Sign up now!"></i></label></a>

	<a id="anime" href="{{ route('cart') }}"><i class="fas fa-shopping-cart icons" title="Cart"></i>
	<span id="nesto" class="badge badge-light">{{ Cart::count() }}</span></a>

	<i class="fas fa-ellipsis-v navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"></i>

  </div>
@else
<!-- ========OVO JE BLOK ZA MOBILNI KADA NIJE ULOGOVAN======== -->



<!-- ==========OVO JE BLOK ZA MOBILNI KADA JE ULOGOVAN========== -->

  <div id="mobile-nav-pics-logged-in" class="nesto12">

  	<a href="{{ route('profile') }}"><i class="fas fa-user icons" title="Profile"></i></a>

  	<a href="{{ route('cart') }}"><i id="anime" class="fas fa-shopping-cart icons"  title="Cart"></i>
	<span id="nesto" class="badge badge-light">{{ Cart::count() }}</span></a>

	<i class="fas fa-ellipsis-v navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"></i>

  </div>
@endif
  <!-- ========/OVO JE BLOK ZA MOBILNI KADA JE ULOGOVAN========== -->


  <div class="collapse navbar-collapse justify-content-end navbarNavDropdown" id="navbarNavDropdown2">
    <ul class="navbar-nav">
      <li class="nav-item active" onclick="scrollIt('about-section');">
        <a class="nav-link" href="#">about <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" onclick="scrollIt('product-section');">
        <a class="nav-link" href="#">shop</a>
      </li>
      <li class="nav-item" onclick="scrollIt('review-section');">
        <a class="nav-link" href="#">faqs</a>
      </li>
      <li class="nav-item" onclick="scrollIt('contact-section');">
        <a class="nav-link" href="#">contact</a>
      </li>
        @if(!Auth::guest())
      <!-- ============COA OVO TREBA UKLJUCIS KADA JE ULOGOVAN, KADA NIJE NEMA ===========-->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">sign out</a>
      </li>
      <!-- ============COA OVO TREBA UKLJUCIS KADA JE ULOGOVAN, KADA NIJE NEMA ===========-->
        @endif
    </ul>
  </div>
</nav>

<!-- ==============================/MOBILE NAV================== -->

<!-- ===================MODAL WINDOW =============== -->

   <input id="modal-toggle" type="checkbox">
    <label class="modal-backdrop" for="modal-toggle"></label>
    <div id="content" class="modal-content">
        <label class="modal-close-btn align-self-center" for="modal-toggle">
		      <svg width="50" height="50">
            <line x1="10" y1="10" x2="40" y2="40"/>
		        <line x1="40" y1="10" x2="10" y2="40"/>
		      </svg>
	      </label>
        <div class="tabs">
<!--  LOG IN  -->
            <input class="radio" id="tab-1" name="tabs-name" type="radio" checked>
            <label for="tab-1" class="table john-cena"><span>Login</span></label>

            <div class="tabs-content">
                @if(count($errors) >0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning" style="background-color: #d3a713; color: black;">
                            <strong>Error!</strong> {{ $error }}
                        </div>
                    @endforeach
                @endif
                    <div class="alert alert-warning" id="alert_error" style="background-color: #d3a713; color: black; display: none;">
                        <strong>Error!</strong> Username and password do not match.
                    </div>
                    <div class="alert alert-warning" id="alert_success" style="background-color: #d3a713; color: black; display: none;">
                        <strong>Success!</strong> Successfully login.
                    </div>
                    <div class="alert alert-warning" id="alert_success_reg" style="background-color: #d3a713; color: black; display: none;">
                        <strong>Success!</strong> Successfully registration.
                    </div>
                    <div class="alert alert-warning" id="alert_fill" style="background-color: #d3a713; color: black; display: none;">
                        <strong>Error!</strong> Please to fill all fields.
                    </div>

               <div class="login_socnet">
                    <a href="" aria-hidden="true"><i class="fab fa-facebook-square asd"></i></a>
                   <a href="{{ route('google.login') }}" aria-hidden="true"><i class="fab fa-google-plus-square asd"></i></a>
               </div>
               <form  method="POST" action="{{ route('login') }}">
                   @csrf
                   <input type="email" name="email" id="email_l" placeholder="Email" required>
                   <input type="password" name="password" id="password_l" placeholder="Password" required>
                   <input type="button" onclick="Login()" value="Log In" id="sub_login">
               </form>
               <form class="forgot-password" method="POST" action="{{ route('password.email') }}">
                   @csrf
                   <input id="forgot-password-toggle" type="checkbox">
                   <label for="forgot-password-toggle">Forgot Password?</label>
                   <div class="forgot-password-content">
                       <input type="email" name="email" placeholder="Reset Password Email" required>
                       <input type="submit" value="Send">
                   </div>
               </form>
            </div>
<!--  SIGN UP  -->
            <input class="radio" id="tab-2" name="tabs-name" type="radio">
            <label for="tab-2" class="table john-cena"><span>Sign up</span></label>
            <div class="tabs-content">

                @if(count($errors) >0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning" style="background-color: #d3a713; color: black;">
                            <strong>Error!</strong> {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div class="alert alert-warning" id="alert_error_reg" style="background-color: #d3a713; color: black; display: none;">
                    <strong>Error!</strong> Username and password is not valid.
                </div>
                <div class="alert alert-warning" id="alert_success_reg" style="background-color: #d3a713; color: black; display: none;">
                    <strong>Success!</strong> Successfully registration.
                </div>
                <div class="alert alert-warning" id="alert_fill_reg" style="background-color: #d3a713; color: black; display: none;">
                    <strong>Error!</strong> Please to fill all fields.
                </div>

                <div class="login_socnet">
                   <a href="" aria-hidden="true"><i class="fab fa-facebook-square asd"></i></a>
                   <a href="{{ route('google.login') }}" aria-hidden="true"><i class="fab fa-google-plus-square asd"></i></a>
               </div>
               <form method="POST" action="{{ route('register') }}">
                   @csrf
                   <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
                   <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                   <input type="email" name="email" id="email1" placeholder="Email" required>
                   <input type="password" name="password" id="password1" placeholder="Password" required>
                   <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                   <input type="button" onclick="Register()" value="Sign Up" id="sub_login">
               </form>
            </div>
<!--  SHOP  -->
        <input class="radio" id="tab-3" name="tabs-name" type="radio">
            <label for="tab-3" class="table camo"></label>
            <div class="tabs-content">
              <div class="container-fluid">
                  <form action="{{ route('cart.store') }}" method="POST">
                    <div class="row">
                            @csrf

                            <div class="col-12 text-right"><span id="exit"><h4 style="margin-top: -23px;"><label class="modal-close-btn align-self-center" for="modal-toggle">x</label></h4></span></div>
                              <div class="col-12 text-center"><h1 id="caption">Donair Spice</h1>
                                  <input type="hidden" name="name" value="Donair Spice">
                                  <h2 id="price">PRICE: $ 29.99</h2>
                                  <div id="img-carry">
                                    <img onclick="clickImage(this)" class="img-fluid col-4" src="{{ asset('/images/pepitko.png') }}" alt="5">
                                    <img onclick="clickImage(this)" class="img-fluid col-4" src="{{ asset('/images/desetko.png') }}" alt="10">
                                  </div>
                                  <div class="row" id="bags">
                                    <div class="offset-1 col-5 text-center">5 Bags - $29.99</div>
                                    <div class="col-5 text-center">10 Bags - $59.99</div>
                                  </div>
                                  <div id="desc">Quantity: <input type="number" name="quantity" min=1 max=10 value="1"></div>
                              </div>
                                <div class="col-12 text-left">
                                </div>
                                <div class="offset-1 col-10 text-center"><a href="{{ route('cart') }}"><button type="submit" class="btn btn-danger" id="add">Add To Cart</button></a></div>
                                <div class="col-12 text-left"><a href="#"><h3 id="nutrition">Nutritional Label</h3></a></div>

                              <!-- OVDE TI SE NALAZI VREDNOST KOJI JE PAKET IZABRAO!!!!!!!!!!!!!!!!!!!!!!-->

                                <input type="hidden" name="size" value="5" id="five-or-ten">

                      <!-- OVDE TI SE NALAZI VREDNOST KOJI JE PAKET IZABRAO!!!!!!!!!!!!!!!!!!!!!!-->
                      <input type="hidden" name="status" value=0 id="status">
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>    

    @section('script-part-two')
        <script>
            function Login() {
                var email = $("#email_l").val();
                var password = $("#password_l").val();

                if (!email) {
                    $("#alert_fill").show();
                    setTimeout(function () {
                        $("#alert_fill").hide();
                    },3000);
                } else if(!password){
                    $("#alert_fill").show();
                    setTimeout(function () {
                        $("#alert_fill").hide();
                    },3000);
                }

                $.post('{{ route('login') }}', {'email': email,'password': password,'_token': $('input[name=_token]').val()}, function (data) {
                    if (data == 'yes') {
                        $("#alert_success").show();
                        setTimeout(function () {
                            location.reload();
                        },1000);
                    } else {
                        $("#alert_error").show();
                        setTimeout(function () {
                            $("#alert_error").hide();
                        },3000);
                    }
                });
            }

            function Register() {
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var email = $("#email1").val();
                var password = $("#password1").val();
                var password_confirmation = $("#password_confirmation").val();

                if (!email) {
                    $("#alert_fill_reg").show();
                    setTimeout(function () {
                        $("#alert_fill_reg").hide();
                    },3000);
                } else if(!password){
                    $("#alert_fill_reg").show();
                    setTimeout(function () {
                        $("#alert_fill_reg").hide();
                    },3000);
                } else if(!first_name){
                    $("#alert_fill_reg").show();
                    setTimeout(function () {
                        $("#alert_fill_reg").hide();
                    },3000);
                } else if(!last_name){
                    $("#alert_fill_reg").show();
                    setTimeout(function () {
                        $("#alert_fill_reg").hide();
                    },3000);
                } else if(!password_confirmation){
                    $("#alert_fill_reg").show();
                    setTimeout(function () {
                        $("#alert_fill_reg").hide();
                    },3000);
                }

                $.post('{{ route('register') }}', {'first_name':first_name,'last_name':last_name,'email': email,'password' : password, 'password_confirmation' : password_confirmation,'_token': $('input[name=_token]').val()}, function (data) {
                    if (data) {
                        location.reload();
                    }
                });

                setTimeout(function () {
                    $("#alert_error_reg").show();
                    setTimeout(function () {
                        $("#alert_error_reg").hide();
                    },3000);
                },2000);
            }
        </script>
    @endsection
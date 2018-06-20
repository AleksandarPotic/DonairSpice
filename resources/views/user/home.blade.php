@section('title', 'Donair Spice | Home Page')

@section('keywords', '')
@section('description', '')

@extends('user.layouts.master')

@section('content')

	
	<!--// Front Slider -->
	<div id="slides">
	    <div class="slides-container">
	      	<img src="{{ asset('/images/one.jpg') }}" alt="Donair Spice">
	      	<img src="{{ asset('/images/two.jpg') }}" alt="Donair Spice">
	      	<img src="{{ asset('/images/three.jpg') }}" alt="Donair Spice">
	      	<img src="{{ asset('/images/four.jpg') }}" alt="Donair Spice">
	    </div>

	    <nav class="slides-navigation">
	      	<a href="#" class="next right-a"><i class="fas fa-arrow-circle-right fa-2x"></i></a>
	      	<a href="#" class="prev left-a"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
	    </nav>
  	</div> <!--// End of Front Slider -->

  		<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center" id="product-title">
				<h1>We're always here for you</h1>
			</div>
		</div>
	</div> <!--// End of Text Section -->

	
	
	<div class="container-fluid" id="about-section" style="background-image: url('{{ asset('/images/about.jpg') }}');">
		<div id="wraper">
			
		</div>
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-12" id="about-title">
						<h1>About Us</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="about-left">
						<p class="about-p">Our mission is to be <span style="color:#d3a713">the leader</span> in spice blend innovation and recipe content. We thrive to innovate one dish at a time. We believe cooking is easy when the product works.</p>
					</div>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="about-right">
						<p class="about-p"><span style="color:#d3a713">Donair Spice</span> is a game-changing multi-purpose blend that allows you to make tradition Donair. It's a 50 year old recipe that tastes great.</p>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!--// Text Between Testemonials and Product -->





	<!--// Product Section -->
	<div class="container-fluid justify-content-center" id="product-section" style="background-image: url('{{ asset('/images/flekaa.jpg') }}');">
		<div class="row">
			<div class="container align-self-center">
				<div class="row">
					<div class="col-12 text-center product">
						<h2>Donair Spice</h2>
						<img class="img-fluid" src="{{ asset('/images/dionir.png') }}" alt="Donair Spice">
						<ul class="list-inline">
							<li class="list-inline-item"><a id="special" onclick="openShop()"><label id="special-label" for="modal-toggle">Shop Now</label></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> <!--// End of Product Section -->

	<!--// Testimonial Secion -->
	<div id="review-section" style="background-image: url('{{ asset('/images/spice.jpg') }}');">

		<div id="wraper">
			
		</div>
			
		<div class="container" id="review-content">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<h1>Testimonials</h1>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					
				</div>
			</div>
			
			 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
		        <div class="carousel-inner row w-100 mx-auto" role="listbox">
		            <div class="carousel-item col-md-6 active">
		               <div class="panel panel-default">
		                  <div class="panel-thumbnail">
		                    <a href="#" title="image 1" class="thumb">
		                    	<p class="review-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus iste accusantium expedita recusandae voluptates illo architecto excepturi soluta saepe! Necessitatibus, veritatis? Maiores veritatis odio consequuntur a totam qui, illum. Error.</p>
		                    </a>
		                    <div class="line"></div><br>
		                    <h3><span class="qoute">"</span> Mat</h3>
		                  </div>
		                </div>
		            </div>

		            <div class="carousel-item col-md-6">
		               <div class="panel panel-default">
		                  <div class="panel-thumbnail">
		                    <a href="#" title="image 3" class="thumb">
		                     <p class="review-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam molestias eos consectetur recusandae laborum modi at saepe dicta nisi rem voluptate repellat itaque quidem optio quod provident, sequi a quaerat.</p>
		                    </a>
		                    <div class="line"></div><br>
		                    <h3><span class="qoute">"</span> Marko</h3>
		                  </div>
		                </div>
		            </div>
					
					
		            <div class="carousel-item col-md-6 ">
		               <div class="panel panel-default">
		                  <div class="panel-thumbnail">
		                    <a href="#" title="image 4" class="thumb">
		                     <p class="review-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium voluptatem dolorem repellat nulla natus, architecto tenetur tempore ducimus dolores minima facilis explicabo, voluptatum optio autem. In quam magnam expedita nemo.!</p>
		                    </a>
		                    <div class="line"></div><br>
		                    <h3><span class="qoute">"</span> Trape</h3>
		                  </div>
		                </div>
		            </div>
		            <div class="carousel-item col-md-6">
		                <div class="panel panel-default">
		                  <div class="panel-thumbnail">
		                    <a href="#" title="image 5" class="thumb">
		                     <p class="review-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci vel magni doloremque accusamus fugiat cumque. Deleniti, amet neque. Nemo quas laudantium consequatur ducimus perferendis tenetur id. Earum, architecto ad illum!</p>
		                    </a>
		                    <div class="line"></div><br>
		                    <h3><span class="qoute">"</span> Coa</h3>
		                  </div>
		                </div>
		            </div>
		        </div>
		        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
		            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		            <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next text-faded" href="#myCarousel" role="button" data-slide="next">
		            <span class="carousel-control-next-icon" aria-hidden="true"></span>
		            <span class="sr-only">Next</span>
		        </a>
		    </div>
		</div>
	</div><!--// End of Testimonial Section -->
	
	
	
	<!--// Contact Us Section -->
	<div class="container-fluid" id="contact-section">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="left-contact">
						<h1>Donair Spice</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur non temporibus commodi neque numquam alias soluta tempore, libero officia, iste mollitia harum accusamus laboriosam ea sapiente culpa veritatis? Possimus, fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero est possimus tempora at non dolores quisquam, natus temporibus dignissimos distinctio, perspiciatis harum magnam fugiat repellendus voluptas quibusdam aut tempore fuga!</p>
						
						<hr>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur non temporibus commodi neque numquam alias soluta tempore, libero officia, iste mollitia harum accusamus laboriosam ea sapiente culpa veritatis? Possimus, fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero est possimus tempora at non dolores quisquam, natus temporibus dignissimos distinctio, perspiciatis harum magnam fugiat repellendus voluptas quibusdam aut tempore fuga!</p>

					</div>

					<div class="col-12 col-sm-12 col-md-6 col-lg-6" id="right-contact">
						<h1>Tell us something...</h1>
						<form action="{{ route('contact') }}" method="POST">
							@csrf
							<div class="boxes">
								<label class="containerr">GENERAL INQUIRY
								  <input type="radio" value="GENERAL INQUIRY" name="mess_t" checked="checked">
								  <span class="checkmark"></span>
								</label>
							</div>

							<div class="row">
								<div class="input-group">
									<div class="col-12">
										<input id="important" class="form-control inputs important" type="email" name="email" placeholder="Enter Email" required="">
									</div>
									
									<div class="col-12">
										<input id="important" class="form-control inputs important" type="text" name="Fname" placeholder="Enter First Name" required="">
									</div>

									<div class="col-12">
										<input id="important" class="form-control inputs important" type="text" name="Lname" placeholder="Enter Last Name" required="">
									</div>

									<div class="col-12">
										<textarea id="important" class="form-control important" rows="5" name="mess" placeholder="Your Message" required=""></textarea>
									</div>

									<div class="col-12">
										<button type="submit" class="btn btn-default">SEND</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!--// End of Contact Us -->


	
	<!--// Instagram Feed -->
	<div class="container-fluid" id="instagram-feed">
		<div class="row">
			<div class="col-12 text-center">
				<script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe id="ajfrejm" src="//lightwidget.com/widgets/e6a5b8d7aa36505b9137ff494803c952.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
			</div>
		</div>
	</div><!--// End of Instagram Feed -->
	
@endsection

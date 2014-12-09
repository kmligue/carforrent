@extends('client.layout')

@section('content')
	
	<div class="container" id="home">
		<div class="header-menu" style="display: block">
			<div class="row">
				<div class="col-sm-6 logo">
					<img src="http://placehold.it/185x75">
				</div>
				<div class="col-sm-6 pad-top-10">
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="active"><a class="flat" href="#home">Home</a></li>
						<li role="presentation"><a data-scroll class="flat" href="#available-cars">Available Cars</a></li>
						<li role="presentation"><a class="flat" href="#about">About Us</a></li>
						<li role="presentation"><a class="flat" href="#contact">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="header-menu-scroll col-xs-12 clearfix navbar-fixed-top" style="display: none; position: fixed; background-color: rgb(47, 47, 47); z-index: 999;">
		<div class="row">
			<div class="col-sm-6 logo">
				<img src="http://placehold.it/185x45">
			</div>
			<div class="col-sm-6" style="padding-top: 2px;">
				<ul class="nav nav-pills pull-right">
					<li role="presentation" class="active"><a class="flat" href="#home">Home</a></li>
					<li role="presentation"><a data-scroll class="flat" href="#available-cars">Available Cars</a></li>
					<li role="presentation"><a class="flat" href="#about">About Us</a></li>
					<li role="presentation"><a class="flat" href="#contact">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>

	<header class="clearfix">
		<div class="jumbotron">
			<div class="container">
				<div class="tagline">
					<h1>To travel is to take a journey</h1> <br>
					<h1>into yourself</h1>
				</div>
				
				<div class="col-sm-5 col-sm-offset-7 clearfix booking">
					<div class="panel panel-default">
						<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li role="presentation" class="active text-center"><a href="#">Quick Book</a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="quick">
								<form action="" method="POST" role="form">
									<div class="form-group">
										<select class="form-control flat text-capitalize" placeholder="Enter Location">
											<option style="display: none; color: #777;">Enter Location</option>
											@foreach($locations as $location)
												<option class="text-capitalize" value="{{ $location->id }}">{{ $location->address }}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5" style="padding-left: 0">
											<input type="text" class="form-control flat small-font pad-5" id="datepicker1" placeholder="Pick-up date">
											<i class="glyphicon glyphicon-calendar input-icon"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5">
											<select class="form-control flat small-font pad-5">
												<option value="">Time</option>
												<option value="00:00">00:00</option>
												<option value="00:30">00:30</option>
												<option value="01:00">01:00</option>
												<option value="01:30">01:30</option>
												<option value="02:00">02:00</option>
												<option value="02:30">02:30</option>
												<option value="03:00">03:00</option>
												<option value="03:30">03:30</option>
												<option value="04:00">04:00</option>
												<option value="04:30">04:30</option>
												<option value="05:00">05:00</option>
												<option value="05:30">05:30</option>
												<option value="06:00">06:00</option>
												<option value="06:30">06:30</option>
												<option value="07:00">07:00</option>
												<option value="07:30">07:30</option>
												<option value="08:00">08:00</option>
												<option value="08:30">08:30</option>
												<option value="09:00">09:00</option>
												<option value="09:30">09:30</option>
												<option value="10:00">10:00</option>
												<option value="10:30">10:30</option>
												<option value="11:00">11:00</option>
												<option value="11:30">11:30</option>
												<option value="12:00">12:00</option>
												<option value="12:30">12:30</option>
												<option value="13:00">13:00</option>
												<option value="13:30">13:30</option>
												<option value="14:00">14:00</option>
												<option value="14:30">14:30</option>
												<option value="15:00">15:00</option>
												<option value="15:30">15:30</option>
												<option value="16:00">16:00</option>
												<option value="16:30">16:30</option>
												<option value="17:00">17:00</option>
												<option value="17:30">17:30</option>
												<option value="18:00">18:00</option>
												<option value="18:30">18:30</option>
												<option value="19:00">19:00</option>
												<option value="19:30">19:30</option>
												<option value="20:00">20:00</option>
												<option value="20:30">20:30</option>
												<option value="21:00">21:00</option>
												<option value="21:30">21:30</option>
												<option value="22:00">22:00</option>
												<option value="22:30">22:30</option>
												<option value="23:00">23:00</option>
												<option value="23:30">23:30</option>
											</select>
											<i class="glyphicon glyphicon-time input-icon"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5">
											<input type="text" class="form-control flat small-font pad-5" id="datepicker2" placeholder="Return date">
											<i class="glyphicon glyphicon-calendar input-icon"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5" style="padding-right: 0;">
											<select class="form-control flat small-font pad-5">
												<option value="">Time</option>
												<option value="00:00">00:00</option>
												<option value="00:30">00:30</option>
												<option value="01:00">01:00</option>
												<option value="01:30">01:30</option>
												<option value="02:00">02:00</option>
												<option value="02:30">02:30</option>
												<option value="03:00">03:00</option>
												<option value="03:30">03:30</option>
												<option value="04:00">04:00</option>
												<option value="04:30">04:30</option>
												<option value="05:00">05:00</option>
												<option value="05:30">05:30</option>
												<option value="06:00">06:00</option>
												<option value="06:30">06:30</option>
												<option value="07:00">07:00</option>
												<option value="07:30">07:30</option>
												<option value="08:00">08:00</option>
												<option value="08:30">08:30</option>
												<option value="09:00">09:00</option>
												<option value="09:30">09:30</option>
												<option value="10:00">10:00</option>
												<option value="10:30">10:30</option>
												<option value="11:00">11:00</option>
												<option value="11:30">11:30</option>
												<option value="12:00">12:00</option>
												<option value="12:30">12:30</option>
												<option value="13:00">13:00</option>
												<option value="13:30">13:30</option>
												<option value="14:00">14:00</option>
												<option value="14:30">14:30</option>
												<option value="15:00">15:00</option>
												<option value="15:30">15:30</option>
												<option value="16:00">16:00</option>
												<option value="16:30">16:30</option>
												<option value="17:00">17:00</option>
												<option value="17:30">17:30</option>
												<option value="18:00">18:00</option>
												<option value="18:30">18:30</option>
												<option value="19:00">19:00</option>
												<option value="19:30">19:30</option>
												<option value="20:00">20:00</option>
												<option value="20:30">20:30</option>
												<option value="21:00">21:00</option>
												<option value="21:30">21:30</option>
												<option value="22:00">22:00</option>
												<option value="22:30">22:30</option>
												<option value="23:00">23:00</option>
												<option value="23:30">23:30</option>
											</select>
											<i class="glyphicon glyphicon-time input-icon"></i>
										</div>
									</div>
								
									<button type="submit" class="btn btn-small flat pull-right" style="margin-top: 10px; background-color: #ed9419; color: white">Book Now</button>
								</form>
							</div>
							<div class="manage"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
	</header>

	<section>
		<div class="container">
			<div>
				<h3 id="available-cars">Available Cars</h3>
			</div>
			
			@foreach($cars as $car)
			<div class="col-sm-4 cars-container">
				<div class="panel panel-default">
					<div class="panel-body">
						<p class="price">Php {{ number_format($car->rate, 2) }} per day</p>
						<div class="pad-lr-25">
							<img class="img-responsive" src="/assets/uploads/{{ $car->image }}">
							<p class="car-name text-center text-capitalize">{{ $car->name }}</p>
							<div class="car-details">
								<p class="text-capitalize">Style: {{ $car->style }}</p>
								<p>Seating Capacity: {{ $car->seating }}</p>
								<p class="text-capitalize">Transmission: {{ $car->transmission }}</p>
								<div class="text-center">
									<button type="button" class="btn btn-book">Book Now</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</section>

	<section class="about clearfix" id="about">
		<div class="col-sm-6 col-sm-offset-3 about">
			<h2 class="text-center">About Us</h2>
			<p class="text-justify">U-DriveBohol is your friendly travel partner to Bohol. We offer safe and comfortable tour and travel services to Bohol's top tourist destinations such as the Chocolate Hills. We  also provide car rental services for those looking to rent a car, van, or motorcycle anywhere in the province. Contact us now for your bookings and inquiries!</p>
		</div>
	</section>

	<section class="contact clearfix" id="contact">
		<div class="col-sm-12 contact">
			<h2 class="text-center">Contact Us</h2>

			<div class="col-sm-6 col-sm-offset-3">
				<form action="" method="POST" role="form">
				
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email">
					</div>

					<div class="form-group">
						<label for="message">Message</label>
						<textarea class="form-control" id="message" name="message"></textarea>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</section>

@stop
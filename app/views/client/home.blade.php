@extends('client.layout')

@section('content')
	
	<div id="home"></div>

	<div class="container">
		<div class="header-menu" style="display: block">
			<div class="row">
				<div class="col-sm-6 logo">
					<img src="http://placehold.it/185x75">
				</div>
				<div class="col-sm-6 pad-top-10" id="">
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="active"><a class="flat" href="#home">Home</a></li>
						<li role="presentation"><a class="flat" href="#available-cars">Available Cars</a></li>
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
			<div class="col-sm-6" style="padding-top: 2px;" id="scrollspy">
				<ul class="nav nav-pills pull-right">
					<li role="presentation"><a class="flat" href="#home">Home</a></li>
					<li role="presentation"><a class="flat" href="#available-cars">Available Cars</a></li>
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
					<h1>Rent a Car at U-Drive Bohol</h1> <br>
					<h1>u-drivebohol.com</h1>
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
								{{ Form::open(array('url' => '/cars')) }}
									
									@if($errors->count() > 0)
										<div class="alert alert-danger">
											@foreach($errors->all() as $error)
												<div>{{ $error }}</div>
											@endforeach
										</div>
									@endif

									@if(Session::has('error'))
										<div class="alert alert-danger">
											{{ Session.get('error') }}
										</div>
									@endif

									<div class="form-group">
										<select class="form-control flat text-capitalize" name="location" placeholder="Enter Location">
											<option style="display: none; color: #777;" value="">Enter Location</option>
											@foreach($locations as $location)
												<option class="text-capitalize" value="{{ $location->id }}" {{ Input::old('location') == $location->id ? 'selected' : '' }}>{{ $location->address }}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" name="diff-location" {{ Input::old('diff-location') == 'on' ? 'checked' : '' }}> <span class="text-muted">Returning to Different location</span>
										</label>
										<select class="form-control flat text-capitalize" name="return-loc" placeholder="Return Location" style="display: {{ Input::old('diff-location') == 'on' ? 'block;' : 'none;' }}">
											<option style="display: none; color: #777;" value="">Return Location</option>
											@foreach($locations as $location)
												<option class="text-capitalize" value="{{ $location->id }}" {{ Input::old('return-loc') == $location->id ? 'selected' : '' }}>{{ $location->address }}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5" style="padding-left: 0">
											<input type="text" class="form-control flat small-font pad-5" id="datepicker1" name="pick-up-date" placeholder="Pick-up date" value="{{ Input::old('pick-up-date') }}">
											<i class="glyphicon glyphicon-calendar input-icon"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5">
											<select class="form-control flat small-font pad-5" name="pick-up-time">
												<option value="">Time</option>
												<option value="00:00" {{ Input::old('pick-up-time') == '00:00' ? 'selected' : '' }}>00:00</option>
												<option value="00:30" {{ Input::old('pick-up-time') == '00:30' ? 'selected' : '' }}>00:30</option>
												<option value="01:00" {{ Input::old('pick-up-time') == '01:00' ? 'selected' : '' }}>01:00</option>
												<option value="01:30" {{ Input::old('pick-up-time') == '01:30' ? 'selected' : '' }}>01:30</option>
												<option value="02:00" {{ Input::old('pick-up-time') == '02:00' ? 'selected' : '' }}>02:00</option>
												<option value="02:30" {{ Input::old('pick-up-time') == '02:30' ? 'selected' : '' }}>02:30</option>
												<option value="03:00" {{ Input::old('pick-up-time') == '03:00' ? 'selected' : '' }}>03:00</option>
												<option value="03:30" {{ Input::old('pick-up-time') == '03:30' ? 'selected' : '' }}>03:30</option>
												<option value="04:00" {{ Input::old('pick-up-time') == '04:00' ? 'selected' : '' }}>04:00</option>
												<option value="04:30" {{ Input::old('pick-up-time') == '04:30' ? 'selected' : '' }}>04:30</option>
												<option value="05:00" {{ Input::old('pick-up-time') == '05:00' ? 'selected' : '' }}>05:00</option>
												<option value="05:30" {{ Input::old('pick-up-time') == '05:30' ? 'selected' : '' }}>05:30</option>
												<option value="06:00" {{ Input::old('pick-up-time') == '06:00' ? 'selected' : '' }}>06:00</option>
												<option value="06:30" {{ Input::old('pick-up-time') == '06:30' ? 'selected' : '' }}>06:30</option>
												<option value="07:00" {{ Input::old('pick-up-time') == '07:00' ? 'selected' : '' }}>07:00</option>
												<option value="07:30" {{ Input::old('pick-up-time') == '07:30' ? 'selected' : '' }}>07:30</option>
												<option value="08:00" {{ Input::old('pick-up-time') == '08:00' ? 'selected' : '' }}>08:00</option>
												<option value="08:30" {{ Input::old('pick-up-time') == '08:30' ? 'selected' : '' }}>08:30</option>
												<option value="09:00" {{ Input::old('pick-up-time') == '09:00' ? 'selected' : '' }}>09:00</option>
												<option value="09:30" {{ Input::old('pick-up-time') == '09:30' ? 'selected' : '' }}>09:30</option>
												<option value="10:00" {{ Input::old('pick-up-time') == '10:00' ? 'selected' : '' }}>10:00</option>
												<option value="10:30" {{ Input::old('pick-up-time') == '10:30' ? 'selected' : '' }}>10:30</option>
												<option value="11:00" {{ Input::old('pick-up-time') == '11:00' ? 'selected' : '' }}>11:00</option>
												<option value="11:30" {{ Input::old('pick-up-time') == '11:30' ? 'selected' : '' }}>11:30</option>
												<option value="12:00" {{ Input::old('pick-up-time') == '12:00' ? 'selected' : '' }}>12:00</option>
												<option value="12:30" {{ Input::old('pick-up-time') == '12:30' ? 'selected' : '' }}>12:30</option>
												<option value="13:00" {{ Input::old('pick-up-time') == '13:00' ? 'selected' : '' }}>13:00</option>
												<option value="13:30" {{ Input::old('pick-up-time') == '13:30' ? 'selected' : '' }}>13:30</option>
												<option value="14:00" {{ Input::old('pick-up-time') == '14:00' ? 'selected' : '' }}>14:00</option>
												<option value="14:30" {{ Input::old('pick-up-time') == '14:30' ? 'selected' : '' }}>14:30</option>
												<option value="15:00" {{ Input::old('pick-up-time') == '15:00' ? 'selected' : '' }}>15:00</option>
												<option value="15:30" {{ Input::old('pick-up-time') == '15:30' ? 'selected' : '' }}>15:30</option>
												<option value="16:00" {{ Input::old('pick-up-time') == '16:00' ? 'selected' : '' }}>16:00</option>
												<option value="16:30" {{ Input::old('pick-up-time') == '16:30' ? 'selected' : '' }}>16:30</option>
												<option value="17:00" {{ Input::old('pick-up-time') == '17:00' ? 'selected' : '' }}>17:00</option>
												<option value="17:30" {{ Input::old('pick-up-time') == '17:30' ? 'selected' : '' }}>17:30</option>
												<option value="18:00" {{ Input::old('pick-up-time') == '18:00' ? 'selected' : '' }}>18:00</option>
												<option value="18:30" {{ Input::old('pick-up-time') == '18:30' ? 'selected' : '' }}>18:30</option>
												<option value="19:00" {{ Input::old('pick-up-time') == '19:00' ? 'selected' : '' }}>19:00</option>
												<option value="19:30" {{ Input::old('pick-up-time') == '19:30' ? 'selected' : '' }}>19:30</option>
												<option value="20:00" {{ Input::old('pick-up-time') == '20:00' ? 'selected' : '' }}>20:00</option>
												<option value="20:30" {{ Input::old('pick-up-time') == '20:30' ? 'selected' : '' }}>20:30</option>
												<option value="21:00" {{ Input::old('pick-up-time') == '21:00' ? 'selected' : '' }}>21:00</option>
												<option value="21:30" {{ Input::old('pick-up-time') == '21:30' ? 'selected' : '' }}>21:30</option>
												<option value="22:00" {{ Input::old('pick-up-time') == '22:00' ? 'selected' : '' }}>22:00</option>
												<option value="22:30" {{ Input::old('pick-up-time') == '22:30' ? 'selected' : '' }}>22:30</option>
												<option value="23:00" {{ Input::old('pick-up-time') == '23:00' ? 'selected' : '' }}>23:00</option>
												<option value="23:30" {{ Input::old('pick-up-time') == '23:30' ? 'selected' : '' }}>23:30</option>
											</select>
											<i class="glyphicon glyphicon-time input-icon"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5">
											<input type="text" class="form-control flat small-font pad-5" id="datepicker2" name="return-date" placeholder="Return date" value="{{ Input::old('return-date') }}">
											<i class="glyphicon glyphicon-calendar input-icon"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 pad-5" style="padding-right: 0;">
											<select class="form-control flat small-font pad-5" name="return-time">
												<option value="">Time</option>
												<option value="00:00" {{ Input::old('return-time') == '00:00' ? 'selected' : '' }}>00:00</option>
												<option value="00:30" {{ Input::old('return-time') == '00:30' ? 'selected' : '' }}>00:30</option>
												<option value="01:00" {{ Input::old('return-time') == '01:00' ? 'selected' : '' }}>01:00</option>
												<option value="01:30" {{ Input::old('return-time') == '01:30' ? 'selected' : '' }}>01:30</option>
												<option value="02:00" {{ Input::old('return-time') == '02:00' ? 'selected' : '' }}>02:00</option>
												<option value="02:30" {{ Input::old('return-time') == '02:30' ? 'selected' : '' }}>02:30</option>
												<option value="03:00" {{ Input::old('return-time') == '03:00' ? 'selected' : '' }}>03:00</option>
												<option value="03:30" {{ Input::old('return-time') == '03:30' ? 'selected' : '' }}>03:30</option>
												<option value="04:00" {{ Input::old('return-time') == '04:00' ? 'selected' : '' }}>04:00</option>
												<option value="04:30" {{ Input::old('return-time') == '04:30' ? 'selected' : '' }}>04:30</option>
												<option value="05:00" {{ Input::old('return-time') == '05:00' ? 'selected' : '' }}>05:00</option>
												<option value="05:30" {{ Input::old('return-time') == '05:30' ? 'selected' : '' }}>05:30</option>
												<option value="06:00" {{ Input::old('return-time') == '06:00' ? 'selected' : '' }}>06:00</option>
												<option value="06:30" {{ Input::old('return-time') == '06:30' ? 'selected' : '' }}>06:30</option>
												<option value="07:00" {{ Input::old('return-time') == '07:00' ? 'selected' : '' }}>07:00</option>
												<option value="07:30" {{ Input::old('return-time') == '07:30' ? 'selected' : '' }}>07:30</option>
												<option value="08:00" {{ Input::old('return-time') == '08:00' ? 'selected' : '' }}>08:00</option>
												<option value="08:30" {{ Input::old('return-time') == '08:30' ? 'selected' : '' }}>08:30</option>
												<option value="09:00" {{ Input::old('return-time') == '09:00' ? 'selected' : '' }}>09:00</option>
												<option value="09:30" {{ Input::old('return-time') == '09:30' ? 'selected' : '' }}>09:30</option>
												<option value="10:00" {{ Input::old('return-time') == '10:00' ? 'selected' : '' }}>10:00</option>
												<option value="10:30" {{ Input::old('return-time') == '10:30' ? 'selected' : '' }}>10:30</option>
												<option value="11:00" {{ Input::old('return-time') == '11:00' ? 'selected' : '' }}>11:00</option>
												<option value="11:30" {{ Input::old('return-time') == '11:30' ? 'selected' : '' }}>11:30</option>
												<option value="12:00" {{ Input::old('return-time') == '12:00' ? 'selected' : '' }}>12:00</option>
												<option value="12:30" {{ Input::old('return-time') == '12:30' ? 'selected' : '' }}>12:30</option>
												<option value="13:00" {{ Input::old('return-time') == '13:00' ? 'selected' : '' }}>13:00</option>
												<option value="13:30" {{ Input::old('return-time') == '13:30' ? 'selected' : '' }}>13:30</option>
												<option value="14:00" {{ Input::old('return-time') == '14:00' ? 'selected' : '' }}>14:00</option>
												<option value="14:30" {{ Input::old('return-time') == '14:30' ? 'selected' : '' }}>14:30</option>
												<option value="15:00" {{ Input::old('return-time') == '15:00' ? 'selected' : '' }}>15:00</option>
												<option value="15:30" {{ Input::old('return-time') == '15:30' ? 'selected' : '' }}>15:30</option>
												<option value="16:00" {{ Input::old('return-time') == '16:00' ? 'selected' : '' }}>16:00</option>
												<option value="16:30" {{ Input::old('return-time') == '16:30' ? 'selected' : '' }}>16:30</option>
												<option value="17:00" {{ Input::old('return-time') == '17:00' ? 'selected' : '' }}>17:00</option>
												<option value="17:30" {{ Input::old('return-time') == '17:30' ? 'selected' : '' }}>17:30</option>
												<option value="18:00" {{ Input::old('return-time') == '18:00' ? 'selected' : '' }}>18:00</option>
												<option value="18:30" {{ Input::old('return-time') == '18:30' ? 'selected' : '' }}>18:30</option>
												<option value="19:00" {{ Input::old('return-time') == '19:00' ? 'selected' : '' }}>19:00</option>
												<option value="19:30" {{ Input::old('return-time') == '19:30' ? 'selected' : '' }}>19:30</option>
												<option value="20:00" {{ Input::old('return-time') == '20:00' ? 'selected' : '' }}>20:00</option>
												<option value="20:30" {{ Input::old('return-time') == '20:30' ? 'selected' : '' }}>20:30</option>
												<option value="21:00" {{ Input::old('return-time') == '21:00' ? 'selected' : '' }}>21:00</option>
												<option value="21:30" {{ Input::old('return-time') == '21:30' ? 'selected' : '' }}>21:30</option>
												<option value="22:00" {{ Input::old('return-time') == '22:00' ? 'selected' : '' }}>22:00</option>
												<option value="22:30" {{ Input::old('return-time') == '22:30' ? 'selected' : '' }}>22:30</option>
												<option value="23:00" {{ Input::old('return-time') == '23:00' ? 'selected' : '' }}>23:00</option>
												<option value="23:30" {{ Input::old('return-time') == '23:30' ? 'selected' : '' }}>23:30</option>
											</select>
											<i class="glyphicon glyphicon-time input-icon"></i>
										</div>
									</div>
								
									<button type="submit" class="btn btn-small flat pull-right" style="margin-top: 10px; background-color: #ed9419; color: white">Book Now</button>
								{{ Form::close() }}
							</div>
							<div class="manage"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
	</header>

	<div id="available-cars">
		<div class="container">
			<div>
				<h3>Available Cars</h3>
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
	</div>

	<div class="about clearfix" id="about">
		<div class="col-sm-6 col-sm-offset-3 about">
			<h2 class="text-center">About Us</h2>
			<p class="text-justify">U-DriveBohol is your friendly travel partner to Bohol. We offer safe and comfortable tour and travel services to Bohol's top tourist destinations such as the Chocolate Hills. We  also provide car rental services for those looking to rent a car, van, or motorcycle anywhere in the province. Contact us now for your bookings and inquiries!</p>
		</div>
	</div>

	<div class="contact clearfix" id="contact">
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

					<button type="submit" class="btn btn-primary btnsub">Submit</button>
				</form>
			</div>
		</div>
	</div>

@stop
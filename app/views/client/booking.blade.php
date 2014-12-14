@extends('client.layout')

@section('content')
	<div class="container" id="home">
		<div class="header-menu" style="display: block">
			<div class="row">
				<div class="col-sm-6 logo">
					<img src="/assets/img/logo.png">
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
	
	<div class="container">

		<div class="row smpl-step" style="border-bottom: 0; min-width: 500px;">
			<div class="col-xs-3 smpl-step-step complete">
				<div class="text-center smpl-step-num">Step 1</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a href="/" class="smpl-step-icon"><i class="fa fa-edit" style="font-size: 58px; padding-left: 8px; padding-top: 9px; color: black;"></i></a>
				<div class="smpl-step-info text-center">CREATE REQUEST</div>
			</div>

			<div class="col-xs-3 smpl-step-step complete">           
				<div class="text-center smpl-step-num">Step 2</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a href="/cars" class="smpl-step-icon"><i class="fa fa-car" style="font-size: 55px; padding-left: 4px; padding-top: 5px; color: black;"></i></a>
				<div class="smpl-step-info text-center">CHOOSE CAR</div>
			</div>
			<div class="col-xs-3 smpl-step-step active">          
				<div class="text-center smpl-step-num">Step 3</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a class="smpl-step-icon"><i class="fa fa-cogs" style="font-size: 53px; padding-left: 3px; padding-top: 9px; color: black;"></i></a>
				<div class="smpl-step-info text-center">SERVICES & BOOK</div>
			</div>
			<div class="col-xs-3 smpl-step-step disabled">           
				<div class="text-center smpl-step-num">Step 4</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a class="smpl-step-icon"><i class="fa fa-file" style="font-size: 50px; padding-left: 13px; padding-top: 12px; color: black; opacity: 0.3;"></i></a>
				<div class="smpl-step-info text-center">SUMMARY</div>
			</div>
		</div>
		
		<div class="row">
			<div class="well col-sm-3">
				<h3>Modify Search</h3>
				<hr>

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="quick">
							{{ Form::open(array('url' => '/cars')) }}

								<div class="form-group">
									<select class="form-control flat text-capitalize" name="location" placeholder="Enter Location">
										<option style="display: none; color: #777;" value="">Enter Location</option>
										@foreach($locations as $location)
											<option class="text-capitalize" value="{{ $location->id }}" {{ Session::get('location') == $location->id ? 'selected' : '' }}>{{ $location->address }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="diff-location" {{ Session::has('diff-location') ? 'checked' : '' }}> <span class="text-muted">Returning to Different location</span>
									</label>
									<select class="form-control flat text-capitalize" name="return-loc" placeholder="Return Location" style="display: {{ Session::has('diff-location') ? 'block;' : 'none;' }}">
										<option style="display: none; color: #777;" value="">Return Location</option>
										@foreach($locations as $location)
											<option class="text-capitalize" value="{{ $location->id }}" {{ Session::get('return-loc') == $location->id ? 'selected' : '' }}>{{ $location->address }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<div class="col-sm-7 pad-5" style="padding-left: 0">
										<input type="text" class="form-control flat small-font pad-5" id="datepicker1" name="pick-up-date" placeholder="Pick-up date" value="{{ Session::get('pick-up-date') }}">
										<i class="glyphicon glyphicon-calendar input-icon"></i>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-5 pad-5">
										<select class="form-control flat small-font pad-5" name="pick-up-time">
											<option value="">Time</option>
											<option value="00:00" {{ Session::get('pick-up-time') == '00:00' ? 'selected' : '' }}>00:00</option>
											<option value="00:30" {{ Session::get('pick-up-time') == '00:30' ? 'selected' : '' }}>00:30</option>
											<option value="01:00" {{ Session::get('pick-up-time') == '01:00' ? 'selected' : '' }}>01:00</option>
											<option value="01:30" {{ Session::get('pick-up-time') == '01:30' ? 'selected' : '' }}>01:30</option>
											<option value="02:00" {{ Session::get('pick-up-time') == '02:00' ? 'selected' : '' }}>02:00</option>
											<option value="02:30" {{ Session::get('pick-up-time') == '02:30' ? 'selected' : '' }}>02:30</option>
											<option value="03:00" {{ Session::get('pick-up-time') == '03:00' ? 'selected' : '' }}>03:00</option>
											<option value="03:30" {{ Session::get('pick-up-time') == '03:30' ? 'selected' : '' }}>03:30</option>
											<option value="04:00" {{ Session::get('pick-up-time') == '04:00' ? 'selected' : '' }}>04:00</option>
											<option value="04:30" {{ Session::get('pick-up-time') == '04:30' ? 'selected' : '' }}>04:30</option>
											<option value="05:00" {{ Session::get('pick-up-time') == '05:00' ? 'selected' : '' }}>05:00</option>
											<option value="05:30" {{ Session::get('pick-up-time') == '05:30' ? 'selected' : '' }}>05:30</option>
											<option value="06:00" {{ Session::get('pick-up-time') == '06:00' ? 'selected' : '' }}>06:00</option>
											<option value="06:30" {{ Session::get('pick-up-time') == '06:30' ? 'selected' : '' }}>06:30</option>
											<option value="07:00" {{ Session::get('pick-up-time') == '07:00' ? 'selected' : '' }}>07:00</option>
											<option value="07:30" {{ Session::get('pick-up-time') == '08:00' ? 'selected' : '' }}>08:00</option>
											<option value="08:30" {{ Session::get('pick-up-time') == '08:30' ? 'selected' : '' }}>08:30</option>
											<option value="09:00" {{ Session::get('pick-up-time') == '09:00' ? 'selected' : '' }}>09:00</option>
											<option value="09:30" {{ Session::get('pick-up-time') == '09:30' ? 'selected' : '' }}>09:30</option>
											<option value="10:00" {{ Session::get('pick-up-time') == '10:00' ? 'selected' : '' }}>10:00</option>
											<option value="10:30" {{ Session::get('pick-up-time') == '10:30' ? 'selected' : '' }}>10:30</option>
											<option value="11:00" {{ Session::get('pick-up-time') == '11:00' ? 'selected' : '' }}>11:00</option>
											<option value="11:30" {{ Session::get('pick-up-time') == '11:30' ? 'selected' : '' }}>11:30</option>
											<option value="12:00" {{ Session::get('pick-up-time') == '12:00' ? 'selected' : '' }}>12:00</option>
											<option value="12:30" {{ Session::get('pick-up-time') == '12:30' ? 'selected' : '' }}>12:30</option>
											<option value="13:00" {{ Session::get('pick-up-time') == '13:00' ? 'selected' : '' }}>13:00</option>
											<option value="13:30" {{ Session::get('pick-up-time') == '13:30' ? 'selected' : '' }}>13:30</option>
											<option value="14:00" {{ Session::get('pick-up-time') == '14:00' ? 'selected' : '' }}>14:00</option>
											<option value="14:30" {{ Session::get('pick-up-time') == '14:30' ? 'selected' : '' }}>14:30</option>
											<option value="15:00" {{ Session::get('pick-up-time') == '15:00' ? 'selected' : '' }}>15:00</option>
											<option value="15:30" {{ Session::get('pick-up-time') == '15:30' ? 'selected' : '' }}>15:30</option>
											<option value="16:00" {{ Session::get('pick-up-time') == '16:00' ? 'selected' : '' }}>16:00</option>
											<option value="16:30" {{ Session::get('pick-up-time') == '16:30' ? 'selected' : '' }}>16:30</option>
											<option value="17:00" {{ Session::get('pick-up-time') == '17:00' ? 'selected' : '' }}>17:00</option>
											<option value="17:30" {{ Session::get('pick-up-time') == '17:30' ? 'selected' : '' }}>17:30</option>
											<option value="18:00" {{ Session::get('pick-up-time') == '18:00' ? 'selected' : '' }}>18:00</option>
											<option value="18:30" {{ Session::get('pick-up-time') == '18:30' ? 'selected' : '' }}>18:30</option>
											<option value="19:00" {{ Session::get('pick-up-time') == '19:00' ? 'selected' : '' }}>19:00</option>
											<option value="19:30" {{ Session::get('pick-up-time') == '19:30' ? 'selected' : '' }}>19:30</option>
											<option value="20:00" {{ Session::get('pick-up-time') == '20:00' ? 'selected' : '' }}>20:00</option>
											<option value="20:30" {{ Session::get('pick-up-time') == '20:30' ? 'selected' : '' }}>20:30</option>
											<option value="21:00" {{ Session::get('pick-up-time') == '21:00' ? 'selected' : '' }}>21:00</option>
											<option value="21:30" {{ Session::get('pick-up-time') == '21:30' ? 'selected' : '' }}>21:30</option>
											<option value="22:00" {{ Session::get('pick-up-time') == '22:00' ? 'selected' : '' }}>22:00</option>
											<option value="22:30" {{ Session::get('pick-up-time') == '22:30' ? 'selected' : '' }}>22:30</option>
											<option value="23:00" {{ Session::get('pick-up-time') == '23:00' ? 'selected' : '' }}>23:00</option>
											<option value="23:30" {{ Session::get('pick-up-time') == '23:30' ? 'selected' : '' }}>23:30</option>
										</select>
										<i class="glyphicon glyphicon-time input-icon"></i>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-7 pad-5" style="padding-left: 0;">
										<input type="text" class="form-control flat small-font pad-5" id="datepicker2" name="return-date" placeholder="Return date" value="{{ Session::get('return-date') }}">
										<i class="glyphicon glyphicon-calendar input-icon"></i>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-5 pad-5">
										<select class="form-control flat small-font pad-5" name="return-time">
											<option value="">Time</option>
											<option value="00:00" {{ Session::get('return-time') == '00:00' ? 'selected' : '' }}>00:00</option>
											<option value="00:30" {{ Session::get('return-time') == '00:30' ? 'selected' : '' }}>00:30</option>
											<option value="01:00" {{ Session::get('return-time') == '01:00' ? 'selected' : '' }}>01:00</option>
											<option value="01:30" {{ Session::get('return-time') == '01:30' ? 'selected' : '' }}>01:30</option>
											<option value="02:00" {{ Session::get('return-time') == '02:00' ? 'selected' : '' }}>02:00</option>
											<option value="02:30" {{ Session::get('return-time') == '02:30' ? 'selected' : '' }}>02:30</option>
											<option value="03:00" {{ Session::get('return-time') == '03:00' ? 'selected' : '' }}>03:00</option>
											<option value="03:30" {{ Session::get('return-time') == '03:30' ? 'selected' : '' }}>03:30</option>
											<option value="04:00" {{ Session::get('return-time') == '04:00' ? 'selected' : '' }}>04:00</option>
											<option value="04:30" {{ Session::get('return-time') == '04:30' ? 'selected' : '' }}>04:30</option>
											<option value="05:00" {{ Session::get('return-time') == '05:00' ? 'selected' : '' }}>05:00</option>
											<option value="05:30" {{ Session::get('return-time') == '05:30' ? 'selected' : '' }}>05:30</option>
											<option value="06:00" {{ Session::get('return-time') == '06:00' ? 'selected' : '' }}>06:00</option>
											<option value="06:30" {{ Session::get('return-time') == '06:30' ? 'selected' : '' }}>06:30</option>
											<option value="07:00" {{ Session::get('return-time') == '07:00' ? 'selected' : '' }}>07:00</option>
											<option value="07:30" {{ Session::get('return-time') == '07:30' ? 'selected' : '' }}>07:30</option>
											<option value="08:00" {{ Session::get('return-time') == '08:00' ? 'selected' : '' }}>08:00</option>
											<option value="08:30" {{ Session::get('return-time') == '08:30' ? 'selected' : '' }}>08:30</option>
											<option value="09:00" {{ Session::get('return-time') == '09:00' ? 'selected' : '' }}>09:00</option>
											<option value="09:30" {{ Session::get('return-time') == '09:30' ? 'selected' : '' }}>09:30</option>
											<option value="10:00" {{ Session::get('return-time') == '10:00' ? 'selected' : '' }}>10:00</option>
											<option value="10:30" {{ Session::get('return-time') == '10:30' ? 'selected' : '' }}>10:30</option>
											<option value="11:00" {{ Session::get('return-time') == '11:00' ? 'selected' : '' }}>11:00</option>
											<option value="11:30" {{ Session::get('return-time') == '11:30' ? 'selected' : '' }}>11:30</option>
											<option value="12:00" {{ Session::get('return-time') == '12:00' ? 'selected' : '' }}>12:00</option>
											<option value="12:30" {{ Session::get('return-time') == '12:30' ? 'selected' : '' }}>12:30</option>
											<option value="13:00" {{ Session::get('return-time') == '13:00' ? 'selected' : '' }}>13:00</option>
											<option value="13:30" {{ Session::get('return-time') == '13:30' ? 'selected' : '' }}>13:30</option>
											<option value="14:00" {{ Session::get('return-time') == '14:00' ? 'selected' : '' }}>14:00</option>
											<option value="14:30" {{ Session::get('return-time') == '14:30' ? 'selected' : '' }}>14:30</option>
											<option value="15:00" {{ Session::get('return-time') == '15:00' ? 'selected' : '' }}>15:00</option>
											<option value="15:30" {{ Session::get('return-time') == '15:30' ? 'selected' : '' }}>15:30</option>
											<option value="16:00" {{ Session::get('return-time') == '16:00' ? 'selected' : '' }}>16:00</option>
											<option value="16:30" {{ Session::get('return-time') == '16:30' ? 'selected' : '' }}>16:30</option>
											<option value="17:00" {{ Session::get('return-time') == '17:00' ? 'selected' : '' }}>17:00</option>
											<option value="17:30" {{ Session::get('return-time') == '17:30' ? 'selected' : '' }}>17:30</option>
											<option value="18:00" {{ Session::get('return-time') == '18:00' ? 'selected' : '' }}>18:00</option>
											<option value="18:30" {{ Session::get('return-time') == '18:30' ? 'selected' : '' }}>18:30</option>
											<option value="19:00" {{ Session::get('return-time') == '19:00' ? 'selected' : '' }}>19:00</option>
											<option value="19:30" {{ Session::get('return-time') == '19:30' ? 'selected' : '' }}>19:30</option>
											<option value="20:00" {{ Session::get('return-time') == '20:00' ? 'selected' : '' }}>20:00</option>
											<option value="20:30" {{ Session::get('return-time') == '20:30' ? 'selected' : '' }}>20:30</option>
											<option value="21:00" {{ Session::get('return-time') == '21:00' ? 'selected' : '' }}>21:00</option>
											<option value="21:30" {{ Session::get('return-time') == '21:30' ? 'selected' : '' }}>21:30</option>
											<option value="22:00" {{ Session::get('return-time') == '22:00' ? 'selected' : '' }}>22:00</option>
											<option value="22:30" {{ Session::get('return-time') == '22:30' ? 'selected' : '' }}>22:30</option>
											<option value="23:00" {{ Session::get('return-time') == '23:00' ? 'selected' : '' }}>23:00</option>
											<option value="23:30" {{ Session::get('return-time') == '23:30' ? 'selected' : '' }}>23:30</option>
										</select>
										<i class="glyphicon glyphicon-time input-icon"></i>
									</div>
								</div>
							
								<button type="submit" class="btn btn-small flat pull-right" style="margin-top: 10px; background-color: #ed9419; color: white">Search</button>
							{{ Form::close() }}
						</div>
					</div>
				</div>

			</div>
			<div class="well col-sm-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4">
								<img class="img-responsive" src="/assets/uploads/{{ $car->image }}">
								<h5 class="text-center text-capitalize">{{ $car->name }}</h5>
							</div>
							<div class="col-sm-4">
								<h4>Pick Up</h4>
								<p class="text-capitalize">{{ $pickUpLoc->address }}</p>
								<p>{{ Session::get('pick-up-date') }}</p>
								<p>{{ Session::get('pick-up-time') }}</p>
							</div>
							<div class="col-sm-4">
								<h4>Drop Off</h4>
								@if(Session::has('diff-location'))
									<p class="text-capitalize">{{ $returnLoc->address }}</p>
									<p>{{ Session::get('return-date') }}</p>
									<p>{{ Session::get('return-time') }}</p>
								@else
									<p class="text-capitalize">{{ $pickUpLoc->address }}</p>
									<p>{{ Session::get('return-date') }}</p>
									<p>{{ Session::get('return-time') }}</p>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="well col-sm-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<h3 style = "margin-left: 13px;">Details</h3>
							
							@if($errors->count() > 0)
								<div class="alert alert-danger">
									@foreach($errors->all() as $error)
										<p>{{ $error }}</p>
									@endforeach
								</div>
							@endif

							@if(Session::has('error'))
								<div class="alert alert-danger">{{ Session::get('error') }}</div>
							@endif

							{{ Form::open(array('url' => 'reserve/' . $car->id . '/' . $car->slug)) }}
								
								<div class="form-group col-sm-4">
									<label for="fname">First Name</label>
									<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
								</div>
								<div class="form-group col-sm-4">
									<label for="lname">Last Name</label>
									<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
								</div>
								<div class="form-group col-sm-4">
									<label for="email">Email Address</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
								</div>

								<div class="form-group col-sm-6">
									<label for="credit-card">Credit Card Number</label>
									<input type="text" class="form-control" id="credit-card" name="credit-card" placeholder="Credit Card Number">
								</div>
								<div class="form-group col-sm-3">
									<label for="exp-date">Expiration Date</label>
									<input type="text" class="form-control" id="exp-date" name="exp-date" placeholder="Expiration Date">
								</div>
								<div class="form-group col-sm-3">
									<label for="code">Code</label>
									<input type="text" class="form-control" id="code" name="code" placeholder="Code">
								</div>
							
								<button type="submit" class="btn btn-primary pull-right" style = "margin-right: 14px;">Confirm Reservation</button>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
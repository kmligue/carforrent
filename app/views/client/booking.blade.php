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
	
	<div class="container">

		<div class="row smpl-step" style="border-bottom: 0; min-width: 500px;">
			<div class="col-xs-3 smpl-step-step complete">
				<div class="text-center smpl-step-num">Step 1</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a class="smpl-step-icon"><i class="fa fa-edit" style="font-size: 58px; padding-left: 8px; padding-top: 9px; color: black;"></i></a>
				<div class="smpl-step-info text-center">CREATE REQUEST</div>
			</div>

			<div class="col-xs-3 smpl-step-step active">           
				<div class="text-center smpl-step-num">Step 2</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a class="smpl-step-icon"><i class="fa fa-car" style="font-size: 55px; padding-left: 4px; padding-top: 5px; color: black;"></i></a>
				<div class="smpl-step-info text-center">CHOOSE CAR</div>
			</div>
			<div class="col-xs-3 smpl-step-step disabled">          
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
							<form action="" method="POST" role="form">
								<div class="form-group">
									<select class="form-control flat text-capitalize" placeholder="Enter Location">
										<option style="display: none; color: #777;">Enter Location</option>
										
									</select>
								</div>

								<div class="form-group">
									<div class="col-sm-7" style="padding-left: 0">
										<input type="text" class="form-control flat small-font pad-5" id="datepicker1" placeholder="Pick-up date">
										<i class="glyphicon glyphicon-calendar input-icon" style="right: 23px; top: 10px;"></i>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-5" style="padding-right: 0;">
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
										<i class="glyphicon glyphicon-time input-icon" style="top: 10px;"></i>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-7" style="padding-left: 0;">
										<input type="text" class="form-control flat small-font pad-5" id="datepicker2" placeholder="Return date">
										<i class="glyphicon glyphicon-calendar input-icon" style="right: 23px; top: 10px;"></i>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-5" style="padding-right: 0;">
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
										<i class="glyphicon glyphicon-time input-icon" style="top: 10px;"></i>
									</div>
								</div>
							
								<button type="submit" class="btn btn-small flat pull-right" style="margin-top: 10px; background-color: #ed9419; color: white">Search</button>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="well col-sm-9">
				<div class="panel panel-default">
					<div class="panel-body">
					   3 results
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4">
					    		<img class="img-responsive" src="/assets/uploads/07-08_honda_element_sc-5482bb67ea931.jpg">
								<h6 class="text-center">Hyundai i20 or similar</h6>
							</div>
							<div class="col-sm-4">
								<h6>Transmission: Automatic</h6>
								<h6>Style: Sedan</h6>
								<h6>Seating: 5</h6>
							</div>
							<div class="col-sm-4 text-right">
								<h3 style="margin-top: 0;"><span class="label label-default">Php 5000 per day</span></h3>
								<button type="submit" class="btn btn-sm flat pull-right" style="margin-top: 10px; background-color: #ed9419; color: white">Book This Car</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

@stop
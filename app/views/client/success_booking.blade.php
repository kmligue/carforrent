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
			<div class="col-xs-3 smpl-step-step complete">          
				<div class="text-center smpl-step-num">Step 3</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a href="/booking/{{ $carId }}/{{ $slug }}" class="smpl-step-icon"><i class="fa fa-cogs" style="font-size: 53px; padding-left: 3px; padding-top: 9px; color: black;"></i></a>
				<div class="smpl-step-info text-center">SERVICES & BOOK</div>
			</div>
			<div class="col-xs-3 smpl-step-step active">           
				<div class="text-center smpl-step-num">Step 4</div>
				<div class="progress">
					<div class="progress-bar"></div>
				</div>
				<a class="smpl-step-icon"><i class="fa fa-file" style="font-size: 50px; padding-left: 13px; padding-top: 12px; color: black; opacity: 0.3;"></i></a>
				<div class="smpl-step-info text-center">SUMMARY</div>
			</div>
		</div>
		
		<div class="row">
			<div class="well col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
					   Summary
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-sm-5">
									<h4>Details</h4>
									<div class="details">
										<p><span>Name: </span>Kem kem</p>
										<p><span>Email: </span>email@gmail.com</p>
										<p><span>Credit Card No: </span>123123</p>
										<p><span>Expiration Date: </span>2014/12/12</p>
										<p><span>Code: </span>231</p>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<h4>Pick Up</h4>
											<p>Ubujan District Tagbilaran City</p>
											<p>2014/12/12</p>
											<p>12:00:00</p>
										</div>
										<div class="col-sm-6">
											<h4>Drop Off</h4>
											<p>Ubujan District Tagbilaran City</p>
											<p>2014/12/12</p>
											<p>12:00:00</p>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<h4>Car</h4>
											<img class="img-responsive" src="/assets/uploads/07-08_honda_element_sc-5482bb67ea931.jpg">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-right">
											<h4>Total Amount</h4>
											<p><h5 style="color: #00f">Php 151.13</h5></p>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-right">
											<a href="#" class="btn btn-sm flat" style="margin-top: 10px; background-color: #ed9419; color: white">Print Order Details</a>
											<a href="#" class="btn btn-sm flat" style="margin-top: 10px; background-color: #ed9419; color: white">Show Terms and Conditions</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

@stop
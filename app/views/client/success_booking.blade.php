@extends('client.layout')

@section('content')

	<div class="container" id="home">
		<div class="header-menu" style="display: block">
			<div class="row">
				<div class="col-sm-6 logo">
					<img src="/assets/img/logo.png">
				</div>
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
										<p><span>Name: </span>{{ $booking->fname }} {{ $booking->lname }}</p>
										<p><span>Email: </span>{{ $booking->email }}</p>
										<p><span>Credit Card No: </span>{{ $booking->credit_card_no }}</p>
										<p><span>Expiration Date: </span>{{ $booking->cc_expire_date }}</p>
										<p><span>Code: </span>{{ $booking->cc_code }}</p>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<h4>Pick Up</h4>
											@foreach($locations as $loc)
												@if($loc->id == $booking->location_id)
													<p class="text-capitalize">{{ $loc->address }}</p>
												@endif
											@endforeach
											<p>{{ explode(' ', $booking->pick_up_date)[0] }}</p>
											<p>{{ $booking->pick_up_time }}</p>
										</div>
										<div class="col-sm-6">
											<h4>Drop Off</h4>
											@foreach($locations as $loc)
												@if($loc->id == $booking->return_location)
													<p class="text-capitalize">{{ $loc->address }}</p>
												@endif
											@endforeach
											<p>{{ explode(' ', $booking->return_date)[0] }}</p>
											<p>{{ $booking->return_time }}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<h4>Car</h4>
											<h5 class="text-center text-capitalize">{{ $booking->name }}</h5>
											<img class="img-responsive" src="/assets/uploads/{{ $booking->image }}">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-right">
											<h4>Total Amount</h4>
											<p><h5 style="color: #00f">Php {{ number_format($booking->rate, 2) }}</h5></p>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-right">
											<a href="/booking/print/{{ $booking->car_id }}" class="btn btn-sm flat print-details" style="margin-top: 10px; background-color: #ed9419; color: white">Print Order Details</a>
											<a href="#" class="btn btn-sm flat terms-condition" style="margin-top: 10px; background-color: #ed9419; color: white">Show Terms and Conditions</a>
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

@section('script')
	$('.terms-condition').on('click', function(evt) {
		evt.preventDefault();

		var WinPrint = window.open('','','left=150,top=100,width=750,height=400,location=no,menubar=yes,status=no,scrollbars=yes,resizable=yes,toolbar=yes'); 
		WinPrint.document.write('<html>'); 
		WinPrint.document.write('<head>'); 
		WinPrint.document.write('<title>Reservation</title>'); 
		WinPrint.document.write('<body>'); 
		WinPrint.document.write('<div>'); 
		WinPrint.document.write('Terms And Condition'); 
		WinPrint.document.write('</div>'); 
		WinPrint.document.write('</body>'); 
		WinPrint.document.write('</head>'); 
		WinPrint.document.write('</html>'); 
		WinPrint.document.close(); 
		WinPrint.focus(); 
		return false; 
	});
@stop
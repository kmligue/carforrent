<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>U-DriveBohol</title>

	    {{ HTML::style('/assets/css/bootstrap.min.css') }}
	    {{ HTML::style('/assets/css/plugins/metisMenu/metisMenu.min.css') }}
	    {{ HTML::style('/assets/css/sb-admin-2.css') }}
	    {{ HTML::style('/assets/font-awesome-4.1.0/css/font-awesome.min.css') }}
	    {{ HTML::style('/assets/css/style.css') }}

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<img src="/assets/img/logo.png">

		<div>
				<div style="border: 1px solid #000; text-align: center; padding: 8px; margin-bottom: 15px;"><span style="color: rgb(55, 55, 255);">Thank you for booking with us!</span></div>
			@foreach($booking as $item)
				<div style="width: 50%; float: left">
					<h5>Name: <span style="font-size: 12px; text-transform: capitalize; margin-bottom: 15px;">{{ $item->fname }} {{ $item->lname }}</span></h5>
					<h5>Email: <span style="font-size: 12px; margin-bottom: 15px;">{{ $item->email }}</span></h5>
					<h5>Credit Card No.: <span style="font-size: 12px; margin-bottom: 15px;">{{ $item->credit_card_no }}</span></h5>
					<h5>Expiry Date: <span style="font-size: 12px; margin-bottom: 15px;">{{ $item->cc_expire_date }}</span></h5>
				</div>
				<div style="width: 50%; float: right;"> 
					@foreach($locations as $location)
						@if($location->id == $item->location_id)
							<h5>Pick Up Location: <span style="font-size: 12px; text-transform: capitalize; margin-bottom: 15px;">{{ $location->address }}</span></h5>
						@endif
					@endforeach
					<h5>Pick Up Date/Time: <span style="font-size: 12px; margin-bottom: 15px;">{{ $item->pick_up_date }}</span></h5>
					@foreach($locations as $location)
						@if($location->id == $item->return_location)
							<h5>Return Location: <span style="font-size: 12px; text-transform: capitalize; margin-bottom: 15px;">{{ $location->address }}</span></h5>
						@endif
					@endforeach
					<h5>Return Date/Time: <span style="font-size: 12px; margin-bottom: 15px;">{{ $item->return_date }}</span></h5>
				
					<div class="text-capitalize">
						<img src="/assets/uploads/{{ $item->image }}" style="width: 300px; height: 200px;">
						<h4 class="text-center">{{ $item->name }}</h4>
					</div>
				</div>
			@endforeach
		</div>

		{{ HTML::script('/assets/js/jquery.js') }}
		<script type="text/javascript">
			$(function() {
				window.print();
			})
		</script>
	</body>
</html>
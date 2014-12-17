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

		<div style="text-align: center;">
				<h1>Reservation Details</h1>
			@foreach($booking as $item)
				<h4>Name: <span style="font-size: 16px; text-transform: capitalize;">{{ $item->fname }} {{ $item->lname }}</span></h4>
				<h4>Email: <span style="font-size: 16px;">{{ $item->email }}</span></h4>
				<h4>Credit Card No.: <span style="font-size: 16px;">{{ $item->credit_card_no }}</span></h4>
				<h4>Expiry Date: <span style="font-size: 16px;">{{ $item->cc_expire_date }}</span></h4>
				<h4>Credit Card Code: <span style="font-size: 16px;">{{ $item->cc_code }}</span></h4>
				@foreach($locations as $location)
					@if($location->id == $item->location_id)
						<h4>Pick Up Location: <span style="font-size: 16px; text-transform: capitalize;">{{ $location->address }}</span></h4>
					@endif
				@endforeach
				<h4>Pick Up Date/Time: <span style="font-size: 16px;">{{ $item->pick_up_date }}</span></h4>
				@foreach($locations as $location)
					@if($location->id == $item->return_location)
						<h4>Return Location: <span style="font-size: 16px; text-transform: capitalize;">{{ $location->address }}</span></h4>
					@endif
				@endforeach
				<h4>Return Date/Time: <span style="font-size: 16px;">{{ $item->return_date }}</span></h4>
			
				<div>
					<img src="/assets/uploads/{{ $item->image }}" style="width: 300px; height: 200px;">
					<h2>{{ $item->name }}</h2>
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
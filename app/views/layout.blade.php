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

		@if(Auth::check())
		
			<div id="wrapper">
				@include('header')

				<div id="page-wrapper">
					@yield('content')
				</div>
			</div>	

		@else
			
			<div class="container">

				@yield('content')

			</div>

		@endif

	    {{ HTML::script('/assets/js/jquery.js') }}
	    {{ HTML::script('/assets/js/bootstrap.min.js') }}
	    {{ HTML::script('/assets/js/plugins/metisMenu/metisMenu.min.js') }}
	    {{ HTML::script('/assets/js/sb-admin-2.js') }}
	    {{ HTML::script('/assets/js/jquery.autosize.min.js') }}

	    <script type="text/javascript">
	    	$(document).ready(function() {
	    		$('textarea').autosize();

	    		@yield('script')

	    	});
	    </script>
	</body>
</html>
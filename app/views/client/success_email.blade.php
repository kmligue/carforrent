@extends('client.layout')

@section('content')

	<div class="container" id="home">
		<div class="header-menu" style="display: block">
			<div class="row">
				<div class="col-sm-6 logo">
					<img src="http://placehold.it/185x75">
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">

		<div class="alert alert-success text-center"><h3>{{ $message }}</h3></div>

	</div>

@stop
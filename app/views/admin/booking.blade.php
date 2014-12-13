@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Booking
				<span class="controls pull-right">
	            	<a href="{{ URL::to('admin/car/add') }}" class="btn btn-primary">Add</a>
	            </span>
            </h1>
        </div>
    </div>

    <div class="btn-group pull-right filter clearfix" role="group">
    	<a class="btn btn-default @if(Request::path() == 'admin/car') active @endif" href="/admin/car">Available</a>
    	<a class="btn btn-default @if(Request::path() == 'admin/car/archive') active @endif" href="/admin/car/archive">Archive</a>
    </div>

    @if(Session::has('error'))
	    <div class="alert alert-danger col-sm-6">
	        {{ Session::get('error') }}
	    </div>
	@endif

	@if(Session::has('success'))
	    <div class="alert alert-success col-sm-6">
	        {{ Session::get('success') }}
	    </div>
	@endif

    <div class="row">
    	<div class="col-sm-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Car</th>
						<th>Pick Up Location</th>
						<th>Pick Up Date/Time</th>
						<th>Return Location</th>
						<th>Return Date/Time</th>
						<th>Credit Card</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $booking)
						<tr>
							<td class="text-capitalize">{{ $booking->fname . ' ' . $booking->lname }}</td>
							<td class="text-capitalize">{{ $booking->name }}</td>
							<td class="text-capitalize">
								@foreach($locations as $location)
									@if($location->id == $booking->location_id)
										{{ $location->address }}
									@endif
								@endforeach								
							</td>
							<td class="text-capitalize">{{ $booking->pick_up_date }}</td>
							<td class="text-capitalize">
								@foreach($locations as $location)
									@if($location->id == $booking->return_location)
										{{ $location->address }}
									@endif
								@endforeach	
							</td>
							<td class="text-capitalize">{{ $booking->return_date }}</td>
							<td class="text-capitalize">{{ $booking->credit_card_no }} - {{ $booking->cc_expire_date }} - {{ $booking->cc_code }}</td>
							<td class="text-capitalize"></td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{$bookings->links()}}
		</div>
    </div>
@stop
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
    	<a class="btn btn-default @if(Request::path() == 'admin/booking') active @endif" href="/admin/booking">All</a>
    	<a class="btn btn-default @if(Request::path() == 'admin/booking/pending') active @endif" href="/admin/booking/pending">Pending</a>
    	<a class="btn btn-default @if(Request::path() == 'admin/booking/reserved') active @endif" href="/admin/booking/reserved">Reserved</a>
    	<a class="btn btn-default @if(Request::path() == 'admin/booking/archive') active @endif" href="/admin/booking/archive">Archive</a>
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
    	<div class="col-sm-12 table-responsive">
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
							<td class="text-capitalize col-md-2">{{ $booking->fname . ' ' . $booking->lname }}</td>
							<td class="text-capitalize col-md-2">{{ $booking->name }}</td>
							<td class="text-capitalize col-md-2">
								@foreach($locations as $location)
									@if($location->id == $booking->location_id)
										{{ $location->address }}
									@endif
								@endforeach								
							</td>
							<td class="text-capitalize col-md-2">{{ $booking->pick_up_date }}</td>
							<td class="text-capitalize col-md-2">
								@foreach($locations as $location)
									@if($location->id == $booking->return_location)
										{{ $location->address }}
									@endif
								@endforeach	
							</td>
							<td class="text-capitalize col-md-2">{{ $booking->return_date }}</td>
							<td class="text-capitalize col-md-2">{{ $booking->credit_card_no }} - {{ $booking->cc_expire_date }} - {{ $booking->cc_code }}</td>
							<td class="text-capitalize col-md-6">
								<a href="/admin/booking/restore/{{ $booking->id }}" class="btn btn-sm btn-warning" id="{{ $booking->id }}" title="Restore"><i class="glyphicon glyphicon-retweet" id="{{ $booking->id }}" title="Restore"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $bookings->links() }}
		</div>
    </div>
@stop
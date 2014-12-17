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
								@if($booking->status == 'Reserved')
									<a href="#" class="btn btn-sm btn-warning" id="{{ $booking->id }}" title="Done" style="margin-bottom: 5px;" data-toggle="modal" data-target="#done"><i class="fa fa-check" id="{{ $booking->id }}" title="Done"></i></a>
								@else
									<a href="#" class="btn btn-sm btn-info" id="{{ $booking->id }}" title="Reserve" style="margin-bottom: 5px;" data-toggle="modal" data-target="#reserve"><i class="fa fa-lock" id="{{ $booking->id }}" title="Reserve" style="font-size: 17px;"></i></a>
								@endif
								<a href="/admin/booking/print/{{ $booking->id }}" target="_blank" class="btn btn-sm btn-success" id="{{ $booking->id }}" title="Print"><i class="fa fa-print" id="{{ $booking->id }}" title="Print"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $bookings->links() }}
		</div>
    </div>
	
	<!-- reserve modal -->
    <div class="modal fade" id="reserve">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Confirm Reservation</h4>
    			</div>
    			<div class="modal-body reserve-msg">
    				Reserve this booking?
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<a href="#" class="btn btn-primary reserve-link">Reserve</a>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- done modal -->
    <div class="modal fade" id="done">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Reservation</h4>
    			</div>
    			<div class="modal-body">
    				Reservation done.
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    				<a href="#" class="btn btn-primary done-link">Yes</a>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('script')
	
	$(document).ready(function() {
		
		$('[data-target="#reserve"]').on('click', function(evt) {
			evt.preventDefault();

			var id = evt.target.id;
			
			$('.reserve-link').attr('href', '/admin/booking/reserve/' + id);
			$('.reserve-msg').html('<div class="text-center"><i class="fa fa-refresh fa-spin" style="font-size: 16px;"></i></div>');

			$.ajax({
				type: 'get',
				url: '/admin/booking/getReserveDetails/' + id,
				success: function(data) {
					var html = '';

					data.forEach(function(obj) {

						html += '<p class="text-capitalize">Name: <span>'+ obj.fname + ' ' + obj.lname +'</span></p>';
						html += '<p class="text-capitalize">Car: <span>'+ obj.name +'</span></p>';
						html += '<p class="text-capitalize">Pick Up Location: <span>'+ obj.pick_up_loc +'</span></p>';
						html += '<p class="text-capitalize">Pick Up Date/Time: <span>'+ obj.pick_up_date +'</span></p>';
						html += '<p class="text-capitalize">Return Location: <span>'+ obj.return_loc +'</span></p>';
						html += '<p class="text-capitalize">Return Date/Time: <span>'+ obj.return_date +'</span></p>';
						
					});

					$('.reserve-msg').html(html);
				}
			});
		});

		$('[data-target="#done"]').on('click', function(evt) {
			evt.preventDefault();

			var id = evt.target.id;

			$('.done-link').attr('href', '/admin/booking/done/' + id);
		});

	});

@stop
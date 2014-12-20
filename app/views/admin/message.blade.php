@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Messages
            </h1>
        </div>
    </div>

    <div class="btn-group pull-right filter clearfix" role="group">
    	<a class="btn btn-default @if(Request::path() == 'admin/messages') active @endif" href="/admin/messages">All</a>
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
						<th style = "width: 78%;">Email</th>
						<th class = "text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($messages as $msg)
						<tr>
							@if($msg->status == 0)
								<td class="text-capitalize col-md-2" style="color: red;">{{ $msg->name }}</td>
								<td class="col-md-2" style="color: red;">{{ $msg->email }}</td>
							@else
								<td class="text-capitalize col-md-2">{{ $msg->name }}</td>
								<td class="col-md-2">{{ $msg->email }}</td>
							@endif
							<td>
								<a href="#" class="btn btn-info btn-sm" id="{{ $msg->id }}" title="View Message" data-toggle="modal" data-target="#view-message"><i class="fa fa-search" id="{{ $msg->id }}" title="View Message"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $messages->links() }}
		</div>
    </div>

    <!-- view message modal -->
    <div class="modal fade" id="view-message">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Message</h4>
    			</div>
    			{{ Form::open(array('url' => '/admin/message/id')) }}
    			<div class="modal-body view-msg">
    				Message here...
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary reply-link">Reply</button>
    			</div>
    			{{ Form::close() }}
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('script')
	$(document).ready(function() {
		$('[data-target="#view-message"]').on('click', function(evt) {
			evt.preventDefault();
			
			var id = evt.target.id;

			$('.reply-link').attr('href', '/admin/messages/send/' + id);
			$('.view-msg').html('<div class="text-center"><i class="fa fa-refresh fa-spin" style="font-size: 16px;"></i></div>');
			$('#view-message form').attr('action', '/admin/message/' + id);

			$.ajax({
				type: 'get',
				url: '/admin/messages/' + id,
				success: function(data) {
					var html = '';
					html += '<pre>'+ data['message'] +'</pre>';
					html += '<div class="form-group">';
					html += '<label for="reply">Reply Message</label>';
					html += '<textarea class="form-control" rows="5" name="message"></textarea>';
					html += '</div>';

					$('.view-msg').html(html);
				}
			});
		});
	});
@stop
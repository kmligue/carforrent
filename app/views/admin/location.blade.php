@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Location
				<span class="controls pull-right">
	            	<a href="{{ URL::to('admin/location/add') }}" class="btn btn-primary">Add</a>
	            </span>
            </h1>
        </div>
    </div>

    <div class="btn-group pull-right filter clearfix" role="group">
    	<a class="btn btn-default @if(Request::path() == 'admin/location') active @endif" href="/admin/location">Available</a>
    	<a class="btn btn-default @if(Request::path() == 'admin/location/archive') active @endif" href="/admin/location/archive">Archive</a>
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
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($locations as $location)
						<tr>
							<td class="text-capitalize" width="200">{{ $location->address }}</td>
							<td>
								<a class="btn btn-success btn-sm" href="/admin/location/{{ $location->id }}/edit" style="display: inline-block" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
								{{ Form::open(array('role' => 'form', 'files' => true, 'method' => 'delete', 'url' => '/admin/location/'. $location->id .'/archive', 'style' => 'display: inline-block;')) }}
									<button class="btn btn-danger btn-sm" type="submit" title="Archive"><i class="glyphicon glyphicon-trash"></i></button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{$locations->links()}}
		</div>
    </div>
@stop
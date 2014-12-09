@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Car
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
						<th>Image</th>
						<th>Transmission</th>
						<th>Style</th>
						<th>Seating</th>
						<th>Rate</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cars as $car)
						<tr>
							<td class="text-capitalize" width="200">{{ $car->name }}</td>
							<td width="200"><img class="img-rounded img-responsive" src="/assets/uploads/{{ $car->image }}"></td>
							<td class="text-capitalize">{{ $car->transmission }}</td>
							<td class="text-capitalize">{{ $car->style }}</td>
							<td>{{ $car->seating }}</td>
							<td>Php {{ number_format($car->rate, 2) }}</td>
							<td>
								<a class="btn btn-success btn-sm" href="/admin/car/{{ $car->id }}/edit" style="display: inline-block" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
								{{ Form::open(array('role' => 'form', 'files' => true, 'method' => 'delete', 'url' => '/admin/car/'. $car->id .'/archive', 'style' => 'display: inline-block;')) }}
									<button class="btn btn-danger btn-sm" type="submit" title="Archive"><i class="glyphicon glyphicon-trash"></i></button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{$cars->links()}}
		</div>
    </div>
@stop
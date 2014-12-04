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

    <div class="row">
    	<div class="col-sm-10 col-sm-offset-1">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Image</th>
						<th>Transmission</th>
						<th>Description</th>
						<th>Rate</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cars as $car)
						<tr>
							<td class="text-capitalize" width="200">{{ $car->name }}</td>
							<td width="200"><img class="img-rounded img-responsive" src="/assets/uploads/{{ $car->image }}"></td>
							<td class="text-capitalize">{{ $car->transmission }}</td>
							<td>{{ $car->description }}</td>
							<td>{{ number_format($car->rate, 2) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{$cars->links()}}
		</div>
    </div>
@stop
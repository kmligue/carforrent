@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Email
				<span class="controls pull-right">
	            	<a href="{{ URL::to('admin/car/add') }}" class="btn btn-primary">Add</a>
	            </span>
            </h1>
        </div>
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
@stop
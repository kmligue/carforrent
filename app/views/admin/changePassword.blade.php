@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Change Password
            </h1>
        </div>
    </div>

    @if($errors->count() > 0)
    	<div class="alert alert-danger"> 
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
		</div>
    @endif

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
   		<div class="col-md-6 col-md-offset-3">
	   		{{ Form::open(array('url' => '/admin/change/pass')) }}
	   			<div class="form-group">
	   				<label for="password">New Password</label>
	   				<input type="password" class="form-control" id="password" name="password" placeholder="Password" autofocus>
	   			</div>

	   			<button type="submit" class="btn btn-primary pull-right">Submit</button>
	   		{{ Form::close() }}
	   	</div>
   </div>
@stop
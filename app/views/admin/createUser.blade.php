@extends('layout')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	Create New User
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
	   		{{ Form::open(array('url' => '/admin/create/user')) }}
	   		
	   			<div class="form-group">
	   				<label for="fname">First Name</label>
	   				<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" autofocus>
	   			</div>
	   			<div class="form-group">
	   				<label for="fname">Last Name</label>
	   				<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
	   			</div>
	   			<div class="form-group">
	   				<label for="username">Username</label>
	   				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
	   			</div>
	   			<div class="form-group">
	   				<label for="password">Password</label>
	   				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
	   			</div>

	   			<button type="submit" class="btn btn-primary pull-right">Submit</button>
	   		{{ Form::close() }}
	   	</div>
   </div>
@stop
@extends('layout')

@section('content')

	<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>

				@if(Session::has('error'))
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  				<span class="sr-only">Error:</span>
						{{ Session::get('error') }}
					</div>
				@endif

                <div class="panel-body">
                    {{ Form::open(array('url' => 'admin', 'method' => 'post', 'class' => 'form-signin', 'role' => 'form')) }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>	

@stop
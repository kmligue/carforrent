@extends('layout')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ Form::open(array('role' => 'form', 'files' => true)) }}

                                @if($errors->count() > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif

                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ Input::old('address') }}">
                                </div>
                                <button type="submit" class="btn btn-success pull-right">Add</button>
                            {{ Form::close() }}
                        </div>  
                    </div>
                </div>
            </div> 
        </div>
    </div>
@stop
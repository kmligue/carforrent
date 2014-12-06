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
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}">
                                </div>
                                <div class="form-group">
                                    <div class="img-preview">
                                    	<img class="img-rounded img-responsive" src="/assets/uploads/{{ $car->image }}">
                                    </div>
                                    <label for="image">Image</label>
                                    {{ Form::file('image', array('id' => 'image')) }}
                                    <!-- <input type="file" id="image" name="image"> -->
                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <div class="form-group">
                                    <label for="transmission">Transmission</label>
                                    {{ Form::select('transmission', array('automatic' => 'Automatic', 'manual' => 'Manual'), $car->transmission, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label for="style">Style</label>
                                    <input type="text" class="form-control" id="style" name="style" value="{{ $car->style }}">
                                </div>
                                <div class="form-group">
                                    <label for="seating">Seating</label>
                                    <input type="number" class="form-control" id="seating" name="seating" value="{{ $car->seating }}">
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate per day</label>
                                    <input type="text" class="form-control" id="rate" name="rate" value="{{ number_format($car->rate, 2) }}">
                                </div>
                                <button type="submit" class="btn btn-success pull-right">Update</button>
                            {{ Form::close() }}
                        </div>  
                    </div>
                </div>
            </div> 
        </div>
    </div>
@stop

@section('script')
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').html('<img class="img-rounded img-responsive" src="' + e.target.result + '"></img>');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });
@stop
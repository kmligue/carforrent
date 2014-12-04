@extends('layout')

@section('content')
    <div class="row">
    	<div class="col-sm-6 col-sm-offset-3">
            <div class="row">
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
                        <input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}">
                    </div>
                    <div class="form-group">
                        <div class="img-preview"></div>
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image">
                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                    </div>
                    <div class="form-group">
                        <label for="transmission">Transmission</label>
                        <!-- <select class="form-control" name="transmission">
                            <option value="automatic">Automatic</option>
                            <option value="manual">Manual</option>
                        </select> -->
                        {{ Form::select('transmission', array('automatic' => 'Automatic', 'manual' => 'Manual'), Input::get('transmission'), array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="4" class="form-control" id="description" name="description">{{ Input::old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="rate">Rate per day</label>
                        <input type="text" class="form-control" id="rate" name="rate" value="{{ Input::old('rate') }}">
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                {{ Form::close() }}
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
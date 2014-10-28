@extends('layouts.default')

@section('content')
    <div class="jumbotron">
    	<h1>Welcome to larabook!</h1>

    	@if ( ! $currentUser )
    	    <p>Please signup</p>
            <p>
              {{ link_to_route('register_path','Sign up!', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
    	@endif
    </div>
@stop

@extends('layouts.default')

@section('content')
    <div class="jumbotron">
    	<h1>Welcome to larabook!</h1>

    	@if ( ! $currentUser )
    	    <p>Please signup or login from the menu at the top</p>
    	@endif
    </div>
@stop

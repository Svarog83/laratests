@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
    @if ($currentUser)
        <h1>Welcome back, {{$currentUser->username}}!</h1>
    @endif
        @include('layouts.partials.errors')
        @include('statuses.partials.publish-status-form')

    @include('statuses.partials.statuses')

    </div>
</div>
@stop

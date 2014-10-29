@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
    @if ($currentUser)
        <h1>Welcome back, {{$currentUser->username}}!</h1>
    @endif
        <h3>Post a status!</h3>
        @include('layouts.partials.errors')
        {{ Form::open() }}
            <div class="form-group">
            {{ Form::label('body', 'Status:')}}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close() }}

    <h2>Statuses</h2>
    @foreach ($statuses as $status)
        <article>
            {{{$status->body}}}
        </article>
    @endforeach
        
    </div>
</div>
@stop

@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Login form</h1>

        @include('layouts.partials.errors')

        {{Form::open(['route' => 'login_path'])}}

        <div class="form-group">
            {{Form::label('email', 'Email:')}}
            {{Form::email('email', null, ['class'=>'form-control', 'required' => 'required'])}}
        </div>

         <div class="form-group">
            {{Form::label('password', 'Password:')}}<br>
            {{Form::password('password', null, ['class'=>'form-control', 'required' => 'required'])}}
        </div>

        <div class="form-group">
            {{Form::submit('Sign in',['class' => 'btn btn-primary'] )}}
        </div>
        {{Form::close()}}
    </div>
</div>
@stop

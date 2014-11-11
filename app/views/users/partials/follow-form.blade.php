<br />
@if ( $user->isFollowedBy($currentUser))
    <p>You are following {{ $user->username }}</p>
@elseif(! $user->is($currentUser))
{{ Form::open(['route' => 'follows_path']) }}
   {{ Form::hidden('userIdToFollow', $user->id) }}
	<button type="submit" class="btn btn-primary">Follow {{$user->username}}</button>
{{ Form::close() }}
@endif
<br />
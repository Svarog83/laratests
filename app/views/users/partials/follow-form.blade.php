@if ($signedIn)
    <br />
    @if ( $user->isFollowedBy($currentUser))
        {{ Form::open(['route' => ['unfollows_path', $user->id]]) }}
            {{ Form::hidden('userIdToUnfollow', $user->id) }}
            <button type="submit" class="btn btn-danger">Unfollow</button>
        {{ Form::close() }}
    @elseif(! $user->is($currentUser))
    {{ Form::open(['method' => 'POST', 'route' => 'follows_path']) }}
       {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-primary">Follow {{$user->username}}</button>
    {{ Form::close() }}
    @endif
    <br />
@endif
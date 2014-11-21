<?php namespace Larabook\Users;


trait FollowableTrait
{

    /**
     * Get the list of users that the current user followedUsers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followedUsers()
    {
        return $this->belongsToMany( static::class, 'follows', 'follower_id', 'followed_id' )->withTimestamps();
    }

    /**
     * Get the list of users who follow the current user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany( 'Larabook\Users\User', 'follows', 'followed_id', 'follower_id' )->withTimestamps();
    }

    /**
     * Determing if current user is followed by other user
     *
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy( User $otherUser )
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists( 'followed_Id' );
        return in_array( $this->id, $idsWhoOtherUserFollows );
    }

} 
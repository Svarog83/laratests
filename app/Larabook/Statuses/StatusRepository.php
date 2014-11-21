<?php namespace Larabook\Statuses;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Larabook\Statuses\Status;
use Larabook\Users\User;

/**
 * Class StatusRepository
 * @package Larabook\Statuses
 */
class StatusRepository {

    /**
     * Save a new status for a user
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save ( Status $status, $userId )
    {
        return User::findOrFail($userId)
                ->statuses()
                ->save($status);
    }

    /**
     * @param $userId
     * @return HasMany
     */
    public function getAllForUserId( $userId )
    {
        return Status::whereUserId($userId)->get();
    }

    /**
     * @param User $user
     * @internal param $userId
     * @return HasMany
     */
    public function getAllForUser( User $user )
    {
        return $user->statuses()->with('user')->orderBy("created_at", "desc")->get();
    }

    /**
     * @param User $user
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
    }


} 
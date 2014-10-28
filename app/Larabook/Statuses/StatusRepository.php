<?php namespace Larabook\Statuses;

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
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getAllForUserId( $userId )
    {
        return Status::whereUserId($userId)->get();
    }

} 
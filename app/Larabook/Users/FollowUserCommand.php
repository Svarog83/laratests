<?php
/**
 * Created by PhpStorm.
 * User: Svarog
 * Date: 11.11.2014
 * Time: 19:26
 */

namespace Larabook\Users;


class FollowUserCommand {

    public $userId;

    public $userIdToFollow;

    function __construct( $userId, $userIdToFollow )
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }


} 
<?php namespace Larabook\Users;


use Laracasts\Commander\CommandHandler;


class FollowUserCommandHandler implements CommandHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;

    function __construct( UserRepository $userRepo )
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed|void
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->follow($command->userIdToFollow, $user);

        return $user;
    }


} 
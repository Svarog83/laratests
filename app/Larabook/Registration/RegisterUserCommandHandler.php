<?php namespace Larabook\Registration;


use Larabook\Users\User;
use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler {

    protected $repository;
    use DispatchableTrait;

    function __construct( UserRepository $repository )
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     * @param $command
     * @return mixed
     */
    public function handle ( $command )
    {
       /* $user = User::create(
                Input::only('username', 'email', 'password')
            );*/

        $user = User::register (
                $command->username, $command->email, $command->password

        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }


} 
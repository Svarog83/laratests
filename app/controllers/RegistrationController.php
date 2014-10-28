<?php

use Illuminate\Console\Command;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Forms\RegistrationForm;
use Larabook\Core\CommandBus;


class RegistrationController extends BaseController {

    use CommandBus;

    /**
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * Constructor
     * @param RegistrationForm $registrationForm
     */

    function __construct(RegistrationForm $registrationForm )
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

    /**
     * Create a new user.
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate( Input::all() );

        extract( Input::only('username', 'email', 'password') );

        $user = $this->execute(
                new RegisterUserCommand ( $username, $email, $password )
        );

        Auth::login($user);

        Flash::overlay('Welcome to my test site');

        return Redirect::home()->with('flash_message', 'Welcome aboard!');
    }

}

<?php

class RegistrationController extends \BaseController {

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
        $user = User::create(
            Input::only('username', 'email', 'password')
        );

        Auth::login( $user );
        return Redirect::home();
        //return 'creating a new user';
    }

}

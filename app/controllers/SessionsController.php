<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {
    /**
     * @var SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);

        $this->signInForm = $signInForm;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for signing in
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch the form input
        $formData = Input::only('email', 'password');

        //validate the form
        $this->signInForm->validate($formData);
        //if invalid, then go back - already handled in global.php


        //if is valid then try to sing in
        if ( ! Auth::attempt($formData))
        {
            Flash::message('We were unable to sing in. Please try again.');
            return Redirect::back()->withInput();
        }
        else
        {

            // redirect to status
            Flash::message('Welcome back!');
            return Redirect::intended('statuses');
        }

	}

    /**
     * Log out user of Larabook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();
        Flash::message('You have been log out');
        return Redirect::home();
    }

}

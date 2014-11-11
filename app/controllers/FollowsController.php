<?php

use Larabook\Users\FollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user
	 *
	 * @return Response
	 */
	public function store()
	{
		//id of the user to follow
        $input = array_add(Input::all(), 'userId', Auth::id());

        $user = $this->execute(FollowUserCommand::class, $input);
        Flash::success('You are now following this user');
        return Redirect::back();
	}


	/**
	 * Stop following a user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

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
     * @param $userIdToUnfollow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userIdToUnfollow)
	{
        $input = array_add(Input::all(), 'userId', Auth::id());

        $this->execute(UnfollowUserCommand::class, $input);

        Flash::success('You have now unfollowed this user');

        return Redirect::back();
	}


}

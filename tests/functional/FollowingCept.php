<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook user');
$I->wantTo('follow other Larabook users');

//setup
$I->haveAnAccount(['username' => 'OtherUser']);

$I->signIn();

//action
$I->click('Browse Users');
$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

//When I follow a user
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow');
$I->dontSee('Follow OtherUser');

//When I unfollow the same user
$I->click('Unfollow');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');

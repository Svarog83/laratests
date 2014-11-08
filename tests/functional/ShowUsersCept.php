<?php 
$I = new FunctionalTester($scenario);
$I->am('A Larabook member');
$I->wantTo('list all registered users');

$I->haveAnAccount(['username'=> 'Foo']);
$I->haveAnAccount(['username'=> 'Bars']);
$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bars');
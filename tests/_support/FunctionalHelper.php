<?php namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I


use Laracasts\TestDummy\Factory as TestDummy;

/**
 * Class FunctionalHelper
 * @package Codeception\Module
 */
class FunctionalHelper extends \Codeception\Module {

    /**
     * @param array $overrides
     */
    public function haveAnAccount($overrides=[])
    {
        TestDummy::create ('Larabook\Users\User', $overrides);
    }


    /**
     *
     */
    public function signIn()
    {
        $email = 'foo@examle.com';
        $password = 'foo';
        $this->haveAnAccount(['email'=>$email, 'password' => $password]);
        /**
         * @var \FunctionalTester $I
         */
        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('email',$email);
        $I->fillField('password',$password);
        $I->click('Sign in');
    }

}
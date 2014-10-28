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

    public function postAStatus($body)
    {
        /**
        * @var \FunctionalTester $I
        */
        $I = $this->getModule('Laravel4');
        $I->fillField('Status:', $body);
        $I->click('Post Status');
        //$this->have('Larabook\Statuses\Status', $overrides);
    }

    /**
     * @param $model
     * @param array $overrides
     * @return mixed
     */
    public function have ($model, $overrides = [])
    {
        return TestDummy::create ($model, $overrides);
    }

    /**
     * @param array $overrides
     * @return mixed
     */
    public function haveAnAccount($overrides=[])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }
}
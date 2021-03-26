<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Session;
use Behat\Mink\Selector\SelectorsHandler;
use Behat\Mink\Element\ElementInterface;

class LoginContext extends RawMinkContext implements Context {

    /**
     * @When I login as a :user_type with :credentials credentials
     */
    public function iLoginAsAWithCredentials($user_type, $credentials)
    {
        $page = $this->getSession()->getPage();

        switch($user_type) {
            case "buyer":
                if($credentials == "correct") {
                    $login_email = $page->find('css', 'input.userLoginEmail')->setValue('sldevbuyer@sltest.com');
                    $login_password = $page->find('css', 'input[type=password]')->setValue('Pass#word1');
                } else {
                    $login_email = $page->find('css', 'input.userLoginEmail')->setValue('sldevbuyer@sltest.com');
                    $login_password = $page->find('css', 'input[type=password]')->setValue('1234');
                }
                break;
            case "seller":
                if($credentials == "correct") {
                    $login_email = $page->find('css', 'input.userLoginEmail')->setValue('seller@curious-films.info');
                    $login_password = $page->find('css', 'input[type=password]')->setValue('HFttunBCB6x8]=i');
                } else {
                    $login_email = $page->find('css', 'input.userLoginEmail')->setValue('testwrongselleremail@email.com');
                    $login_password = $page->find('css', 'input[type=password]')->setValue('1234');
                }
                break;
        }
    }
}
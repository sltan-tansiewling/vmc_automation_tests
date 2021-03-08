<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;


/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */

    public function __construct()
    {
    }

    /**
     * @Given I am on the VMC homepage
     */
    public function iAmOnTheVmcHomepage()
    {
        $this->visitPath('https://dev.vuulr.info/');
    }

    /**
     * @When I click on the :arg1 button
     */
    public function iClickOnTheButton($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the sign in form
     */
    public function iShouldSeeTheSignInForm()
    {
        throw new PendingException();
    }
}

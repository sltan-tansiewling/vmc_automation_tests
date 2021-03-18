<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Element\TraversableElement;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context
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
     * @Given I maximise window size
     */
    public function iMaximiseWindowSize()
    {
        $this->getSession()->getDriver()->maximizeWindow();
    }

    /**
     * @When /^I fill "([^"]*)" with "([^"]*)"$/
     */
    public function fillWith($selector, $text)
    {
        $element = $this->getSession()->getPage()->find('css', $selector);
        if($element === null){
            throw new Exception("Element $selector not found");
        }else{
            $element->setValue($text);
        }
    }

    /**
     * Waits a while, for debugging.
     *
     * @param int $seconds
     *   How long to wait.
     *
     * @When I wait :seconds second(s)
     */
    public function wait($seconds) {
        sleep($seconds);
    }


    /**
     * @When /^(?:|I )fill in select2 input "(?P<field>(?:[^"]|\\")*)" with "(?P<value>(?:[^"]|\\")*)" and select "(?P<entry>(?:[^"]|\\")*)"$/
     */
    public function iFillInSelectInputWithAndSelect($field, $value, $entry)
    {
        $page = $this->getSession()->getPage();

        $inputField = $page->find('css', $field);
        if (!$inputField) {
            throw new \Exception('No field found');
        }

        $select2Input = $page->find('css', '.select2-search__field');
        if (!$select2Input) {
            throw new \Exception('No input found');
        }
        $select2Input->setValue($value);

        $this->getSession()->wait(1000);

        $chosenResults = $page->findAll('css', '.select2-results li');
        foreach ($chosenResults as $result) {
            if ($result->getText() == $entry) {
                $result->click();
                break;
            }
        }
    }
}

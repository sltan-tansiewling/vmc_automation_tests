<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Element\TraversableElement;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Mink\Session;
use Behat\Mink\Selector\SelectorsHandler;
use Behat\Mink\Element\ElementInterface;

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

    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     *
     */
    public function setUpTestEnvironment($scope)
    {
        $this->currentScenario = $scope->getScenario();
    }

    /**
     * @AfterStep
     *
     * @param AfterStepScope $scope
     */
    public function afterStep($scope)
    {
        //if test has failed, and is not an api test, get screenshot
        if(!$scope->getTestResult()->isPassed())
        {
            //create filename string

            $featureFolder = preg_replace('/\W/', '', $scope->getFeature()->getTitle());
                
                            $scenarioName = $this->currentScenario->getTitle();
                            $fileName = preg_replace('/\W/', '', $scenarioName) . '.png';

            //create screenshots directory if it doesn't exist
            // if (!file_exists('results/html/assets/screenshots/' . $featureFolder)) {
            //     mkdir('results/html/assets/screenshots/' . $featureFolder);
            // }

            //take screenshot and save as the previously defined filename
            $this->driver->takeScreenshot('results/html/assets/screenshots/' . $featureFolder . '/' . $fileName);
            // For Selenium2 Driver you can use:
            // file_put_contents('results/html/assets/screenshots/' . $featureFolder . '/' . $fileName, $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @When I select Exclusive rights for Free to Air format
     */
    public function iSelectRightsForFormat()
    {
        $element = $this->getSession()->getPage()->find(
            'xpath', '//table[contains(@class, "offer-rights-table")]/tbody/tr[1]/td[2]');

        if (!$element) {
            throw new \Exception('No input found');
        }
        else {
            echo "Found";
        }
        $element->click();
    }

    /**
     * @When I scroll :selector into view
     *
     * @param string $selector Allowed selectors: #id, .className, //xpath
     *
     * @throws \Exception
     */
    public function scrollIntoView($selector)
    {
        $locator = substr($selector, 0, 1);

        switch ($locator) {
            case '/' : // XPath selector
                $function = <<<JS
                    (function(){
                    var elem = document.evaluate($selector, document, null, XPathResult.UNORDERED_NODE_ITERATOR_TYPE, null).singleNodeValue;
                    elem.scrollIntoView(false);
                    })()
                    JS;
                break;

            case '#' : // ID selector
                $selector = substr($selector, 1);
                $function = <<<JS
                    (function(){
                    var elem = document.getElementById("$selector");
                    elem.scrollIntoView(false);
                    })()
                    JS;
                break;

            case '.' : // Class selector
                $selector = substr($selector, 1);
                $function = <<<JS
                    (function(){
                    var elem = document.getElementsByClassName("$selector");
                    elem[0].scrollIntoView(false);
                    })()
                    JS;
                break;

            default:
                throw new \Exception(__METHOD__ . ' Couldn\'t find selector: ' . $selector . ' - Allowed selectors: #id, .className, //xpath');
                break;
        }

        try {
            $this->getSession()->executeScript($function);
        } catch (Exception $e) {
            throw new \Exception(__METHOD__ . ' failed');
        }
    }

    /**
     * @Then I click on :selector button
     */
    public function iClickOnButton2($selector)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', $selector);
        $element->click();
    }

    // To find out how to select the offer
    /**
     * @When I select the offer
     */
    public function iSelectTheOffer()
    {
        $table = $this->getSession()->getPage()->find('css', 'table#hits');
        $div = $table->find('css', 'div#hits_result_show_wrapper');
        $row = $div->findAll('css', 'tr.offer-sent');
        
        foreach($row as $offer) {
            $offer->find('css', 'td.pt-3.pb-3');
        }

        if (!$row) {
            throw new \Exception('No input found');
        }
        else {
            echo "Found";
        }
        // $element->click();
    }

}
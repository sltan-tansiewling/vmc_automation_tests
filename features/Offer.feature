Feature: Offer
    In order to purchase movie content
    As a buyer
    I need to be able to make an offer

@javascript
Scenario: Make Offer
    Given I am on the homepage
    And I maximise window size
    
    When I follow "Sign in"
    And I fill "input.userLoginEmail" with "siewling.tan@vuulr.com"
    And I fill "input[type=password]" with "Pass#word1"
    And I press "Sign In"
    And I wait 5 seconds   

    When I go to "/listing/174-gaturro?collection=1"
    And I press "continue"
    And I follow "Make Offer/Proposal"
    And I press "Make an Offer"

    And I fill in select2 input "input.select2-search__field" with "South East Asia" and select "South East Asia"
    And I fill "input.w-100.years" with "2"
    And I scroll ".rights-table" into view
    And I wait 5 seconds
    And I select Exclusive rights for Free to Air format
    And I wait 5 seconds

    And I fill "input#amount" with "100000"
    And I scroll "#gtm-buyer-make_offer-step1-continue-btn" into view
    And I follow "Continue"

    And I fill "input#addChannel" with "Channel Test"
    And I follow "Add"
    And I wait 5 seconds
    And I scroll "#gtm-buyer-make_offer-step2-continue-btn" into view
    And I wait 5 seconds
    And I select "Specific Date" from "mediaDeliveryOptions"
    And I wait 5 seconds
    And I click on "a.continue-step-2" button

    And I wait 5 seconds
    And I scroll "#gtm-buyer-make_offer-step3-continue-btn" into view
    And I wait 5 seconds
    And I follow "Add Legal Entity"
    And I scroll "#add_legal_entity_lnk" into view
    And I fill "input[name=legalEntityName]" with "Test Entity Name 220321-5"
    And I fill "textarea[name=mailingAddress]" with "Test Mailing Address"
    And I fill "input[name=website]" with "www.test-website.com"
    And I fill "input[name=contactEmail]" with "test_email@email.com"
    And I fill "input#telephone-input" with "+6590210322"
    And I click on "a#add_legal_entity_lnk" button
    And I scroll "#gtm-buyer-make_offer-step3-continue-btn" into view
    And I wait 5 seconds
    And I click on "a.continue-step-3" button
    
    And I wait 5 seconds
    And I scroll "#gtm-buyer-make_offer-step4-make_offer-btn" into view
    And I follow "Make Offer"


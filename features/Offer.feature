Feature: Offer

Scenario: Buyer can make an offer
    Given I am on the homepage
    And I maximise window size
    
    When I follow "Sign in"
    Then I should see "Sign In"
    And I login as a "buyer" with "correct" credentials
    And I press "Sign In"
    And I wait 5 seconds   

    When I go to "/listing/174-gaturro?collection=1"
    And I press "continue"
    And I follow "Make Offer/Proposal"
    And I wait 5 seconds
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
    And I click on "input[name=legalEntity][value=9]" button

    # And I follow "Add Legal Entity"
    # And I scroll "#add_legal_entity_lnk" into view
    # And I fill "input[name=legalEntityName]" with "Automation Testing v1"
    # And I fill "textarea[name=mailingAddress]" with "Test Mailing Address"
    # And I fill "input[name=website]" with "www.test-website.com"
    # And I fill "input[name=contactEmail]" with "test_email@email.com"
    # And I fill "input#telephone-input" with "+6590210326"
    # And I click on "a#add_legal_entity_lnk" button

    And I scroll "#gtm-buyer-make_offer-step3-continue-btn" into view
    And I wait 5 seconds
    And I click on "a.continue-step-3" button

    And I wait 5 seconds
    And I scroll "#gtm-buyer-make_offer-step4-make_offer-btn" into view
    And I wait 5 seconds
    And I follow "Make Offer"
    And I wait 5 seconds
    Then I should see "You are waiting for the reply from other party" 
    
Scenario: Seller can accept an offer
    Given I am on the homepage
    And I maximise window size

    When I follow "Sign in"
    Then I should see "Sign In"
    And I login as a "seller" with "correct" credentials
    # And I fill "input.userLoginEmail" with "seller@curious-films.info"
    # And I fill "input[type=password]" with "HFttunBCB6x8]=i"
    And I press "Sign In"
    And I wait 5 seconds 
    
    When I follow "Negotiations"
    And I go to "/offers/155"
    And I click on "button.verify-mobile-number-accept-offer" button

    And I follow "Add Legal Entity"
    And I scroll "#add_legal_entity_lnk" into view
    And I fill "input[name=legalEntityName]" with "LE for Offer Acceptance"
    And I fill "textarea[name=mailingAddress]" with "Test Mailing Address"
    And I fill "input[name=website]" with "www.test-website.com"
    And I fill "input[name=contactEmail]" with "test_email@email.com"
    And I fill "input#telephone-input" with "+6590210322"
    And I click on "a#add_legal_entity_lnk" button
    And I click on "button#accept_offer_btn" button
    And I wait 5 seconds
    Then I should see "The Offer has been accepted. Please proceed to Deal Memo to complete the transaction."

Scenario: Seller can reject an offer
    Given I am on the homepage
    And I maximise window size

    When I follow "Sign in"
    Then I should see "Sign In"
    And I fill "input.userLoginEmail" with "seller@curious-films.info"
    And I fill "input[type=password]" with "HFttunBCB6x8]=i"
    And I press "Sign In"
    And I wait 5 seconds 
    
    When I follow "Negotiations"
    And I go to "/offers/160"
    And I click on "a[data-target='#rejectionReasonModal']" button
    And I fill "textarea#rejectionReason" with "Automation Testing for Reject Offer"
    And I click on "button.submitRejectionReason" button
    And I wait 5 seconds
    Then I should see "Offer Rejected"
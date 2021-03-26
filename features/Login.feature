Feature: Login
    In order to purchase movie content
    As a buyer
    I need to be able to login to the marketplace

Scenario: Logging in to the marketplace as a buyer
    Given I am on the homepage
    And I maximise window size
    When I follow "Sign in"
    Then I should see "Sign In"

    When I login as a "buyer" with "wrong" credentials
    And I press "Sign In"
    Then I should see "These credentials do not match our records."

    When I login as a "buyer" with "correct" credentials
    And I press "Sign In"
    And I wait 5 seconds
    Then I should see "Buyer"
    And I should see "DISCOVERY"

    When I follow "Buyer"
    And I follow "Log out"
    Then I am on the homepage 
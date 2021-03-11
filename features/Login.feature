Feature: Login
    In order to purchase movie content
    As a buyer
    I need to be able to login to the marketplace

Scenario: Logging in to the marketplace as a buyer
    Given I am on the homepage
    And I maximise window size
    When I follow "Sign in"
    Then I should see "Sign In"

    When I fill "input.userLoginEmail" with "sldevbuyer@sltest.com"
    And I fill "input[type=password]" with "1234"
    And I press "Sign In"
    Then I should see a "span.help-block.email-error.error" element

    When I fill "input[type=password]" with "Pass#word1"
    And I press "Sign In"
    Then I should see "Buyer"
    And I should see "DISCOVERY"

    When I follow "Buyer"
    And I follow "Log out"
    Then I am on the homepage 
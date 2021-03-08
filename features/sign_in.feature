Feature: Sign In
    In order to purchase movie content
    As a buyer
    I need to be able to login to the marketplace

Scenario: Logging in to the marketplace as a buyer
    Given I am on "https://dev.vuulr.info/"
    When I follow "Sign in"
    Then I should see "Sign In"
@account @javascript
Feature: Checking Account Functionality
  As an account user
  I should be able to do some basic account functionality on an Eccomerce site

  @desktop
  Scenario: As a customer I should be able to login and logout
    Given I am on the account login page
    And I fill in my login details
    And I press "Login"
    Then I should the welcome message
    And I am on the account page
    Then I click the account link
    And I follow "Log Out"
    Then I should be on the account logout page

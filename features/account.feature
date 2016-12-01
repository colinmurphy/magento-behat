@account @javascript
Feature: Checking Account Functionality
  As an account user
  I should be able to do some basic account functionality on an Eccomerce site

  @desktop @login
  Scenario: As a customer I should be able to login and logout
    Given I am on the account login page
    And I fill in my login details
    And I press the login button
    Then I should the welcome message
    And I am on the account page
    Then I click the account link
    And I follow "Log Out"
    Then I should be on the account logout page

  @desktop @register
  Scenario: As a customer I should be able to register as a customer
    Given I am on the account register page
    And I fill in my register details
    And I press the register button
    Then I should be on the account page
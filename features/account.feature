@account @javascript
Feature: Checking Account Functionality
  As an account user
  I should be able to do some basic account functionality on an Eccomerce site

  @desktop
  Scenario: Signin as a customer on a desktop device
    Given I am on "/customer/account/login/"
    And I fill in my login details
    And I press "Login"
    Then I should see "Welcome"
    And I am on "/customer/account/"


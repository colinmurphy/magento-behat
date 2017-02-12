@account @javascript
Feature: Testing Account Functionality
  As an account user
  I should be able to use the Magento account functionality

  Scenario: Logging in as a customer
    When I am on the login page
    And I login in as a customer
    Then I should be on the account dashboard page
    And I should see the login success message

  Scenario: Registering a customer
    When I am on the create account page
    And I fill in the following:
      | First Name       | Colin                     |
      | Last Name        | Murphy                    |
      | Email Address    | register@studioforty9.com |
      | Password         | password123               |
      | Confirm Password | password123               |
    And I create an account
    Then I should be on the account dashboard page

  Scenario: Adding a new address
    When I am logged in a customer
    And I go to the address book page
    And I add a new address
    And I fill in the following:
      | First Name      | Colin           |
      | Last Name       | Murphy          |
      | Company         | StudioForty9    |
      | Telephone       | 00000000        |
      | Street Address  | 50th South Mall |
      | City            | Cork City       |
      | State/Province  | Cork            |
      | Zip/Postal Code | 021             |
      | Country         | Ireland         |
    And I save my address
    Then the address should be saved

  Scenario: Checking my orders history
    When I am logged in a customer
    And I go to the orders page
    Then I should see my order history


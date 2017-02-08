@product @simple_product @javascript
Feature: Checking Account Functionality
  As an account user
  I should be able to use the Magento account functionality

  Scenario: Login as a Customer
    When I am on the login page
    And I login in as a customer
    Then I should be on the account dashboard page
    And I should see the login success message

  Scenario: Registering a Customer
    When I am on the create account page
    And I fill in the following:
      | First Name       | Colin                     |
      | Last Name        | Murphy                    |
      | Email Address    | register@studioforty9.com |
      | Password         | password123               |
      | Confirm Password | password123               |
    Then I should be on the account dashboard page


  Scenario: Add A New Address
    When I am on the login page
    And I login in as a customer
    Then I should be on the account dashboard page
    And I click Address Book
    And I click the add new address button
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
    And I click Save Address
    Then the address should be saved

  Scenario: Checking Orders
    When I am on the login page
    And I login in as a customer
    Then I should be on the account dashboard page
    And I click My Orders
    Then I should see the order history


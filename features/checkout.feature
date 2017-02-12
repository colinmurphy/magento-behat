@checkout @javascript
Feature: Testing Checkout Functionality
  As an checkout user
  I should be able to use the Magento checkout functionality
  
  Background:
    Given I am on a product page
    And I add a product to the cart
    And I process to the checkout page

  Scenario: Checking out a guest
    And I checkout as a guest
    And I fill in the following:
      | First Name      | Colin                     |
      | Last Name       | Murphy                    |
      | Company         | StudioForty9              |
      | Email Address   | register@studioforty9.com |
      | Address         | 50th South Mall           |
      | City            | Cork City                 |
      | Zip/Postal Code | 021                       |
      | Telephone       | 1111111                   |
    And I click continue
    Then I should see the shipping method "Flat Rate"
    And I should see the shipping rate "5.00"
    And I click continue
    Then I should see the payment method "Credit Card (saved)"
    And I select "Credit Card (saved)"
    And I fill in the following:
      | Name on Card       | Colin Murphy     |
      | Credit Card        | Visa             |
      | Credit Card Number | 4263971921001307 |
      | Month              | 03 - March       |
      | Year               | 2025             |
    And I click continue
    Then I should see the Subtotal "9.99"
    And I should see the Tax "2.30"
    And I should see the Grand Total "17.29"
    And I place my order
    Then I should be on the success page

  Scenario: Checking out and registering a customer
    And I checkout as register and checkout
    And I fill in the following:
      | First Name       | Colin                                |
      | Last Name        | Murphy                               |
      | Company          | StudioForty9                         |
      | Email Address    | registerandcheckout@studioforty9.com |
      | Address          | 50th South Mall                      |
      | City             | Cork City                            |
      | Zip/Postal Code  | 021                                  |
      | Telephone        | 1111111                              |
      | Password         | 1111111                              |
      | Confirm Password | 1111111                              |
    And I click continue
    Then I should see the shipping method "Flat Rate"
    And I should see the shipping rate "5.00"
    And I click continue
    Then I should see the payment method "Credit Card (saved)"
    And I select "Credit Card (saved)"
    And I fill in the following:
      | Name on Card       | Colin Murphy     |
      | Credit Card        | Visa             |
      | Credit Card Number | 4263971921001307 |
      | Month              | 03 - March       |
      | Year               | 2025             |
    And I click continue
    Then I should see the Subtotal "9.99"
    And I should see the Tax "2.30"
    And I should see the Grand Total "17.29"
    And I place my order
    Then I should be on the success page


  Scenario: Checking out as a logged in customer
    And I fill in the following:
      | Email Address | customer@studioforty9.com |
      | Password      | password123               |
    And I click login
    Then I should see my shipping address
    And I click continue
    Then I should see the shipping method "Flat Rate"
    And I should see the shipping rate "5.00"
    And I click continue
    Then I should see the payment method "Credit Card (saved)"
    And I select "Credit Card (saved)"
    And I fill in the following:
      | Name on Card       | Colin Murphy     |
      | Credit Card        | Visa             |
      | Credit Card Number | 4263971921001307 |
      | Month              | 03 - March       |
      | Year               | 2025             |
    And I click continue
    Then I should see the Subtotal "9.99"
    And I should see the Tax "2.30"
    And I should see the Grand Total "17.29"
    And I place my order
    Then I should be on the success page

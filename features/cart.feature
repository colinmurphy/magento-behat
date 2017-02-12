@cart @javascript
Feature: Testing Cart Functionality
  As an cart user
  I should be able to use the Magento cart functionality

  Background:
    Given I am on a product page
    And I add the product to the cart
    And I should be on the cart page

  Scenario: Checking page elements
    And I should see the page title
    And I should see the cart table
    And I should see the discount form
    And I should see the shipping estimate form

  Scenario: Updating the cart quantity
    And I update the product "Simple Product" quantity of "2"
    Then I should see a subtotal of "19.98"
    And I should see a tax of "4.60"
    And I should see a grand total of "24.58"

  Scenario: Applying a discount
    Then I add the discount code "test"
    And I apply the discount
    Then I should see a subtotal of "9.99"
    And I should see the discount of "0.99"
    And I should see a tax of "2.07"
    And I should see a grand total of "11.09"

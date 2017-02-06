@desktop @page_elements @javascript
Feature: Checking Page Elements for Desktop
  As an cart desktop user
  I should be able to add products to the cart and use core Magento cart functionality.

  Background:
    Given I am on a product page

  @test
  Scenario: Adding a item to the cart
    When I add a product to the cart
    Then I should be on the cart page
    And I should see the success cart message

  Scenario: Updating the cart quantity
    When I add a product to the cart
    Then I update the product quantity to "2"
    Then I should see a cart quantity of "2"

  Scenario: Applying a discount
    When I add a product to the cart
    Then I add the discount code "test"
    Then I should see a discount of "10%"


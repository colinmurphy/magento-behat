@product @configurable_product @javascript
Feature: Testing Configurable Product Functionality
  As an configurable product user
  I should be able to use the Magento configurable product functionality

  Background:
    Given I am on a configurable product page

  Scenario: Checking page elements
    Then I should see the page title
    And I should see the product description
    And I should see the stock status of "In Stock"
    And I should see the grouped product table
    And I should see the product option "Colour"
    And I should see the product option "Size"
    And I should see the add to cart button
    And I should see the quantity input
    And I should see the main product image
    And I should see the product thumbnails
    And I should see the wishlist link
    And I should see the compare link
    And I should see the review tab

  Scenario: Add a product to the cart
    When I select the colour "Red"
    And I select the size "Large"
    Then I add the product to the cart
    Then I should be on the cart page
    And I should see a subtotal of "9.99"
    And I should see a tax of "2.30"
    And I should see a grand total of "12.99"

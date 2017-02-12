@product @wishlist @javascript
Feature: Testing Wishlist Functionality
  As a wishlist user
  I should be able to use the Magento wishlist functionality

  Scenario: Add a product to the wishlist
    When I am logged in a customer
    And I go to a product page
    When I add a product to the wishlist
    Then the product should be added to the wishlist
    Then when I logout
    And I am the login page
    And I login as a customer
    And I go to the wishlist page
    Then I should see the product in my wishlist
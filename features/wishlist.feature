@product @wishlist @javascript
Feature: Checking Product Review Functionality
  As a wishlist user
  I should be able to use the Magento wishlist functionality

  Scenario: Add a product to the wishlist
    Given I am logged in as a customer
    And I go to a product page
    When I add a product to the wishlist
    Then I should be on the wishlist page
    And I should see the success message
    Then when I logout
    And I login as a customer
    And I go to the wishlist page
    Then I should see the product in my wishlist
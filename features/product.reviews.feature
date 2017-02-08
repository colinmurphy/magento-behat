@product @product_reviews @javascript
Feature: Checking Product Review Functionality
  As a product reviewer
  I should be able to use the Magento review functionality

  Background:
    Given I am logged in
    And I am on the product page with reviews

  Scenario: Checking Reviews
    And I click on review tab

  Scenario: Make a Review
    When I click on review tab
    And I fill in the following:
      | Let us know your thoughts | This is a great product |
      | Summary of your review    | Awesome Product         |
      | Whats your nickname       | Colin                   |
    And I submit the review
    And I then should see a success message


@desktop @page_elements @javascript
Feature: Checking Page Elements for desktop
  As an desktop user
  I should see the core page elements and check that the core functionality of a page works.

  Background:
    Given I am on "/"

  Scenario: Checking core page elements are visible on a page
    Then I should see a logo
    Then I should see the navigation menu
    Then I should see the account link
    Then I should see the search bar
    Then I should see the cart link
    Then I should see the page title
    Then I should see the footer links
    Then I should see the footer subscription form

  Scenario: Checking account menu works
    When I click the account link
    Then I should see the account menu
    When I follow "My Account"
    Then I be on the account page

  Scenario: Checking search functionality works
    When I enter a search string
    And I click the search button
    Then I should be on the search result page

  Scenario: Checking the minicart works
    When I click the cart link
    Then I should see the cart menu
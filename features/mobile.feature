@mobile @page_elements @javascript
Feature: Checking Page Elements for Tablet Landscape
  As an mobile user
  I should see the core page elements and check that the core functionality of a page works.

  Background:
    Given I am on "/"

  Scenario: Checking core page elements are visible on a page
    Then I should see a logo
    Then I should see the menu bar
    Then I should see the page title
    Then I should see the footer links
    Then I should see the footer subscription form

  Scenario: Checking account menu works
    When I click the account link
    Then I should see the account menu
    When I follow the main account link
    Then I be on the account page

  Scenario: Checking navigation menu works
    When I click the navigation link
    Then I should see the navigation
    When I click the navigation link
    Then I should not see the navigation

  Scenario: Checking search functionality works
    When I enter a search string
    And I click the search button
    Then I should be on the search result page

  Scenario: Checking the minicart works
    When I click the cart link
    Then I should see the cart menu
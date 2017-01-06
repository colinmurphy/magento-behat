@tablet_small @page_elements @javascript
Feature: Checking Page Elements for a small tablet device
  As an tablet small user
  I should see the core page elements and check that the core functionality of a page works.

  Background:
    Given I am on "/"

  Scenario: Checking core page elements are visible on a page
    Then I should see a logo
    Then I should see the page title
    Then I should see the footer links
    Then I should see the footer subscription form

  Scenario: Checking account menu works
    When I click the account link
    Then I should see the account menu
    When I follow "My Account"
    Then I be on the account page

  Scenario: Checking navigation menu works
    When I click the navigation link
    Then I should see the navigation menu
    When I click the navigation link
    Then I should not see the navigation menu

  Scenario: Checking search functionality works
    Then I click the search link
    Then I should see the search bar
    When I enter a search string
    And I click the search button
    Then I should be on "/catalogsearch/result/"

  Scenario: Checking the minicart works
    When I click the cart link
    Then I should see the cart menu
@page_elements @javascript
Feature: Checking Page Elements
As a user I should see the following core elements on a page.

  @desktop
  Scenario: Checking page elements on a desktop device
    Given I am on "/"
    Then I should see a logo
    Then I should see the navigation bar
    Then I should see the footer links
    Then I should see the footer subscription form

  @tablet_large @mink:tablet_large_session
  Scenario: Checking page elements on a desktop device
    Given I am on "/"
    Then I should see a logo
    Then I should see the navigation bar
    Then I should see the footer links
    Then I should see the footer subscription form

  @tablet_small @mink:tablet_small_session
  Scenario: Checking page elements on a tablet device
    Given I am on "/"
    Then I should see a logo
    Then I should see the footer links
    Then I should see the footer subscription form
    When I toggle the navigation menu
    Then I should see the navigation bar
    When I toggle the navigation menu
    Then I should not see the navigation bar

  @mobile @mink:mobile_session
  Scenario: Checking page elements on a mobile device
    Given I am on "/"
    Then I should see a logo
    Then I should see the footer links
    Then I should see the footer subscription form
    When I toggle the navigation menu
    Then I should see the navigation bar
    When I toggle the navigation menu
    Then I should not see the navigation bar
@page_elements @javascript
Feature: Checking Page Elements
  As a web user I should see the following core elements on a page.

  @desktop
  Scenario: Checking core page elements exist on a desktop device
    Given I am on "/"
    Then I should see a logo
    Then I should see the navigation menu
    Then I should see the footer links
    Then I should see the footer subscription form

  @desktop @account
  Scenario: Checking account link and menu works on a desktop device
    Given I am on "/"
    Then I should see the account link
    When I click the account link
    Then I should see the account menu
    When I follow "My Account"
    Then I should be on "/customer/account/login/"

  @desktop @search
  Scenario: Checking search works on a desktop device
    Given I am on "/"
    Then I should see the search bar
    When I enter a search string
    And I click the search button
    Then I should be on "/catalogsearch/result/"

  @desktop @cart
  Scenario: Checking cart link and menu works on a desktop device
    Given I am on "/"
    Then I should see the cart link
    When I click the cart link
    Then I should see the cart menu

  @tablet_large @mink:tablet_large_session
  Scenario: Checking core page elements exist on a large tablet device
    Given I am on "/"
    Then I should see a logo
    Then I should see the navigation menu
    Then I should see the footer links
    Then I should see the footer subscription form

  @tablet_large @mink:tablet_large_session @account
  Scenario: Checking account link and menu works on a large tablet device
    Given I am on "/"
    Then I should see the account link
    When I click the account link
    Then I should see the account menu
    When I follow "My Account"
    Then I should be on "/customer/account/login/"

  @tablet_large @mink:tablet_large_session @search
  Scenario: Checking search works on a large tablet device
    Given I am on "/"
    Then I should see the search bar
    When I enter a search string
    And I click the search button
    Then I should be on "/catalogsearch/result/"

  @tablet_large @mink:tablet_large_session @cart
  Scenario: Checking cart link and menu works on a large tablet device
    Given I am on "/"
    Then I should see the cart link
    When I click the cart link
    Then I should see the cart menu

  @tablet_small @mink:tablet_small_session
  Scenario: Checking core page elements exist on a small tablet device
    Given I am on "/"
    Then I should see a logo
    Then I should see the footer links
    Then I should see the footer subscription form

  @tablet_small @mink:tablet_small_session
  Scenario: Checking navigation menu and link works on a small tablet device
    Given I am on "/"
    When I click the navigation link
    Then I should see the navigation menu
    When I click the navigation link
    Then I should not see the navigation menu

  @tablet_small @mink:tablet_small_session @account
  Scenario: Checking account link and menu works on a small tablet device
    Given I am on "/"
    Then I should see the account link
    When I click the account link
    Then I should see the account menu
    When I follow "My Account"
    Then I should be on "/customer/account/login/"

  @tablet_small @mink:tablet_small_session @search
  Scenario: Checking search works on a small tablet device
    Given I am on "/"
    Then I click the search link
    Then I should see the search bar
    When I enter a search string
    And I click the search button
    Then I should be on "/catalogsearch/result/"

  @tablet_small @mink:tablet_small_session @cart
  Scenario: Checking cart link and menu works on a small tablet device
    Given I am on "/"
    Then I should see the cart link
    When I click the cart link
    Then I should see the cart menu

  @mobile @mink:mobile_session
  Scenario: Checking core page elements exist on a mobile device
    Given I am on "/"
    Then I should see a logo
    Then I should see the footer links
    Then I should see the footer subscription form

  @mobile @mink:mobile_session
  Scenario: Checking navigation menu and link works on a mobile device
    Given I am on "/"
    When I click the navigation link
    Then I should see the navigation menu
    When I click the navigation link
    Then I should not see the navigation menu

  @mobile @mink:mobile_session @account
  Scenario: Checking account link and menu works on a mobile device
    Given I am on "/"
    Then I should see the account link
    When I click the account link
    Then I should see the account menu
    When I follow "My Account"
    Then I should be on "/customer/account/login/"

  @mobile @mink:mobile_session @search
  Scenario: Checking search works on a mobile device
    Given I am on "/"
    Then I click the search link
    Then I should see the search bar
    When I enter a search string
    And I click the search button
    Then I should be on "/catalogsearch/result/"

  @mobile @mink:mobile_session @cart
  Scenario: Checking cart link and menu works on a mobile device
    Given I am on "/"
    Then I should see the cart link
    When I click the cart link
    Then I should see the cart menu
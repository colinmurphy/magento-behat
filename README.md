# Intro

In beta. For running Behat with Magento (1 currently not 2).

# Run tests

You can run all profiles with bin/run_all.sh

# 1. Installation

## 1.1. composer.json

    {
        "require-dev": {
            "behat/behat": "3.2.2",
            "behat/mink": "1.7.1",
            "behat/mink-extension": "2.2",
            "behat/mink-goutte-driver": "1.2.1",
            "behat/mink-selenium2-driver": "v1.3.1",
            "jcalderonzumba/mink-phantomjs-driver": "0.3.2",
            "phpunit/phpunit": "5.6.3",
            "symfony/yaml": "*"
        },
        "config": {
            "bin-dir": "bin"
        },
        "autoload": {
            "psr-0": {
                "": [
                    "./app",
                    "./app/code/local",
                    "./app/code/community",
                    "./app/code/core",
                    "./lib"
                ]
            }
        },
        "minimum-stability": "dev"
    }
    
## 1.2. behat.yml

Replace "/Users/colin/Sites/magento-behat/behat-config.yml" with the path to your behat config file. More below.

       default:
           suites:
               page_features:
                   paths:    [ %paths.base%/features ]
                   contexts:
                       - PageContext:
                           configFilePath: /Users/colin/Sites/magento-behat/behat-config.yml
                   filters:
                       role: desktop user
           formatters:
               pretty:
           extensions:
               Behat\MinkExtension:
                   base_url: http://magento-behat.dev/
                   goutte:
                       server_parameters: ~
                   selenium2:
                       wd_host: 'http://localhost:4444/wd/hub'
                   browser_name: chrome
                   default_session: selenium2
                   sessions:
                       desktop_session:
                           selenium2:
                             browser: chrome
                             capabilities:
                               extra_capabilities:
                                 chromeOptions:
                                   args:
                                     - "--start-maximized"
       tablet_large:
           suites:
               page_features:
                   paths:    [ %paths.base%/features ]
                   contexts:
                       - PageContext:
                           configFilePath: /Users/colin/Sites/magento-behat/behat-config.yml
                   filters:
                       role: tablet large user
           formatters:
               pretty:
           extensions:
               Behat\MinkExtension:
                   base_url: http://magento-behat.dev/
                   goutte:
                       server_parameters: ~
                   selenium2:
                       wd_host: 'http://localhost:4444/wd/hub'
                   browser_name: chrome
                   default_session: selenium2
                   sessions:
                       desktop_session:
                         selenium2:
                           browser: chrome
                           capabilities:
                             extra_capabilities:
                               chromeOptions:
                                 mobileEmulation:
                                   deviceMetrics:
                                     width: 1024
                                     height: 768
                                     pixelRatio: 1.5
       tablet_small:
           suites:
               page_features:
                   paths:    [ %paths.base%/features ]
                   contexts:
                       - PageContext:
                           configFilePath: /Users/colin/Sites/magento-behat/behat-config.yml
                   filters:
                       role: tablet small user
           formatters:
               pretty:
           extensions:
               Behat\MinkExtension:
                   base_url: http://magento-behat.dev/
                   goutte:
                       server_parameters: ~
                   selenium2:
                       wd_host: 'http://localhost:4444/wd/hub'
                   browser_name: chrome
                   default_session: selenium2
                   sessions:
                       desktop_session:
                         selenium2:
                           browser: chrome
                           capabilities:
                             extra_capabilities:
                               chromeOptions:
                                 mobileEmulation:
                                   deviceName: "Apple iPad"
       mobile:
           suites:
               page_features:
                   paths:    [ %paths.base%/features ]
                   contexts:
                       - PageContext:
                           configFilePath: /Users/colin/Sites/magento-behat/behat-config.yml
                   filters:
                       role: mobile user
           formatters:
               pretty:
           extensions:
               Behat\MinkExtension:
                   base_url: http://magento-behat.dev/
                   goutte:
                       server_parameters: ~
                   selenium2:
                       wd_host: 'http://localhost:4444/wd/hub'
                   browser_name: chrome
                   default_session: selenium2
                   sessions:
                       desktop_session:
                         selenium2:
                           browser: chrome
                           capabilities:
                             extra_capabilities:
                               chromeOptions:
                                 mobileEmulation:
                                   deviceName: "Apple iPhone 6"


## 1.3. behat-config.yml

This file contains configuration paths to be used with Behat. See the PageContext class to see examples of how it is used.

        desktop:
            page_elements:
               logo: ".logo .large"
               page_title: ".page-title h2"
               navigation_menu: "#header-nav .nav-primary"
               footer_links: ".footer .links"
               footer_subscription_form: ".footer #newsletter-validate-detail"
               account_link: ".account-cart-wrapper .skip-link.skip-account"
               account_menu: "#header-account"
               cart_link: ".account-cart-wrapper .skip-link.skip-cart"
               cart_menu: "#header-cart"
               search_bar: "#search_mini_form"
               search_input: "#search_mini_form input#search"
               search_button: "#search_mini_form .search-button"
        tablet_large:
            page_elements:
                logo: ".logo .large"
                page_title: ".page-title h2"
                navigation_menu: "#header-nav .nav-primary"
                footer_links: ".footer .links"
                footer_subscription_form: ".footer #newsletter-validate-detail"
                account_link: ".account-cart-wrapper .skip-link.skip-account"
                account_menu: "#header-account"
                cart_link: ".account-cart-wrapper .skip-link.skip-cart"
                cart_menu: "#header-cart"
                search_bar: "#search_mini_form"
                search_input: "#search_mini_form input#search"
                search_button: "#search_mini_form .search-button"
        tablet_small:
            page_elements:
                logo: ".logo .small"
                page_title: ".page-title h2"
                navigation_menu: "#nav .nav-primary"
                navigation_link: "a.skip-link.skip-nav"
                footer_links: ".footer .links"
                footer_subscription_form: ".footer #newsletter-validate-detail"
                account_link: ".account-cart-wrapper .skip-link.skip-account"
                account_menu: "#header-account"
                search_link: ".skip-link.skip-search"
                cart_link: ".account-cart-wrapper .skip-link.skip-cart"
                cart_menu: "#header-cart"
                search_bar: "#header-search"
                search_input: "#search_mini_form input#search"
                search_button: "#search_mini_form .search-button"
        mobile:
            page_elements:
               logo: ".logo .small"
               page_title: ".page-title h2"
               menu_bar: "#header .skip-links"
               navigation_menu: "#nav .nav-primary"
               navigation_link: "a.skip-link.skip-nav"
               footer_links: ".footer .links"
               footer_subscription_form: ".footer #newsletter-validate-detail"
               account_link: ".account-cart-wrapper .skip-link.skip-account"
               account_menu: "#header-account"
               account_main_link: "#header-account li.first a"
               search_link: ".skip-link.skip-search"
               cart_link: ".account-cart-wrapper .skip-link.skip-cart"
               cart_menu: "#header-cart"
               search_bar: "#header-search"
               search_input: "#search_mini_form input#search"
               search_button: "#search_mini_form .search-button"


# To do

# Tests
- Account
- Cart
- Checkout
- Search
- Category
- Simple, Grouped & Configurable Product Context

# General
- Setup mailcatcher
- Documentation
- Create a bash script for setup which creates composer.yml, behat and behat-config.yml files
- Create a composer.json file and modman file
- Add to packages.firegento.com



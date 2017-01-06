# Intro
For running Behat 3 tests in Magento 1. In beta so info to follow.

# Installation
    {
        "require-dev": {
            "behat/behat": "3.2.2",
            "behat/mink": "1.7.1",
            "behat/mink-extension": "2.2",
            "behat/mink-goutte-driver": "1.2.1",
            "behat/mink-selenium2-driver": "v1.3.1",
            "jcalderonzumba/mink-phantomjs-driver": "0.3.2",
            "phpunit/phpunit": "5.6.3"
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
    
# Behat.yml file
default:
    suites:
        page_features:
            paths:    [ %paths.base%/features ]
            contexts: [ PageContext ]
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
            contexts: [ PageContext ]
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
            contexts: [ PageContext ]
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
            contexts: [ PageContext ]
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


# To do

- Setup composer, modman and update readme
- Add behat.yml script
- Move features test as sample and add shell script to rename them etc.
- Add documentaion
- Setup mailcatcher

- Account Features
- Category Features
- Cart Features
- Checkout Features
- Product Features
- Search Features

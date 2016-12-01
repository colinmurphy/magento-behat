<?php
use Behat\MinkExtension\Context\MinkContext;

class AccountContext extends MinkContext
{

    use MagentoTrait, ClickTrait, ConfigTrait, DeviceTrait;

    /**
     * @return string
     */
    public function getConfigPathPrefix()
    {
        return "studioforty9_behat/account/";
    }

    /**
     * @Given /^I am on the account page$/
     */
    public function iAmOnTheMainAccountPage()
    {
        $this->visit("/customer/account/");
    }

    /**
     * @Given /^I am on the account ([^"]*) page$/
     */
    public function iAmOnTheAccountPage($page = "")
    {
        $this->visit("/customer/account/", $page . "/");
    }

    /**
     * @Given /^I should be on the account ([^"]*) page$/
     */
    public function iShouldBeOnTheAccountPage($page)
    {
        $page = ($page == "logout") ? "logoutSuccess" : $page;
        $this->assertSession()->addressEquals("/customer/account/" . $page . "/");
    }

    /**
     * @Given I fill in my login details
     */
    public function iFillInMyLoginDetails()
    {
        $prefix = $this->getConfigPathPrefix();
        $this->fillField('Email Address', $this->getCssSelector($prefix . "login_email"));
        $this->fillField('Password', $this->getCssSelector($prefix . "login_password"));
    }

    /**
     * @Given I fill in my register details
     */
    public function iFillInMyRegisterDetails()
    {
        $prefix = $this->getConfigPathPrefix();
        $this->fillField('Email Address', $this->getCssSelector($prefix . "login_email"));
        $this->fillField('Password', $this->getCssSelector($prefix . "login_password"));
    }

    /**
     * @Then I click the account link
     */
    public function iClickTheAccountLink()
    {
        $path = "studioforty9_behat/page_elements_" . $this->getDevice() . "/";
        $this->clickElement($this->getCssSelector($path . "account_link"));
    }

    /**
     * @Then I should the welcome message
     */
    public function iShouldTheWelcomeMessage()
    {
        $message = $this->getCssSelector($this->getConfigPathPrefix() . "welcome_message");
        return $this->assertPageContainsText($message);
    }
}

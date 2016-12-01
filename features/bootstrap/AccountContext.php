<?php
use Behat\MinkExtension\Context\MinkContext;

class AccountContext extends MinkContext
{

    use MagentoTrait, ClickTrait, ConfigTrait, DeviceTrait;

    /**
     * Deletes the registered customer after the register scenario
     *
     * @AfterScenario
     */
    public static function afterScenario(Behat\Behat\Hook\Scope\AfterScenarioScope $scope)
    {
        if (!$scope->getScenario()->hasTag("register")) {
            return false;
        }

        try {
            $email = Mage::getStoreConfig("studioforty9_behat/account/register_email");
            $customer = Mage::getModel("customer/customer");
            $customer->setWebsiteId(Mage::app()->getStore()->getWebsiteId());
            $customer->loadByEmail($email);
            Mage::register('isSecureArea', true);
            $customer->delete();
            Mage::unregister('isSecureArea');
        } catch (Exception $e) {
            Mage::logException($e);
            throw new Exception("Couldn't delete customer");
        }
    }

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
        $page = ($page == "register") ? "create" : $page;
        $this->visit("/customer/account/" . $page . "/");
    }

    /**
     * @Given /^I should be registered as a customer$/
     */
    public function iShouldBeRegisterAsACustomer()
    {
        return $this->iShouldBeOnTheAccountPage("index");
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
        $this->fillField('email', $this->getCssSelector($prefix . "login_email"));
        $this->fillField('pass', $this->getCssSelector($prefix . "login_password"));
    }

    /**
     * @Given I press the login button
     */
    public function iPressTheLoginButton()
    {
        $this->pressButton("send2");
    }

    /**
     * @Given I press the register button
     */
    public function iPressTheRegisterButton()
    {
        $this->pressButton("Register");
    }

    /**
     * @Given I fill in my register details
     */
    public function iFillInMyRegisterDetails()
    {
        $prefix = $this->getConfigPathPrefix();
        $this->fillField('firstname', $this->getCssSelector($prefix . "register_first_name"));
        $this->fillField('lastname', $this->getCssSelector($prefix . "register_last_name"));
        $this->fillField('email', $this->getCssSelector($prefix . "register_email"));
        $this->fillField('password', $this->getCssSelector($prefix . "register_password"));
        $this->fillField('confirmation', $this->getCssSelector($prefix . "register_password"));
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

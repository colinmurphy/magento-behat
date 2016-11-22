<?php
use Behat\MinkExtension\Context\MinkContext;

class AccountContext extends MinkContext
{

    use MagentoTrait, ConfigTrait;

    public function __construct()
    {
        $this->setConfigPathPrefix("studioforty9_behat/account/");
    }

    /**
     * @Given I fill in my login details
     */
    public function iFillInMyLoginDetails()
    {
        $this->fillField('Email Address', $this->getCssSelector("login_email"));
        $this->fillField('Password', $this->getCssSelector("login_password"));
    }
}

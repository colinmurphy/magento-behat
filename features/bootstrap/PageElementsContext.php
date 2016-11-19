<?php

class PageElementsContext extends MagentoContext
{

    use DeviceTrait, VisibilityTrait;

    /**
     * @var string
     */
    protected $_configPrefix = "studioforty9_behat/page_elements/";

    /**
     * @return string
     */
    public function getConfigPrefix()
    {
        return "studioforty9_behat/page_elements_" . self::$_device . "/";
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public function getCssSelector($path)
    {
        return Mage::getStoreConfig($this->getConfigPrefix() . $path);
    }

    /**
     * @Then /^I should (see|not see) a logo$/
     */
    public function iShouldSeeALogo($action)
    {
        $this->checkElementVisibility($this->getCssSelector("logo"), $action === "see");
    }

    /**
     * @Then /^I should (see|not see) the navigation bar$/
     */
    public function iShouldViewNavigationBar($action)
    {
        $this->checkElementVisibility($this->getCssSelector("navigation"), $action === "see");
    }

    /**
     * @Then /^I should (see|not see) the footer links$/
     */
    public function iShouldSeeTheFooterLinks($action)
    {
        $this->checkElementVisibility($this->getCssSelector("footer_links"), $action === "see");
    }

    /**
     * @Then /^I should (see|not see) the footer subscription form$/
     */
    public function iShouldSeeTheFooterSubscriptionForm($action)
    {
        $this->checkElementVisibility($this->getCssSelector("footer_subscription_form"), $action === "see");
    }

    /**
     * @When I toggle the navigation menu
     */
    public function iToggleTheNavigationMenu()
    {
        $this->clickElement($this->getCssSelector("navigation_toggle"));
        $this->iWaitSeconds(3);
    }
}

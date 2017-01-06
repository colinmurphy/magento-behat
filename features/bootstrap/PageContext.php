<?php
use Behat\MinkExtension\Context\MinkContext;

class PageContext extends MinkContext
{

    use MagentoTrait, ClickTrait, ConfigTrait, DeviceTrait, VisibilityTrait;

    /**
     * @return string
     */
    public function getConfigPrefixPath()
    {
        return "studioforty9_behat/page_elements_" . $this->getDevice() . "/";
    }

    /**
     * @Then /^I should (see|not see) (a|the) ([^"]*)$/
     */
    public function iShouldSeePageElement($action, $verb, $element)
    {
        $visible = ($action === "see") ? true : false;
        $selector = strtolower(str_replace(" ", "_", $element));
        $path = $this->getConfigPrefixPath() . $selector;
        $this->checkElementVisibility($this->getCssSelector($path), $visible);
    }

    /**
     * @When I enter a search string
     */
    public function iEnterASearchString()
    {
        $path = $this->getConfigPrefixPath() . "search_input";
        $selector = $this->getCssSelector($path);
        $el = $this->getSession()->getPage()->find("css", $selector);
        $el->setValue("a");
    }

    /**
     * @When /^I click the ([^"]*)$/
     */
    public function iClickPageElement($element)
    {
        $element = strtolower(str_replace(" ", "_", $element));
        $path = $this->getConfigPrefixPath() . $element;
        $this->clickElement($this->getCssSelector($path));
        $this->iWaitSeconds(1);
    }

    /**
     * @Then I be on the account page
     */
    public function iBeOnTheAccountPage()
    {
        return $this->assertSession()->addressEquals("/customer/account/login/");
    }

    /**
     * @Then I should be on the search result page
     */
    public function iShouldBeOnTheSearchResultPage()
    {
        return $this->assertSession()->addressEquals("/catalogsearch/result/?q=");
    }
}

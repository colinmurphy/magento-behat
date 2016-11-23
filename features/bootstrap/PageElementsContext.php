<?php
use Behat\MinkExtension\Context\MinkContext;

class PageElementsContext extends MinkContext
{

    use MagentoTrait, ConfigTrait, DeviceTrait, VisibilityTrait;

    public function setDeviceConfigPath()
    {
        $this->setConfigPathPrefix("studioforty9_behat/page_elements_" . $this->getDevice() . "/");
    }

    /**
     * @Then /^I should (see|not see) (a|the) ([^"]*)$/
     */
    public function iShouldSeePageElement($action, $verb, $element)
    {
        $this->setDeviceConfigPath();
        $visible = ($action === "see") ? true : false;
        $selector = strtolower(str_replace(" ", "_", $element));
        $this->checkElementVisibility($this->getCssSelector($selector), $visible);
    }

    /**
     * @When I enter a search string
     */
    public function iEnterASearchString()
    {
        $this->setDeviceConfigPath();
        $selector = $this->getCssSelector("search_input");
        $el = $this->getSession()->getPage()->find("css", $selector);
        $el->setValue("a");
    }

    /**
     * @When /^I click the ([^"]*)$/
     */
    public function iClickPageElement($element)
    {
        $this->setDeviceConfigPath();
        $element = strtolower(str_replace(" ", "_", $element));
        $this->clickElement($this->getCssSelector($element));
        $this->iWaitSeconds(1);
    }

    /**
     * @param $selector
     *
     * @throws Exception
     */
    public function clickElement($selector)
    {
        try {
            $element = $this->getSession()->getPage()->find("css", $selector);
            $element->click();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}

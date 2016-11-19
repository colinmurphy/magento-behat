<?php
use Behat\MinkExtension\Context\MinkContext;

class PageElementsContext extends MinkContext
{

    use MagentoTrait, DeviceTrait, VisibilityTrait;

    /**
     * @var string
     */
    protected $_configPrefix = "studioforty9_behat/page_elements/";

    /**
     * @param $path
     *
     * @return mixed
     */
    public function getCssSelector($path)
    {
        $prefix = "studioforty9_behat/page_elements_" . $this->getDevice() . "/";
        return Mage::getStoreConfig($prefix . $path);
    }

    /**
     * @Then /^I should (see|not see) (a|the) ([^"]*)$/
     */
    public function iShouldSeePageElement($action, $verb, $element)
    {
        $visible = ($action === "see") ? true : false;
        $element = strtolower(str_replace(" ", "_", $element));
        $this->checkElementVisibility($this->getCssSelector($element), $visible);
    }

    /**
     * @When I toggle the navigation menu
     */
    public function iToggleTheNavigationMenu()
    {
        $this->clickElement($this->getCssSelector("navigation_toggle"));
        $this->iWaitSeconds(3);
    }

    /**
     * @param $path
     *
     * @throws Exception
     */
    public function clickElement($path)
    {
        try {
            $element = $this->getSession()->getPage()->find("css", $path);
            $element->click();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

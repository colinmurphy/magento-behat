<?php
use Behat\MinkExtension\Context\MinkContext;

class PageElementsContext extends MinkContext
{

    use MagentoTrait, ClickTrait, DeviceTrait, VisibilityTrait;

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
        $configPath = "studioforty9_behat/page_elements_" . $this->getDevice() . "/" . $path;
        $value = Mage::getStoreConfig($configPath);

        if (!$value) {
            throw new \Behat\Mink\Exception\ExpectationException(
                "Magento configuration '$configPath' was not found", $this->getSession()
            );
        }
        return $value;
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
     * @When I enter a search string
     */
    public function iEnterASearchString()
    {
        $selector = $this->getCssSelector("search_input");
        $el = $this->getSession()->getPage()->find("css", $selector);
        $el->setValue("a");
    }

}

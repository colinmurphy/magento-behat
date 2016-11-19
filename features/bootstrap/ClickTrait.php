<?php

trait ClickTrait
{
    /**
     * @When /^I click the ([^"]*)$/
     */
    public function iClickPageElement($element)
    {
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

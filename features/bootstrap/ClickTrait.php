<?php

trait ClickTrait
{
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
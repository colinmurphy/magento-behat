<?php

use  \Behat\Mink\Exception\ElementNotFoundException as ElementNotFoundException,
    \Behat\Mink\Exception\ExpectationException as ExpectationException;

trait VisibilityTrait
{
    /**
     * @param string $selector CSS selector
     * @param bool   $visible
     *
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function checkElementVisibility($selector, $visible = true)
    {
        if ($visible) {
            $this->checkVisibilityOnPage($selector, "visible");
        } else {
            $this->checkVisibilityOnPage($selector, "not visible");
        }
    }

    /**
     * Checks Element is visible on page
     *
     * @Then /^"([^"]*)" be (visible|not visible) on the page$/
     */
    public function checkVisibilityOnPage($selector, $visibility)
    {
        $element = $this->getSession()->getPage();
        $node = $element->find('css', $selector);

        if ($visibility == "visible") {
            if ($node->isVisible()) {
                return true;
            }
            throw new ElementNotFoundException($this->getSession(), 'css', 'selector', $selector);
        }

        if (!$node->isVisible()) {
            return true;
        }

        throw new ExpectationException("Element $selector was found to be visible", $this->getSession());
    }
}

<?php

class CartContext extends PageContext
{
    /**
     * @param string $configFilePath
     */
    public function __construct($configFilePath)
    {
        $this->setConfigFilePath($configFilePath);
    }

    /**
     * @return string
     */
    public function getConfigPrefixPath()
    {
        return  "cart/";
    }

    /**
     * @Given I am on a product page
     */
    public function iAmOnAProductPage()
    {
        $selector = $this->getConfigPrefixPath() . "product_sku";
        $sku = $this->getCssSelector($selector);
        $this->iVisitProductPagebySku($sku);
    }

    /**
     * @When I add a product to the cart
     */
    public function iAddAProductToTheCart()
    {
        $path = $this->getConfigPrefixPath() . "add_button";
        $selector = $this->getCssSelector($path);
        $this->getSession()->getPage()->find("css", $selector)->click();
        $this->iWaitSeconds(10);
    }

    /**
     * @Then I should be on the cart page
     */
    public function iShouldBeOnTheCartPage()
    {
        return $this->assertSession()->addressEquals("/checkout/cart/");
    }

    /**
     * @Then I update the product quantity to :arg1
     */
    public function iUpdateTheProductQuantityTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see a cart quantity of :arg1
     */
    public function iShouldSeeACartQuantityOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I add the discount code :arg1
     */
    public function iAddTheDiscountCode($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see a discount of :arg1
     */
    public function iShouldSeeADiscountOf($arg1)
    {
        throw new PendingException();
    }



}

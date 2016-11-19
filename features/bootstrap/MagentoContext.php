<?php
require_once("app/Mage.php");

use Behat\MinkExtension\Context\MinkContext;

class MagentoContext extends MinkContext
{
    /**
     * @BeforeSuite
     */
    public static function prepareBeforeSuite()
    {
        Mage::app();
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

    /**
     * @Given I wait :arg1 seconds
     */
    public function iWaitSeconds($arg1)
    {
        sleep($arg1);
    }

}

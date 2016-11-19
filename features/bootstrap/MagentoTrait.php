<?php
require_once("app/Mage.php");

trait MagentoTrait
{
    /**
     * @BeforeSuite
     */
    public static function prepareBeforeSuite()
    {
        Mage::app();
    }

    /**
     * @Given I wait :arg1 seconds
     */
    public function iWaitSeconds($arg1)
    {
        sleep($arg1);
    }

}
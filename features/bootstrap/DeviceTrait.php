<?php


trait DeviceTrait
{
    /**
     * @var string
     */
    protected static $_device = "desktop";

    /**
     * Sets the device to be used in the config path to get the CSS selector
     *
     * @BeforeScenario
     */
    public static function prepareBeforeScenario(Behat\Behat\Hook\Scope\BeforeScenarioScope $scenarioScope)
    {
        $scenario = $scenarioScope->getScenario();

        if ($scenario->hasTag("tablet_large")) {
            self::$_device = "tablet_large";
        } else if ($scenario->hasTag("tablet_small")) {
            self::$_device = "tablet_small";
        } else if ($scenario->hasTag("mobile")) {
            self::$_device = "mobile";
        }
    }
}

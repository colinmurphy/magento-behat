<?php

trait DeviceTrait
{
    /**
     * @var string
     */
    protected static $_device = "desktop";

    /**
     * @return string
     */
    public function getDevice()
    {
        return static::$_device;
    }

    /**
     * Sets the device to be used in the config path to get the CSS selector
     *
     * @BeforeFeature
     */
    public static function prepareBeforeFeature(Behat\Behat\Hook\Scope\BeforeFeatureScope $featureScope)
    {
        $feature = $featureScope->getFeature();
        return self::_setDevice($feature);
    }

    /**
     * Sets the device to be used in the config path to get the CSS selector
     *
     * @BeforeScenario
     */
    public static function prepareBeforeScenario(Behat\Behat\Hook\Scope\BeforeScenarioScope $scenarioScope)
    {
        $scenario = $scenarioScope->getScenario();
        return self::_setDevice($scenario);
    }


    /**
     * @param $object
     *
     * @return bool
     */
    protected static function _setDevice($object)
    {
        if ($object->hasTag("desktop")) {
            static::$_device = "tablet_large";
            return true;
        }

        if ($object->hasTag("tablet_large")) {
            static::$_device = "tablet_large";
            return true;
        }

        if ($object->hasTag("tablet_small")) {
            static::$_device = "tablet_small";
            return true;
        }

        if ($object->hasTag("mobile")) {
            static::$_device = "mobile";
            return true;
        }

        return false;
    }
}

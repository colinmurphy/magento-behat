<?php

trait ConfigTrait
{

    /**
     * @var string
     */
    protected $_configPrefix = "";

    /**
     * @param $prefix
     */
    public function setConfigPathPrefix($prefix)
    {
        $this->_configPrefix = $prefix;
    }

    /**
     * @return string
     */
    public function getConfigPathPrefix()
    {
        return $this->_configPrefix;
    }

    /**
     * @param $path
     *
     * @return mixed
     * @throws \Behat\Mink\Exception\ExpectationException
     */
    public function getCssSelector($path)
    {
        $configPath = $this->getConfigPathPrefix() . $path;
        $value = Mage::getStoreConfig($configPath);

        if (!$value) {
            throw new \Behat\Mink\Exception\ExpectationException(
                "Magento configuration '$configPath' was not found", $this->getSession()
            );
        }
        return $value;
    }

}

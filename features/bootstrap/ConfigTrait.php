<?php


trait ConfigTrait
{

    /**
     * @var string
     */
    protected $_configPrefix = "studioforty9_behat/page_elements/";

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

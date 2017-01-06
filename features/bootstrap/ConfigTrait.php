<?php

trait ConfigTrait
{
    /**
     * @param $path
     *
     * @return mixed
     * @throws \Behat\Mink\Exception\ExpectationException
     */
    public function getCssSelector($path)
    {
        $value = Mage::getStoreConfig($path);
        if (!$value) {
            throw new \Behat\Mink\Exception\ExpectationException(
                "Magento configuration '$path' was not found", $this->getSession()
            );
        }
        return $value;
    }

}

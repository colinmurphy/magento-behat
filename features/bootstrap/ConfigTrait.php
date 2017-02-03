<?php
use \Symfony\Component\Yaml\Yaml,
    \Behat\Mink\Exception\ExpectationException as ExpectationException;

trait ConfigTrait
{
    /**
     * @var string
     */
    protected $_configFilePath;

    /**
     * @param $configFilePath
     */
    public function setConfigFilePath($configFilePath)
    {
        $this->_configFilePath = $configFilePath;
    }

    /**
     * @return mixed
     */
    public function getConfigFilePath()
    {
       return $this->_configFilePath;
    }


    /**
     * @param $path
     *
     * @return mixed
     * @throws \Behat\Mink\Exception\ExpectationException
     */
    public function getCssSelector($path, $delimiter = "/")
    {
        $filePath = $this->getConfigFilePath();
        if (! $filePath) {
            throw new ExpectationException("Behat context parameter for configFilePath needs to be set.", $this->getSession());
        }
        $config = $this->getConfig($filePath);
        $paths = explode($delimiter, $path);
        return $this->getValue($paths, $config);
    }

    /**
     * @param array $args
     * @param array $config
     *
     * @return string
     * @throws ExpectationException
     */
    public function getValue(array $args, array $config)
    {
        $value = $config;
        foreach ($args as $key) {
            if (! array_key_exists($key, $value)) {
                throw new ExpectationException("Configuration path '$key' was not found", $this->getSession());
            }
            $value = $value[$key];
        }

        return $value;
    }


    /**
     * @param string $filePath
     *
     * @return mixed
     * @throws ExpectationException
     */
    public function getConfig($filePath)
    {
        try {
            $config = Yaml::parse(file_get_contents($filePath));
        } catch (\Exception $e) {
            throw new ExpectationException("Cannot parse yaml config file $filePath", $this->getSession());
        }
        return $config;
    }

}

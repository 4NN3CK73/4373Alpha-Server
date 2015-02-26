<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 * Created 14.02.15 at 12:36 by 4nn3ck
 * ***********************************************************************
 */

namespace Anneck\Game\Configuration;

use Anneck\Game\Configuration;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The abstract class ConfigurationRoot defines the default behaviour of all.
 *
 * @Configuration implementations.
 *
 * The "default" is set to a NAME and a UUID.
 */
abstract class ConfigurationRoot implements Configuration
{
    const NAME = 'NAME';
    const UUID = 'UUID';

    /**
     * @var ArrayCollection holds the configuration keys and values.
     */
    private $configuration;

    /**
     * Creates the ConfigurationRoot e.g. the key's and value's all extending classes will share.
     * It defines: NAME, UUID.
     */
    public function __construct()
    {
        $defaultConfiguration = new ArrayCollection();

        $this->configuration = $defaultConfiguration;
    }

    /**
     * Returns all configuration key's.
     *
     * @return array of configuration key's;
     */
    public function getConfigurationKeys()
    {
        return $this->getConfiguration()->getKeys();
    }

    /**
     * Returns the configuration as a collection.
     *
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Set configuration values using the specified key.
     * Only extending classes should use this method during construction, that's why it's protected.
     *
     * @param $key   string the key to use
     * @param $value string the value to use
     */
    protected function setConfiguration($key, $value)
    {
        $this->configuration->set($key, $value);
    }

    /**
     * Returns true if the specified key is found in the configuration.
     *
     * @param $key string the key to look for in the configuration.
     *
     * @return bool true if the key is found, otherwise false.
     */
    public function hasConfigurationKey($key)
    {
        return $this->getConfiguration()->containsKey($key);
    }

    /**
     * Returns it's internal configuration values as a JSON encoded string.
     *
     * @return string the configuration through json_encode as a string
     */
    public function toJson()
    {
        // collection to array into json_encode PHP function.
        return json_encode($this->configuration->toArray());
    }

    /**
     * Another utility method for extending classes.
     *
     * @param ArrayCollection $collectionToAdd the array collection to add to the internal configuration.
     */
    protected function addConfiguration(ArrayCollection $collectionToAdd)
    {
        $this->configuration =
            new ArrayCollection(
                array_merge(
                    $collectionToAdd->toArray(),
                    $this->configuration->toArray()
                )
            );
    }
}

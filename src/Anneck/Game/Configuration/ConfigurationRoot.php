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
use Doctrine\Common\Collections\Collection;

/**
 * The abstract class ConfigurationRoot defines the default behaviour of all
 * @Configuration implementations.
 *
 * The "default" is to treat
 *
 * @package Anneck\Game\Configuration
 */
abstract class ConfigurationRoot implements Configuration
{
    const NAME = 'NAME';

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

        $defaultConfiguration->set(self::NAME,
            'default');
        $defaultConfiguration->set('UUID',
            'default');

        $this->configuration = $defaultConfiguration;
    }

    /**
     * @inheritdoc
     */
    public function getConfigurationKeys()
    {
        return $this->getConfiguration()->getKeys();
    }

    /**
     * @inheritdoc
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @inheritdoc
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

}
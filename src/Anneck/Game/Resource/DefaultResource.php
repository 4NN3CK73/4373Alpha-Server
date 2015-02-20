<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game\Resource;

use Anneck\Game\Configuration\ConfigurationFactory;
use Anneck\Game\Configuration\DefaultResourceConfiguration;
use Anneck\Game\Resource;
use Doctrine\Common\Collections\Collection;

/**
 * The class DefaultResource ...
 * @ToDo: Define the purpose of the class with "separation of concerns" in mind.
 *
 */
class DefaultResource implements Resource
{
    /**
     * @var Collection to hold configuration values
     */
    private $resourceConfiguration;

    public function __construct()
    {
        $this->resourceConfiguration = ConfigurationFactory::getInstance('DefaultResource')->getConfiguration();
        // $this->resourceConfiguration->set(ConfigurationRoot::NAME, $resourceName);

    }

    public function setGameWorld()
    {

    }

    /**
     * The default resource is compatible with anything.
     *
     * @param Resource $anotherResource
     * @return bool true - this is just a default
     */
    public function isCompatible(Resource $anotherResource)
    {
        return true;
    }

    public function __toString()
    {
        return $this->getResourceType();
    }

    /**
     * @return string
     */
    public function getResourceType()
    {
        return $this->resourceConfiguration->get(DefaultResourceConfiguration::TYPE);
    }

}
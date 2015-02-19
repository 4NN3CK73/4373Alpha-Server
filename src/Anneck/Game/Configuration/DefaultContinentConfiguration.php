<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 * Created by 4nn3ck
 * ***********************************************************************
 */
namespace Anneck\Game\Configuration;

use Anneck\Game\Configuration;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The class DefaultContinentConfiguration is a default class for testing purposes,
 * and error handling maybe ...
 *
 */
class DefaultContinentConfiguration extends ConfigurationRoot
{

    /**
     * Creates a DefaultContinentConfiguration
     */
    public function __construct()
    {
        parent::__construct();
        $this->setConfiguration(self::NAME, 'defaultContinent');

        $resourceList = new ArrayCollection();
        $resourceList->add('defaultResourceType');
        $this->setConfiguration('RESOURCES', $resourceList);
    }

    /**
     * A string representation of the DefaultContinentConfiguration
     * @return string
     */
    public function __toString()
    {
        return $this->getConfiguration()->get(self::NAME);
    }

}
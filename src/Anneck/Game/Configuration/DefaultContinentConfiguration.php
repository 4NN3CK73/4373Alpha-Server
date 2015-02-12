<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
class DefaultContinentConfiguration implements Configuration
{
    /**
     * @var ArrayCollection holds the config values
     */
    private $configData;

    /**
     * Creates a DefaultContinentConfiguration
     */
    function __construct()
    {
        $this->configData = new ArrayCollection(
            array(
                'NAME' => '_DefaultContinentName_',
                'DESC' => '_DefaultContinentDescription_',
                'RSRC' => array(
                    'Code', 'Licence', 'Documentation', 'Text-Tutorial', 'Video-Tutorial'
                )
            )
        );
    }

    /**
     * A string representation of the DefaultContinentConfiguration
     * @return string
     */
    function __toString()
    {
        return __CLASS__;
    }
}
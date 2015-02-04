<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 12:45 PM
 */

namespace Anneck\Game\Configuration;


use Anneck\Game\Configuration;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * The class DefaultWorldConfiguration is just a placeholder during dev.
 *
 * @package Anneck\Game\Configuration
 */
class DefaultWorldConfiguration implements Configuration {

    /**
     * @return Collection a collection of configuration settings.
     */
    public function getConfiguration()
    {
        $configuration = new ArrayCollection();

        $configuration->set('name',
            'default');
        $configuration->set('UUID',
            'default');
        $configuration->set('continents',
            array('default-1', 'default-2', 'default-3'));

        return $configuration;
    }
}
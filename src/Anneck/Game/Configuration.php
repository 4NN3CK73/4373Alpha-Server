<?php
/**
 * This file is part of the 4373Alpha-Server
 */

namespace Anneck\Game;

use Doctrine\Common\Collections\Collection;

/**
 * Interface Configuration
 * @package Anneck\Game
 */
interface Configuration {

    /**
     * @return Collection a collection of configuration settings.
     */
    public function getConfiguration();
}
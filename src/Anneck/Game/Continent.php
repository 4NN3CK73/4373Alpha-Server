<?php
/**
 * This file is part of the 4373Alpha-Server
 */

namespace Anneck\Game;

use Doctrine\Common\Collections\Collection;

/**
 * The interface Continent identifies parts of game worlds.
 * Each Continent defines a set of resources available manufactures.
 *
 * @package Anneck\Game
 */
interface Continent
{

    /**
     * @return Collection a collection of resources available.
     */
    public function getResources();

}
<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
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
     * @return Collection of resources available.
     */
    public function getListOfResources();

    public function getName();

    public function getGameWorld();

}
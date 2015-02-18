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
 * A (Game) Continent is a context interface which defines a part of a game world.
 *
 * Each Continent is defined through an internal Configuration which associates each Continent to a World and a list
 * of Resource's available for the creation of Product's.
 *
 * @package Anneck\Game
 *
 */
interface Continent
{

    /**
     * Returns a collection of Resource's available in this continent.
     *
     * @return Collection of resources available.
     */
    public function getListOfResources();

    public function getName();

    public function getGameWorld();

    /* @todo add method
     * public function create(Configuration $continentConfig);
     */
}
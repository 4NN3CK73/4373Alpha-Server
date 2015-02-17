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
 * The interface World defines all common game world functions.
 * @package Anneck\Game
 */
interface World
{

    /**
     * Returns the continents who are a part of this world
     *
     * @return Collection of continents.
     */
    public function getContinents();

    public function getName();

    public function getUUID();

    /**
     * A factory method to create worlds using configurations.
     *
     * @param Configuration $worldConfig the configuration used to create it.
     * @return World creates itself using a world Configuration.
     */
    public function create(Configuration $worldConfig);

}
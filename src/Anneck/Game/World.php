<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Configuration;
use Doctrine\Common\Collections\Collection;

/**
 * The interface World defines all common game world functions and exposes them through
 * custom methods.
 *
 * A (Game) @World contains @Continent's and is created using a @Configuration.
 *
 * NOTE: Please ensure that implementing classes are forced to use the create method!
 *
 * @package Anneck\Game
 * @see The @DefaultWorld class, it is the default implemenation.
 */
interface World
{

    /**
     * Returns the continents who are a part of this world
     *
     * @return Collection of continents.
     */
    public function getContinents();

    /**
     * Returns the name of this world as defined in its configuration.
     *
     * @return mixed the Name of the world.
     */
    public function getName();

    /**
     * Returns the UUID which uniquely identifies this world in the universe.
     *
     * @return mixed the UUID of the world.
     */
    public function getUUID();

    /**
     * A factory method to create worlds using a @Configuration.
     *
     * @param Configuration $worldConfig the configuration used to create it.
     * @return World creates itself using a world Configuration.
     */
    public function create(Configuration $worldConfig);

}
<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 19.02.15, 12:27 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Worlds;


use Anneck\Game\Configuration;
use Anneck\Game\World;
use Doctrine\Common\Collections\Collection;

class GameWorld implements World
{

    /**
     * Returns the continents who are a part of this world
     *
     * @return Collection of continents.
     */
    public function getContinents()
    {
        // TODO: Implement getContinents() method.
    }

    /**
     * Returns the name of this world as defined in its configuration.
     *
     * @return mixed the Name of the world.
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * Returns the UUID which uniquely identifies this world in the universe.
     *
     * @return mixed the UUID of the world.
     */
    public function getUUID()
    {
        // TODO: Implement getUUID() method.
    }

    /**
     * A factory method to create worlds using a @Configuration.
     *
     * @param Configuration $worldConfig the configuration used to create it.
     *
     * @return World creates itself using a world Configuration.
     */
    public function create(Configuration $worldConfig)
    {
        // TODO: Implement create() method.
    }

}
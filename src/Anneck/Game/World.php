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
 * The (Game) World is a context interface which contains continent's.
 *
 * NOTE: Please ensure that implementing classes are forced to use the create method!
 *
 * @see The @DefaultWorld class, it is the default implemenation.
 */
interface World
{
    /**
     * Returns the continents who are a part of this world.
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
     *
     * @return World configures itself using a world Configuration.
     */
    public function configure(Configuration $worldConfig);

    /**
     * @param ActionQueueInterface $worldActions
     *
     * @return World changes itself using world actions
     */
    public function change(ActionQueueInterface $worldActions);

}

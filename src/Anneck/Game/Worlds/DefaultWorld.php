<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game\Worlds;


use Anneck\Game\Configuration;
use Anneck\Game\Configuration\DefaultWorldConfiguration;
use Anneck\Game\World;
use Doctrine\Common\Collections\Collection;

class DefaultWorld implements World {

    private $configuration;

    /**
     * Creates a new default world.
     */
    public function __construct()
    {
        $defaultConfig = new DefaultWorldConfiguration();
        $this->configuration = $defaultConfig->getConfiguration();
    }

    /**
     * Returns the continents who are a part of this world
     *
     * @return Collection of continents.
     */
    public function getContinents()
    {
        return $this->configuration->get('CONTINENTS');
    }

    public function getName()
    {
        return $this->configuration->get('NAME');
    }

    public function getUUID()
    {
        return $this->configuration->get('UUID');
    }

    /**
     * A factory method to create worlds using configurations.
     *
     * @param Configuration $worldConfig the configuration used to create it.
     * @return World creates itself using a world Configuration.
     */
    public function create(Configuration $worldConfig)
    {
        $newWorld = new DefaultWorld();

        return $newWorld;
    }
}
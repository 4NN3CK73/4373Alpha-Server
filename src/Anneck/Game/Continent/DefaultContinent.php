<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */


namespace Anneck\Game\Continent;

use Anneck\Game\Configuration;
use Anneck\Game\Continent;
use Anneck\Game\World;
use Doctrine\Common\Collections\Collection;

/**
 * The class DefaultContinent ...
 * @ToDo: Define the purpose of the class with "separation of concerns" in mind.
 *
 */
class DefaultContinent implements Continent
{
    private $configuration;
    private $gameWorld;

    public function __construct(Configuration $continentConfiguration)
    {
        $this->configuration = $continentConfiguration->getConfiguration();

    }

    /**
     * @return Collection of resources available.
     */
    public function getListOfResources()
    {
        return $this->configuration->get('RESOURCES');
    }

    public function __toString()
    {
        return __CLASS__ . $this->getName() . $this->getGameWorld();
    }

    public function getName()
    {
        $this->configuration->get('NAME');
    }

    public function getGameWorld()
    {
        return $this->gameWorld;
    }

    public function setGameWorld(World $world)
    {
        $this->gameWorld = $world;
    }

}
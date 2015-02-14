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
use Doctrine\Common\Collections\Collection;

/**
 * The class DefaultContinent ...
 * @ToDo: Define the purpose of the class with "separation of concerns" in mind.
 *
 */
class DefaultContinent implements Continent
{
    public function __construct(Configuration $continentConfiguration)
    {

    }

    /**
     * @return Collection a collection of resources available.
     */
    public function getResources()
    {
        // TODO: Implement getResources() method.
    }
}
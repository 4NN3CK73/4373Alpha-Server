<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

 

namespace Anneck\Game\Resource;

use Anneck\Game\Resource;

/**
 * The class DefaultResource ...
 * @ToDo: Define the purpose of the class with "separation of concerns" in mind.
 *
 */
class DefaultResource implements Resource
{
    /**
     * The default resource is compatible with anything.
     *
     * @param Resource $anotherResource
     * @return bool true - this is just a default
     */
    public function isCompatible(Resource $anotherResource)
    {
        return true;
    }
}
<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */
namespace Anneck\Game;

/**
 * The interface Resource
 * @package Anneck\Game
 */
interface Resource {

    /**
     * Determines if another resource is compatible with this resource.
     * Returns a boolean to indicate the result of the check.
     *
     * @param Resource $anotherResource
     * @return bool true if resources are compatible, else false
     */
    public function isCompatible(Resource $anotherResource);

}
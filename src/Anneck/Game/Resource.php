<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 12:11 PM
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
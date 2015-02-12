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

    public function isCompatible(Resource $anotherResource);

}
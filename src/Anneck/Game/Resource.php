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
 * The (Game) Resource interface describes parts of Products.
 *
 * * NOTE: Compatible does not mean "equal", each resource defines it compatibility with other resources.
 * *
 *
 * @package Anneck\Game
 * @see Anneck\Game\Product
 *
 *
 */
interface Resource
{

    /**
     * Determines if another resource is compatible with this resource.
     * Returns a boolean to indicate the result of the check.
     *
     * @param Resource $anotherResource
     * @return bool true if resources are compatible, else false
     */
    public function isCompatible(Resource $anotherResource);

    /**
     * Returns the name of this resource.
     *
     * @return mixed the resourceName of this resource.
     * @todo: this needs to be refactored to Type instead of name!
     */
    public function getResourceName();

}
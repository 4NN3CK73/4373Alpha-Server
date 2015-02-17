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
 * The interface Product is a Game object which enables
 * the combination of Resources using a compatibility check.
 *
 * To combine resource:
 * 1) 'add' them to the product.
 * 2) 'build' the product.
 *
 * @package Anneck\Game
 */
interface Product
{

    /**
     * Add's resources who are compatible with each other.
     *
     * @param Resource $resource
     * @return mixed
     */
    public function addResource(Resource $resource);

    /**
     * Combines the current resources
     * @param ProductFactory $productFactory
     * @return Product
     */
    public function build(ProductFactory $productFactory);

}
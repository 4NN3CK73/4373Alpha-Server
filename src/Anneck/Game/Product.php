<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 12:32 PM
 */

namespace Anneck\Game;

use Anneck\Manufacture\ProductFactory;

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
interface Product {

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
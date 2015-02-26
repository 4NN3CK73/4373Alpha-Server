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
 * The (Game) Product is a builder interface which enables
 * the building of Product's using Resource's and a ProductFactory.
 *
 * To combine @Resource's ...
 *
 * * 'add' them to the @Product.
 * * 'build' the product using a @ProductFactory
 *
 * The "build" process includes setting attributes of the created @Product specific to the chosen @ProductFactory
 *
 * @see Anneck\Game\ProductFactory
 */
interface Product
{
    /**
     * Add's resources who are compatible with each other.
     *
     * @param Resource $resource
     *
     * @return mixed
     */
    public function addResource(Resource $resource);

    /**
     * Combines the current resources using the specified product factory.
     *
     * @param ProductFactory $productFactory the product factory used to create the product
     *
     * @return Product the created product
     */
    public function build(ProductFactory $productFactory);
}

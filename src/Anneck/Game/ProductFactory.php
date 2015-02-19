<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Product;
use Doctrine\Common\Collections\Collection;

/**
 * The (Game) ProductFactory describes a factory interface which
 * works using a (Game)@World in order to create world specific @Product's.
 *
 * @package Anneck\Game
 */
interface ProductFactory
{

    /**
     * Creates the ProductFactory using the specified world.
     *
     *
     * @param World $world The world to use for product creation.
     *
     * @return self The ProductFactory specific to this world.
     */
    public static function getInstance(World $world);


    /**
     * Takes a collection of resources and creates a product from them.
     *
     * @param Collection $collectionOfResources
     * @return Product $createdProduct
     */
    public function createProduct(Collection $collectionOfResources);

    /**
     * Uses a product and a licence to create a licenced product.
     *
     * @param License $license
     * @param Product $product
     *
     * @return Product $product
     */
    public function createLicensedProduct(License $license, Product $product);

    /**
     * Returns the @World used to create product's.
     *
     * @return World the world used in this ProductFactory.
     */
    public function getWorld();

}
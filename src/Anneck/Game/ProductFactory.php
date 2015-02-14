<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 12:36 PM
 */

namespace Anneck\Game;

use Anneck\Game\License;
use Anneck\Game\Product;
use Doctrine\Common\Collections\Collection;

interface ProductFactory {

    /**
     * Takes a collection of resources and creates a product from them.
     *
     * @param Collection $collectionOfResources
     * @return Product $createdProduct
     */
    public function createProduct(Collection $collectionOfResources);

    /**
     * @param License $license
     * @param Product $product
     * @return Product $product
     */
    public function createLicensedProduct(License $license, Product $product);

}
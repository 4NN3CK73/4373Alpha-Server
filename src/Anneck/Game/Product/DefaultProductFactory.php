<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 14.02.15
 * Time: 09:00
 */

namespace Anneck\Game\Product;

use Anneck\Game\License,
    Anneck\Game\Product,
    Anneck\Game\ProductFactory;

use Doctrine\Common\Collections\Collection;

class DefaultProductFactory implements ProductFactory {

    /**
     * Takes a collection of resources and creates a product from them.
     *
     * @param Collection $collectionOfResources
     * @return Product $createdProduct
     */
    public function createProduct(Collection $collectionOfResources)
    {
        $newProduct = new DefaultProduct();
        return $newProduct;
    }

    /**
     * @param License $license
     * @param Product $product
     * @return Product $product
     */
    public function createLicensedProduct(License $license, Product $product)
    {
        // TODO: Implement createLicensedProduct() method.
    }
}
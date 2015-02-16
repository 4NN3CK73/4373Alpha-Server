<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\License;
use Anneck\Game\Product;
use Doctrine\Common\Collections\Collection;

interface ProductFactory {

    /**
     * @param World $world
     * @return self
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
     * @param License $license
     * @param Product $product
     * @return Product $product
     */
    public function createLicensedProduct(License $license, Product $product);

}
<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 12:41 PM
 */

namespace Anneck\Register;

use Anneck\Game\Product;

/**
 * The interface Trustee
 * @package Anneck\Register
 */
interface Trustee {

    public function addProduct(Product $product);

    /**
     * @param Product $product
     * @return bool true if the product is registered
     */
    public function isRegistered(Product $product);

}
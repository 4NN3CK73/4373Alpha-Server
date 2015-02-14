<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 14.02.15
 * Time: 07:41
 */

namespace Anneck\Game\Product;


use Anneck\Game\License;
use Anneck\Game\Product;

interface LicencedProduct extends Product {

    /**
     * Add's the required licence to the product.
     *
     * @param License $license
     * @return mixed
     */
    public function addLicence(License $license);

    /**
     * Validates the product licence
     * @return mixed
     */
    public function validateLicence();

}
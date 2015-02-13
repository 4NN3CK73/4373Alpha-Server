<?php

use Anneck\Game\License,
    Anneck\Game\Product,
    Anneck\Game\Resource;
USE Doctrine\Common\Collections\ArrayCollection;

/**
 * Created by PhpStorm.
 * User: andre
 * Date: 12.02.15
 * Time: 18:06
 */

class DefaultProduct implements Product {


    /**
     * @var ArrayCollection
     */
    private $resources;

    private $licence;

    public function __construct()
    {
        $this->resources = new ArrayCollection();
    }
    /**
     * @param Resource $resource
     */
    public function addResource(Resource $resource)
    {

        $this->checkIfCompatibleWithContained($resource);
    }

    /**
     * @param License $license
     */
    public function addLicence(License $license)
    {
        // TODO: Implement addLicence() method.
    }

    /**
     *
     */
    public function build()
    {
        // TODO: Implement build() method.
    }

    /**
     * @return boolean
     */
    public function validate()
    {
        return true;
    }

    /**
     * Calls isCompatible with each resource already contained in this product.
     * If any already contained resource is not compatible FALSE is returned.
     *
     * @param Resource $resource the resource to check for compatibility with all contained resources.
     * @return bool TRUE if the Resource specified in the param is compatible with all contained resources.
     */
    private function checkIfCompatibleWithContained(Resource $resource)
    {
        // start with a default which makes the loop short
        $isCompatible = true;
        // get the iterator from my contained resources
        $iter = $this->resources->getIterator();
        // do the shuffle ...
        foreach ($iter as $withExistingResource) {
            if (!$resource->isCompatible($withExistingResource)) {
                // if any one resource IS NOT compatible - switch to FALSE
                $isCompatible = false;
            } // if every contained resource IS compatible - leave default TRUE untouched
        }
        // ... end of calculation
        return $isCompatible;
    }
}
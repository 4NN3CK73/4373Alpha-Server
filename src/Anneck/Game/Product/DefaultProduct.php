<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 12.02.15
 * Time: 18:06
 */
namespace Anneck\Game\Product;

use Anneck\Game\License,
    Anneck\Game\Product,
    Anneck\Game\Resource;

use Anneck\Game\ProductFactory;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class DefaultProduct
 * @package Anneck\Game\Product
 */
class DefaultProduct implements Product {


    /**
     * @var ArrayCollection
     */
    private $resources;

    /**
     * @return ArrayCollection
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @return mixed
     */
    public function getLicence()
    {
        return $this->licence;
    }

    private $licence;

    public function __construct()
    {
        $this->resources = new ArrayCollection();
    }

    /**
     * @todo: what should we return, I vote for true|false ...
     * @param Resource $resource
     * @return mixed|void
     */
    public function addResource(Resource $resource)
    {
        // Lets check first ...
        $isCompatible =
            $this->checkIfCompatibleWithContained($resource);

        if($isCompatible) {
            $this->resources->add($resource);
        } // no else required, we do nothing if its not compatible
    }

    /**
     * @param License $license
     */
    public function addLicence(License $license)
    {
        // TODO: Implement addLicence() method.
    }

    /**
     * @param ProductFactory $productFactory
     * @return Product
     */
    public function build(ProductFactory $productFactory)
    {
        return $this;
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
        $containedResource = $this->resources->getIterator();
        // do the shuffle ...
        foreach ($containedResource as $withExistingResource) {
            if (!$resource->isCompatible($withExistingResource)) {
                // if any one resource IS NOT compatible - switch to FALSE
                $isCompatible = false;
            } // if every contained resource IS compatible - leave default TRUE untouched
        }
        // ... end of calculation
        return $isCompatible;
    }
}
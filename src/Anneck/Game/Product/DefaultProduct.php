<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */
namespace Anneck\Game\Product;

use Anneck\Game\License;
use Anneck\Game\Product;
use Anneck\Game\ProductFactory;
use Anneck\Game\Resource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class DefaultProduct
 * @package Anneck\Game\Product
 */
class DefaultProduct implements Product
{


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

        if ($isCompatible) {
            $this->resources->add($resource);
        } // no else required, we do nothing if its not compatible
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
}
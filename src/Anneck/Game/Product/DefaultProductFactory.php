<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game\Product;

use Anneck\Game\Continent;
use Anneck\Game\Exception\GameException;
use Anneck\Game\License;
use Anneck\Game\Product;
use Anneck\Game\ProductFactory;
use Anneck\Game\Resource;
use Anneck\Game\World;
use Doctrine\Common\Collections\Collection;

/**
 * The class DefaultProductFactory is a default implementation for testing purposes.
 *
 * It uses a factory pattern to create Product instances.
 * It depends on a valid World configuration found in World objects to create world products from world specific
 * resources.
 * The resources found in $myResources will be validated against the resources allowed in the world configuration,
 * if the resources are valid and compatible, a product is created.
 *
 * * $myProduct = $defaultProductFactory->getInstance($myWorld)->createProduct($myResources)
 * *
 *
 * @package Anneck\Game\Product
 */
class DefaultProductFactory implements ProductFactory
{

    /**
     * @var DefaultProductFactory instance of self
     */
    protected static $singleton;

    /**
     * @var World used during product creation.
     */
    private $world;

    /**
     * WARNING! Don't create this class using this constructor, its a singleton!
     * Use getInstance();
     */
    protected function __construct()
    {

    }

    /**
     * Create a product factory using the configuration of a (Game)World.
     *
     * @param World $world the world to use for the factory
     * @return ProductFactory|void the product factory
     * @throws GameException if the creation of the factory fails
     */
    public static function getInstance(World $world)
    {
        if (count($world->getContinents()) < 1) {
            throw new GameException(sprintf('Can not create the factory instance without Continents in the World!'
                    . 'Required > 1 found %d', count($world->getContinents()))
                , '0001');
        }

        /* @todo: put them into an array so we have a singleton for each world
        if (null === self::$singleton) {
            self::$singleton = self::create($world);
        }
         */

        return self::create($world);
    }

    /**
     * Internal static construction helper method used in getInstance.
     * @param $world world this factory works with.
     * @return DefaultProductFactory
     */
    private static function create($world)
    {
        $newInstance = new DefaultProductFactory();
        $newInstance->setWorld($world);

        return $newInstance;
    }

    /**
     * ATTENTION PRIVATE ON PURPOSE!
     * Cause it shall only be used internally during construction of self.
     * @SuppressWarnings(PHPMD)
     *
*@param mixed $world
     */
    private function setWorld(World $world)
    {
        $this->world = $world;
    }

    /**
     * Takes a collection of resources and creates a product from them.
     *
     * @param Collection $collectionOfResources
     * @return Product $createdProduct
     * @throws GameException If the resource is not available in this world configuration.
     */
    public function createProduct(Collection $collectionOfResources)
    {
        $newProduct = new DefaultProduct();
        $usingWorld = $this->getWorld();
        $incomingResource = $collectionOfResources->getIterator();

        foreach ($incomingResource as $resource) {

            if ($this->checkIfResourceIsAvailable($resource)) {
                $newProduct->addResource($resource);
            } else {
                throw new GameException(
                    sprintf(
                        'The resource %s is not available in this %s configuration.',
                        $resource,
                        $usingWorld
                    ), '0002'
                );
            }

        }

        $newProduct->setWorld($usingWorld);

        $newProduct->build($this);

        return $newProduct;
    }

    /**
     * The world used for the creation of products.
     *
     * @return World the world in use by this factory.
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * Searches all continents from the world configuration for the resource (type).
     *
     * @param Resource $resource The resource to check for availability.
     *
     * @return bool true if the resource is found, otherwise false.
     * @throws GameException If the world configuration does not provide a list of resources.
     */
    private function checkIfResourceIsAvailable(Resource $resource)
    {
        $resourceName = $resource->getResourceName();
        $allContinents = $this->getWorld()->getContinents()->getIterator();
        $resourceFound = false;

        foreach ($allContinents as $continent) {
            /** @var Continent $continent */
            $availableResources = $continent->getListOfResources();

            if (null === $availableResources) {
                throw new GameException(sprintf('Failed to get list of resources from %s', $continent), '0000');
            } else {
                if ($availableResources->contains($resourceName)) {
                    $resourceFound = true;
                }
            }

        }

        return $resourceFound;
    }

    /**
     * Uses a product and a licence to create a licenced product.
     *
     * @param License $license
     * @param Product $product
     *
     * @return Product $product
     */
    public function createLicensedProduct(License $license, Product $product)
    {
        // TODO: Implement createLicensedProduct() method.
    }
}
<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game\Product;

use Anneck\Game\Exception\GameException,
    Anneck\Game\License,
    Anneck\Game\Product,
    Anneck\Game\ProductFactory;

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
 * @use
 *      $myProduct = $defaultProductFactory->getInstance($myWorld)->createProduct($myResources)
 *
 * @package Anneck\Game\Product
 */
class DefaultProductFactory implements ProductFactory {

    protected static $singleton;
    private $world;

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
        if ($world->getContinents() < 1) {
            throw new GameException(sprintf('Can not create the factory instance without Continents in the World!'
                    . 'Required > 1 found %d', count($world->getContinents()))
                , '0001');
        }

        if (null === self::$singleton) {
            self::$singleton = self::create($world);
        }

        return self::$singleton;
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
     * @param mixed $world
     */
    private function setWorld($world)
    {
        $this->world = $world;
    }

    /**
     * @return mixed
     */
    public function getWorld()
    {
        return $this->world;
    }

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
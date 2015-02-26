<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 19.02.15, 12:22 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Exception\GameException;
use Anneck\Game\Worlds\GameWorld;
use Doctrine\Common\Collections\Collection;

/**
 * The GameProductFactory creates GameProduct's for GameWorld's.
 */
class GameProductFactory implements ProductFactory
{
    /**
     * Creates the ProductFactory using the specified world.
     *
     *
     * @param World $world The world to use for product creation.
     *
     * @return GameProductFactory The GameProductFactory specific to this world.
     *
     * @throws GameException If the instance creation fails.
     */
    public static function getInstance(World $world)
    {
        // Instance check ...
        if (!$world instanceof GameWorld) {
            throw new GameException('Failed to create instance! Not a GameWorld!', 0000);
        }

        // has it a name ...
        if (is_null($world->getName())) {
            throw new GameException(
                sprintf(
                    'The GameWorld: %s does not have a name!',
                    $world
                ),
                0000
            );
        }
        // at least 1 continent please ...
        if (count($world->getContinents()) < 1) {
            throw new GameException(
                sprintf(
                    'The GameWorld: %s did not contain 1 continent!',
                    $world
                ),
                0000
            );
        }

        // all good, continue to create using helper an return result
        return self::create($world);
    }

    /**
     * Internal static construction helper method used in getInstance.
     *
     * @param $world world this factory works with.
     *
     * @return GameProductFactory
     */
    private static function create($world)
    {
        $newInstance = new self();
        $newInstance->setWorld($world);

        return $newInstance;
    }

    /**
     * ATTENTION PRIVATE ON PURPOSE!
     * Cause it shall only be used internally during construction of self.
     *
     * @SuppressWarnings(PHPMD)
     *
     * @param mixed $world
     */
    private function setWorld(World $world)
    {
        $this->world = $world;
    }

    /**
     * Takes a collection of resources and creates a product from them.
     *
     * @param Collection $collectionOfResources
     *
     * @return Product $createdProduct
     */
    public function createProduct(Collection $collectionOfResources)
    {
        // TODO: Implement createProduct() method.
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

    /**
     * Returns the @World used to create product's.
     *
     * @return World the world used in this ProductFactory.
     */
    public function getWorld()
    {
        // TODO: Implement getWorld() method.
    }
}

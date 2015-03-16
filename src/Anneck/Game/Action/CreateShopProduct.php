<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:41 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\Features\ItemRegisterFeature;
use Anneck\Game\Features\SingleScoreFeature;
use Anneck\Game\GameInterface;
use Anneck\Game\Item\ItemFactory;

/**
 * The CreateShopProduct Action registers a new Item: ShopProduct in the game register.
 *
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class CreateShopProduct extends AbstractAction
{
    private $shopProductID;

    /**
     * Creates the action using the specified.
     *
     * @param string $productIdentifier specifies the product to create
     */
    public function __construct($productIdentifier)
    {
        $this->shopProductID = $productIdentifier;
    }

    /**
     * Add's the specified ShopProduct to the register of the running game.
     *
     * @param GameInterface $game
     *
     * @return mixed|void
     */
    public function applyOn(GameInterface $game)
    {
        $itemFactory = new ItemFactory($game);

        $newProduct = $itemFactory->createItem($this->shopProductID);

        if ($game instanceof ItemRegisterFeature) {
            // Adding the product to the register
            $game->addItemToRegister(
                $newProduct
            );
        }
        if ($game instanceof SingleScoreFeature) {
            $game->addScore(1);
        }
    }
}

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

use Anneck\Game\GameInterface;
use Anneck\Game\Item\ShopProduct;

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
    /**
     * Applies this action onto the game.
     *
     * @param GameInterface $game
     *
     * @return mixed|void
     */
    public function applyOn(GameInterface $game)
    {
        $newItem = new ShopProduct($game);
        $game->addItemToRegister($newItem);
        $game->addScore(1);
    }
}

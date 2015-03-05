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

use Anneck\Common\ToString;
use Anneck\Game\GameInterface;
use Anneck\Game\Item\ShopProduct;
use Anneck\Game\RegisterInterface;
use Anneck\Game\World\WorldInterface;

class CreateShopProduct extends AbstractItemAction {

    public function applyOn(GameInterface $game)
    {

        $newItem = new ShopProduct($game);
        $game->addItemToRegister($newItem);
        $game->addScore(1);
    }

}
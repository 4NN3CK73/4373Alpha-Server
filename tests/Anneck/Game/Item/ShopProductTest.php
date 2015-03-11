<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 06.03.15, 08:31 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\Action\CreateShopProduct;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\TestGame;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The ShopTest
 *
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ShopProductTest extends \PHPUnit_Framework_TestCase {

    public function testSpecification()
    {
        $game = new TestGame();
        $shopItem = new ShopProduct($game);
        $actionCollection = $shopItem->getAvailableActions();
        if($actionCollection->count() < 1) {
            self::fail('ShopProduct has no actions!');
        }
        $shopItem->getName();
    }
    public function testShopProductApplyAction()
    {
        $game = new TestGame();
        $shopItem = new ShopProduct($game);
        $shopItem->applyAction(new ScoreOnePoint());
    }
}

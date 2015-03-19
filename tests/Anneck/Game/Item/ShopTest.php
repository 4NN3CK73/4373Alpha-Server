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

use Anneck\Game\Action\CreateItem;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\TestGame;

/**
 * The ShopTest.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ShopTest extends \PHPUnit_Framework_TestCase
{
    public function testSpecification()
    {
        $game = new TestGame();
        $shopItem = new Shop($game);
        $actionCollection = $shopItem->getAvailableActions();
        if ($actionCollection->count() < 1) {
            self::fail('Shop has no actions!');
        }
        $shopItem->getName();
    }

    public function testShopApplyAction()
    {
        $game = new TestGame();
        static::assertNotNull($game);
        $shopItem = new Shop('Gittis lädchen', $game);
        static::assertNotNull($shopItem);
        $action = new ScoreOnePoint();
        static::assertNotNull($action);
        $shopItem->applyAction($action);
    }

    public function testShopApplyWrongAction()
    {
        $game = new TestGame();
        $shopItem = new ShopProduct('Bananas', $game);
        $shopItem->applyAction(new CreateItem('ShopProduct'));
    }
}

<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 14:26 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game;


use Anneck\Game\Configuration\WorldConfiguration;
use Anneck\Game\Item\Shop;
use Anneck\Game\Item\ShopProduct;
use Anneck\Game\World\DefaultWorld;

class TestGameTest extends \PHPUnit_Framework_TestCase {

    public function testGameSpecification()
    {
        $game = new TestGame();

        $worldConfiguration = new WorldConfiguration();
        $world = new DefaultWorld();
        $world->configure($worldConfiguration);

        $register = new Register();

        $game->setWorld($world);
        $game->setRegister($register);


        self::assertEquals($game->getScore(), 0);
        $game->addScore(1);
        self::assertEquals($game->getScore(), 1);

        $gameItem = new Shop($game);

        $game->addItemToRegister($gameItem);

        self::assertTrue($register->hasItem($gameItem));

        $game->removeItem($gameItem);

        self::assertFalse($register->hasItem($gameItem));

        $game->nextTurn();

        self::assertEquals(1, $game->getTurn());
        $shopProductCreatedByTurn = new ShopProduct($game);
        self::assertTrue($register->hasItem($shopProductCreatedByTurn));

        $game->safe();

    }

}

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
use Anneck\Game\Item\ItemFactory;
use Anneck\Game\Register\Register;
use Anneck\Game\World\DefaultWorld;

/**
 * The TestGameTest the first, just to see where we are going ..
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameTest extends \PHPUnit_Framework_TestCase
{
    public function testGameSpecification()
    {
        $game = new TestGame();
        self::assertEquals($game->__toString(), 'Anneck\Game\TestGame');

        $worldConfiguration = new WorldConfiguration();
        $world = new DefaultWorld();
        $world->configure($worldConfiguration);

        $register = new Register();

        $game->setWorld($world);
        $game->setRegister($register);

        self::assertEquals($game->getScore(), 0);
        $game->addScore(1);
        self::assertEquals($game->getScore(), 1);

        $gameItem = ItemFactory::createGameItem('Shop', 'Flash Shop', $game);

        $game->addItemToRegister($gameItem);

        self::assertTrue($register->hasItem($gameItem));

        $game->removeItem($gameItem);

        self::assertFalse($register->hasItem($gameItem));

        $game->nextTurn();

        self::assertEquals(1, $game->getTurn());
        // @todo: enable actions to manipulate ... but not here! :) in the game engine where the action queue is used.
//        $shopProductCreatedByTurn = new ShopProduct($game);
//        self::assertTrue($register->hasItem($shopProductCreatedByTurn));

        $game->safe();
    }

    public function testItemMetaDataSimple()
    {
        $game = new TestGame();
        $worldConfiguration = new WorldConfiguration();
        $world = new DefaultWorld();
        $world->configure($worldConfiguration);

        $register = new Register();

        $game->setWorld($world);
        $game->setRegister($register);

        $gameItem = ItemFactory::createGameItem('Shop', 'John\'s Shop', $game);
        $game->addItemToRegister($gameItem);

        $gameItemData = $game->getItemData($gameItem)->toArray();
        $testDataArray = [
            'Name' => 'John\'s Shop',
            'Actions' => '[CreateItem]:ShopProduct(-default-)',
            'Uses' => 0,
        ];
        static::assertEquals($testDataArray, $gameItemData);
    }
}

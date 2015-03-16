<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 13.03.15, 10:58 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\TestGame;

/**
 * The ItemFactoryTest ... nothing fancy ...
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ItemFactoryTest extends \PHPUnit_Framework_TestCase
{
  public function testItemFactorySpecification()
  {
      $game = new TestGame();
      $refClass = new \ReflectionClass(new ItemFactory($game));
      $refClass->newInstance($game);

      $refClass->hasMethod('createItem');
      $refClass->hasMethod('createGameItem');
  }

    public function testItemFactoryDefaults()
    {
        $game = new TestGame();
        $itemFactory = new ItemFactory($game);
        $gameItemShop = $itemFactory->createItem('Shop');
        $gameItemShopProduct = $itemFactory->createItem('ShopProduct');
        $gameItemStatic = ItemFactory::createGameItem($game, 'Shop');

        self::assertNotNull($gameItemStatic);
        self::assertNotNull($gameItemShop);
        self::assertNotNull($gameItemShopProduct);
    }
}

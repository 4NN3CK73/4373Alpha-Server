<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 13.03.15, 10:44 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\Exception\GameException;
use Anneck\Game\GameInterface;
use Anneck\Game\ItemInterface;

/**
 * The ItemFactory creates game items.
 *
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ItemFactory
{
    /**
     * Static factory method to create items for a game.
     *
     * @param string        $itemIdentifier
     *
     * @param string        $itemName
     *
     * @param GameInterface $game
     *
     * @return ItemInterface
     * @throws GameException
     */
  public static function createGameItem($itemIdentifier, $itemName = '', GameInterface $game)
  {
      if(is_null($game)) {
          throw new GameException('Failed to create item without game!');
      }
      $factory = new self();

      return $factory->createItem($itemIdentifier, $itemName, $game);
  }

    /**
     * Creates a new item for the game and returns it.
     *
     * @param               $itemIdentifier string short class name of the item
     * @param string        $itemName
     * @param GameInterface $game
     *
     * @return ItemInterface the created item.
     * @throws GameException
     */
  public function createItem($itemIdentifier, $itemName = '', GameInterface $game = null)
  {
      if (is_null($game)) {
          throw new GameException('Failed to create item without game!');
      }
      $itemClassName = 'Anneck\Game\Item\\'.$itemIdentifier;
      $item = new $itemClassName($itemName, $game);

      return $item;
  }
}

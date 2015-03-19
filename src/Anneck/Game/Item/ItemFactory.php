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
   * @return ItemInterface
   */
  public static function createGameItem($itemIdentifier, $itemName = '', GameInterface $game = null)
  {
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
   */
  public function createItem($itemIdentifier, $itemName = '', GameInterface $game = null)
  {
      $itemClassName = 'Anneck\Game\Item\\'.$itemIdentifier;

      if (!is_null($game)) {
          $item = new $itemClassName($itemName, $game);
      } else {
          $item = new $itemClassName($itemName);
      }

      return $item;
  }
}

<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:23 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Item\ItemInterface;
use Anneck\Game\World\WorldInterface;

interface GameInterface
{
    /**
     * @param WorldInterface $world
     */
    public function setWorld(WorldInterface $world);
    /**
     * @return WorldInterface
     */
    public function getWorld();
    public function setRegister(RegisterInterface $register);
    public function getScore();
    public function addScore($points);
    public function addItemToRegister(ItemInterface $gameItem);
    public function updateItem(ItemInterface $gameItem);
    public function removeItem(ItemInterface $gameItem);
    public function safe();
    public function nextTurn();
    public function getTurn();
}

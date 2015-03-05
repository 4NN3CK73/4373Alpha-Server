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

use Anneck\Game\ItemInterface;
use Anneck\Game\World\WorldInterface;

/**
 * The interface GameInterface
 *
 * @package Anneck\Game
 * @todo    Write PHPDoc for this interface!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
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

    /**
     * @param RegisterInterface $register
     *
     * @return mixed
     */
    public function setRegister(RegisterInterface $register);

    /**
     * @return mixed
     */
    public function getScore();

    /**
     * @param $points
     *
     * @return mixed
     */
    public function addScore($points);

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed
     */
    public function addItemToRegister(ItemInterface $gameItem);

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed
     */
    public function updateItem(ItemInterface $gameItem);

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed
     */
    public function removeItem(ItemInterface $gameItem);

    /**
     * @return mixed
     */
    public function safe();

    /**
     * @return mixed
     */
    public function nextTurn();

    /**
     * @return mixed
     */
    public function getTurn();
}

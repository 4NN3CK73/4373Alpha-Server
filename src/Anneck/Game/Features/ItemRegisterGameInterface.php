<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 10.03.15, 07:55 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\ItemInterface;
use Anneck\Game\RegisterInterface;

/**
 * The interface ItemRegisterGameInterface adds a register to the game which can store, update and remove game items.
 *
 * @package Anneck\Game\Features
 * @todo    Write PHPDoc for this interface!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ItemRegisterGameInterface {
    /**
     * @param RegisterInterface $register
     *
     * @return mixed
     */
    public function setRegister(RegisterInterface $register);

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
}
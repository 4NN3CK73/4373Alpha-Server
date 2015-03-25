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

use Anneck\Game\ActionInterface;
use Anneck\Game\ItemInterface;
use Anneck\Game\RegisterInterface;
use DateTime;
use Doctrine\Common\Collections\Collection;

/**
 * The interface ItemRegisterGameInterface adds a register to the game which can store, update and remove game items.
 *
 * @todo    Write PHPDoc for this interface!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ItemRegisterFeature
{
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
     * @param ActionInterface $action
     * @param DateTime        $param
     *
     * @return mixed
     */
    public function registerActionUsage(ActionInterface $action, DateTime $param);

    /**
     * @param ItemInterface $gameItem
     * @param array         $itemData
     *
     * @return mixed
     */
    public function updateItem(ItemInterface $gameItem, array $itemData);

    /**
     * @param ItemInterface $gameItem
     *
     * @return Collection
     */
    public function getItemData(ItemInterface $gameItem);

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed
     */
    public function removeItem(ItemInterface $gameItem);

    /**
     * @param ItemInterface $gameItem
     *
     * @return bool
     */
    public function hasItem(ItemInterface $gameItem);

    /**
     * @param ItemInterface $gameItem
     *
     * @return ItemInterface
     */
    public function getItem(ItemInterface $gameItem);

    /**
     * Returns a collection of all items in the register.
     *
     * @return Collection a collection of all items.
     */
    public function getItems();
}

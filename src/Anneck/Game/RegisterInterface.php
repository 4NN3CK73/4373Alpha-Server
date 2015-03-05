<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 14:07 by 4nn3ck
 * ************************************************************************
 */
namespace Anneck\Game;

use Anneck\Game\Item\ItemInterface;
use Doctrine\Common\Collections\Collection;

/**
 * The RegisterInterface works with the GameInterface to enable the registration and manipulation of items.
 *
 * @package Anneck\Game
 *
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface RegisterInterface
{
    /**
     * The internal register data collection.
     *
     * @return Collection the register data
     */
    public function getRegistryData();

    /**
     * Registers an item.
     *
     * @param ItemInterface $item to register.
     *
     * @return boolean true if registration was successful, else false.
     */
    public function registerItem(ItemInterface $item);
    /**
     * Update an item.
     *
     * @todo: Is that a real use case?
     * @param ItemInterface $item to update.
     *
     * @return boolean true if update was successful, else false.
     */
    public function updateItem(ItemInterface $item);
    /**
     * Remove an item from the register.
     *
     * @param ItemInterface $item to remove from the register.
     *
     * @return boolean true if removal was successful, else false.
     */
    public function removeItem(ItemInterface $item);
    /**
     * Searches the register for an item.
     *
     * @param ItemInterface $item to search for.
     *
     * @return boolean true if the item was found within the register, else false.
     */
    public function hasItem(ItemInterface $item);

    /**
     * The string representation of the register.
     *
     * @return string the string representation of register.
     */
    public function __toString();
}
<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 13:12 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\ItemInterface;
use Doctrine\Common\Collections\Collection;

/**
 * The ItemRegisterFeatureTrait
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
trait ItemRegisterFeatureTrait
{

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed|void
     */
    public function addItemToRegister(ItemInterface $gameItem)
    {
        $this->logger->addInfo('addItemToRegister: '.$gameItem);
        $this->register->registerItem($gameItem);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed|void
     */
    public function updateItem(ItemInterface $gameItem, array $itemData)
    {
        $this->logger->addInfo('updateItem: '.$gameItem);
        $this->register->updateItem($gameItem, $itemData);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return Collection
     */
    public function getItemData(ItemInterface $gameItem)
    {
        return $this->register->getItemData($gameItem);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed|void
     */
    public function removeItem(ItemInterface $gameItem)
    {
        $this->logger->addInfo('removeItem:'.$gameItem);
        $this->register->removeItem($gameItem);
    }

    /**
     * Returns a collection of all items in the register.
     *
     * @return Collection a collection of all items.
     */
    public function getItems()
    {
        return $this->filterBy('ItemInterface');
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return bool
     */
    public function hasItem(ItemInterface $gameItem)
    {
        return $this->register->hasItem($gameItem);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return ItemInterface
     */
    public function getItem(ItemInterface $gameItem)
    {
        return $this->register->getRegistryData()->get($gameItem->getName());
    }
}
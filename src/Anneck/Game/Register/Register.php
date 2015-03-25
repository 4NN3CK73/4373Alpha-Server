<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 13:00 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Register;

use Anneck\Game;
use Anneck\Game\ActionInterface;
use Anneck\Game\Exception\GameException;
use Anneck\Game\GameLogger;
use Anneck\Game\ItemInterface;
use Anneck\Game\RegisterInterface;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * The Register administrates game items.
 *
 * @todo    Write PHPDoc for this class and all methods!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class Register implements RegisterInterface
{
    /**
     * @var ArrayCollection
     */
    private $registryData;

    /**
     * @var GameLogger
     */
    private $logger;

    /**
     * Creates a new register.
     */
    public function __construct()
    {
        $this->registryData = new ArrayCollection();
        $this->logger = new GameLogger();
    }

    /**
     * Return the internal data of all items.
     *
     * @return ArrayCollection the register data collection.
     */
    public function getRegistryData()
    {
        return $this->registryData;
    }

    /**
     * Updates the item's meta data. If meta data key's are the same, the new values
     * overwrite existing, hence update. If no meta data key exists it is created.
     *
     * @param ItemInterface $item
     * @param array         $itemData
     *
     * @return bool|void
     *
     * @throws GameException
     */
    public function updateItem(ItemInterface $item, array $itemData)
    {
        if (!$this->hasItem($item)) {
            throw new GameException('Item not registered!');
        }
        GameLogger::addToGameLog(
          sprintf('Update item %s with data %s', $item, json_encode($itemData))
        );
        $currentData = $this->registryData->get($item->getName().'_DATA');
        $mergedData = array_merge($currentData, $itemData);
        $this->registryData->set($item->getName().'_DATA', $mergedData);

        return true;
    }

    /**
     * @param ItemInterface $item
     *
     * @return bool
     */
    public function hasItem(ItemInterface $item)
    {
        return $this->registryData->containsKey($item->getName());
    }

    /**
     * @param ItemInterface $item
     *
     * @return Collection
     */
    public function getItemData(ItemInterface $item)
    {
        if (!$this->hasItem($item)) {
            return new ArrayCollection([]);
        }
        $dataArray = $this->registryData->get($item->getName().'_DATA');
        $itemDataCol = new ArrayCollection($dataArray);

        return $itemDataCol;
    }

    /**
     * @param ItemInterface $item
     *
     * @return bool|void
     */
    public function removeItem(ItemInterface $item)
    {
        $this->logger->addInfo(
            sprintf('Remove %s from %s', $item, $this)
        );
        $this->registryData->remove($item->getName());
        $this->registryData->remove($item->getName().'_DATA');
    }

    /**
     * Register the item.
     *
     * @param ItemInterface $item
     *
     * @return ItemInterface the item registered.
     */
    public function registerItem(ItemInterface $item)
    {
        $this->logger->addInfo(
            sprintf('registerItem: %s ...', $item)
        );

        $this->registryData->set($item->getName(), $item);

        $itemData = [
            'Name' => $item->getName(),
            'Actions' => implode(', ', $item->getAvailableActions()->toArray()),
            'Uses' => 0,
        ];

        $itemDataKey = $item->getName().'_DATA';

        $this->registryData->set($itemDataKey, $itemData);

        return $this->registryData->get($item->getName());
    }

    /**
     * @param ActionInterface $action
     * @param DateTime        $dateTime
     *
     * @return bool
     */
    public function registerActionUsage(ActionInterface $action, DateTime $dateTime)
    {
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $refClass = new \ReflectionClass($this);

        return $refClass->getShortName();
    }
}

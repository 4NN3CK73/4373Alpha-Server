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
     * Returns true if the action is registered.
     *
     * @param ActionInterface $action search for this.
     *
     * @return bool true if the action is registered.
     */
    public function hasAction(ActionInterface $action) {
        return $this->registryData->containsKey($action->hashcode());
    }

    /**
     * Returns true if the item is registered.
     *
     * @param ItemInterface $item search for this.
     *
     * @return bool true if the item is registered.
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
        // The action data structure to use if no action use is registered yet.
        $actionData = [
            'Action' => $action,
            'UseCounter' => 0,
            'LastUseTime' => $dateTime
        ];

        // used is used to log the info correctly ..
        $used = 0;
        // (1) find the action and register the use if not there ...
        if(!$this->hasAction($action)) {
            // (1.1) no action and therefor no use registered yet, so we do it ...
            $this->registryData->set($action->hashcode(), $actionData);
        }
        // (1.2) get actionData
        $actionDataToUpdate = $this->registryData->get($action->hashcode());
        // (1.3) Update it, plus one use and the current time
        $used = ++$actionDataToUpdate['UseCounter'];
        $actionDataToUpdate['LastUseTime'] = $dateTime;
        // (1.3) update registry data
        $this->registryData->set($action->hashcode(), $actionDataToUpdate);



        GameLogger::addToGameLog(
            sprintf('RegisterActionUsage: %s on %s, used %s times now.', $action, $dateTime->format(DateTime::ATOM), $used)
        );
        var_dump($this->registryData->toArray());
        var_dump(json_encode($this->registryData->toArray()));

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

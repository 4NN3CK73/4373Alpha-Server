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
use Anneck\Game\GameLogger;
use Anneck\Game\ItemInterface;
use Anneck\Game\Player\Player;
use Anneck\Game\RegisterInterface;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @param ItemInterface $item
     *
     * @return bool|void
     */
    public function updateItem(ItemInterface $item)
    {
        $this->removeItem($item);
        $this->registerItem($item);
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
    }

    /**
     * @param ItemInterface $item
     *
     * @return bool|void
     */
    public function registerItem(ItemInterface $item)
    {
        $this->logger->addInfo(
            sprintf('registerItem: %s ...', $item)
        );

        $this->registryData->set($item->getName(), $item);
    }

    /**
     * Registers an item and associates it to a player.
     *
     * @param ItemInterface $item
     * @param Player        $player
     *
     * @return bool true if registration was successful, else false.
     */
    public function registerPlayerItem(ItemInterface $item, Player $player)
    {
        $playerItems = $this->registryData->get($player->getName());
        if (is_null($playerItems)) {
            // nothing registered yet ...
            // add the first item to a new collection ..
            $playerItems = new ArrayCollection($item->getName(), $item);
            // add the player items to the registry using his playerName
            $this->registryData->set($player->getName(), $playerItems);
        } else {
            // we have playerItems, add the new one ..
            $playerItems->set($item->getName(), $item);
            // and re-set it in the registry ...
            $this->registryData->set($player->getName(), $playerItems);
        }
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
     * @return string
     */
    public function __toString()
    {
        $refClass = new \ReflectionClass($this);

        return $refClass->getShortName();
    }
}

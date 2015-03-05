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

namespace Anneck\Game;

use Anneck\Game\ItemInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Anneck\Game\RegisterInterface;

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
     * Creates a new register.
     */
    public function __construct()
    {
        $this->registryData = new ArrayCollection();
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
        $this->registryData->remove($item->getName());
    }

    /**
     * @param ItemInterface $item
     *
     * @return bool|void
     */
    public function registerItem(ItemInterface $item)
    {
        $this->registryData->set($item->getName(), $item);
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

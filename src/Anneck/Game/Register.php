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


use Anneck\Game\Item\ItemInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Register implements RegisterInterface
{

    /**
     * @var ArrayCollection
     */
    private $registryData;

    public function __construct()
    {
        $this->registryData = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getRegistryData()
    {
        return $this->registryData;
    }

    public function updateItem(ItemInterface $item)
    {
        $this->removeItem($item);
        $this->registerItem($item);
    }

    public function removeItem(ItemInterface $item)
    {
        $this->registryData->remove($item->getName());
    }

    public function registerItem(ItemInterface $item) {
        $this->registryData->set($item->getName(), $item);
    }

    public function hasItem(ItemInterface $item)
    {
        return $this->registryData->containsKey($item->getName());
    }

    public function __toString()
    {
        $refClass = new \ReflectionClass($this);
        return $refClass->getShortName();
    }
}
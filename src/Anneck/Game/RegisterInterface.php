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

use Doctrine\Common\Collections\ArrayCollection;
use Anneck\Game\Item\ItemInterface;
use Anneck\Game\World\WorldInterface;

interface RegisterInterface
{
    /**
     * @return ArrayCollection
     */
    public function getRegistryData();

    public function registerItem(ItemInterface $item);
    public function updateItem(ItemInterface $item);
    public function removeItem(ItemInterface $item);
    public function hasItem(ItemInterface $item);
}
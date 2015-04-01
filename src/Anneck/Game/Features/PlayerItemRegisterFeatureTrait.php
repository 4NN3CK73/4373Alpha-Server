<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 13:26 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\ItemInterface;
use Anneck\Game\Player\Player;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * The PlayerItemRegisterFeatureTrait.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
trait PlayerItemRegisterFeatureTrait
{
    /**
     * Returns a collection of items in the register for the specified player.
     *
     * @param Player $player the player to search for in the register.
     *
     * @return Collection a collection of items.
     */
    public function getPlayerItems(Player $player)
    {
        $returnItems = new ArrayCollection();

        // Get all items ...
        $allIter = $this->register->getRegistryData()->getIterator();

        /** @var ItemInterface $item */
        foreach ($allIter as $item) {
            if ($item instanceof ItemInterface) {
                // get Item data ...
                $iData = $this->register->getItemData($item);
                // Only add if player name matches ...
                if ($iData->get('Player') === $player->getName()) {
                    $returnItems->add($item);
                }
            }
        }

        return $returnItems;
    }
}

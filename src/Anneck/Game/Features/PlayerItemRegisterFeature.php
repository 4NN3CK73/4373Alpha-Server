<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 18.03.15, 09:52 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\Player\Player;
use Doctrine\Common\Collections\Collection;

/**
 * The PlayerItemRegisterFeature is a player aware item register.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface PlayerItemRegisterFeature extends ItemRegisterFeature
{
    /**
     * Returns a collection of items in the register for the specified player.
     *
     * @param Player $player the player to search for in the register.
     *
     * @return Collection a collection of items.
     */
    public function getPlayerItems(Player $player);
}

<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 11:20 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Player\Player;

/**
 * The NoFeaturesGame class is just there for the test cases to trigger exceptions.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class NoFeaturesGame implements GameInterface
{
    /**
     * @param WorldInterface $world
     */
    public function setWorld(WorldInterface $world)
    {
    }

    /**
     * @return WorldInterface
     */
    public function getWorld()
    {
    }

    /**
     * @return boolean
     */
    public function safe()
    {
    }

    /**
     * Set the game player.
     *
     * @param Player $player
     */
    public function setPlayer(Player $player)
    {
    }

    /**
     * Returns the player of the game.
     *
     * @return Player the current player of the game.
     */
    public function getPlayer()
    {
    }

    /**
     * Returns the string representation of this game.
     * @return string the string representation of this game.
     */
    public function __toString()
    {
        return __CLASS__;
    }
}

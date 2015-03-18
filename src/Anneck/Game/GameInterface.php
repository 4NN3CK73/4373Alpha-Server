<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:23 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Player\Player;

/**
 * The interface Game defines the basic functionality of every game and uses the configuration for game rules and other
 * game specific settings. The implementation.
 *
 * @todo    Write PHPDoc for this interface!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface GameInterface
{
    /**
     * @param WorldInterface $world
     */
    public function setWorld(WorldInterface $world);

    /**
     * @return WorldInterface
     */
    public function getWorld();

    /**
     * @return boolean
     */
    public function safe();

    /**
     * Set the game player.
     *
     * @param Player $player
     */
    public function setPlayer(Player $player);

    /**
     * Returns the player of the game.
     *
     * @return Player the current player of the game.
     */
    public function getPlayer();

    public function __toString();
}

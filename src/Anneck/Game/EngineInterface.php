<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 05.03.15, 15:12 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Action\ActionQueue;
use Anneck\Game\Player\Player;
use Doctrine\Common\Collections\Collection;

/**
 * The interface Engine drives the game forward by executing all Player Actions of the ActionQueue which change the game.
 *
 *
 *
 * @since   0.0.1-dev
 *
 * @todo    Enable start to safe games on each n-turn (int) start($safeTurnInterval = 3) // Safes on each 3rd turn
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface EngineInterface
{
    /**
     * The engine needs to be build with a game before it can be used.
     *
     * @param GameInterface $game
     *
     * @return boolean true|false
     */
    public function build(GameInterface $game);

    /**
     * After the engine has been build the player can retrieve her available actions.
     *
     * @param Player $player
     *
     * @return Collection a collection of actions available to the player.
     */
    public function getAvailablePlayerActions(Player $player);

    /**
     * @return Collection a collection of actions available.
     */
    public function getAvailableActions();

    /**
     * After the engine has been build it is fueled with player actions.
     *
     * @param ActionQueue $actionQueue
     *
     * @return mixed
     */
    public function fuelWith(ActionQueue $actionQueue);

    /**
     * Start the engine and process all actions from the player action queue and apply them onto the game.
     */
    public function start();
}

<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:56 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

/**
 * The interface ActionInterface changes the game through applying itself onto it!
 * Actions are queued in the ActionQueue and are processed during each game turn.
 *
 * @use     ActionQueue
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ActionInterface
{
    /**
     * Applies itself to a running game.
     *
     * @param GameInterface $game the game to change.
     *
     * @return mixed
     */
    public function applyOn(GameInterface $game);

    /**
     * Return the string representation of the Action.
     *
     * @return mixed the string representation of the Action.
     */
    public function __toString();

    /**
     * @return string hashcode
     */
    public function hashcode();

    /**
     * Compares for equality with another action.
     *
     * @param ActionInterface $otherAction the other action to compare for equality with this one.
     *
     * @return bool true if actions are equal, otherwise false.
     */
    public function equals(ActionInterface $otherAction);
}

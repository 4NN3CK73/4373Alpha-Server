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

/**
 * The interface Engine drives the game forward by executing all Actions of the ActionQueue.
 *
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface EngineInterface
{
    /**
     * The engine needs to be build before it can be run.
     *
     * @param GameInterface $game
     * @param ActionQueue   $actionQueue
     *
     * @return boolean true|false
     */
    public function build(GameInterface $game, ActionQueue $actionQueue);

    /**
     * Start the engine ...
     */
    public function start();
}

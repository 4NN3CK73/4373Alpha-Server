<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 05.03.15, 15:52 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Action\ActionQueue;
use Anneck\Game\Exception\GameException;

/**
 * The TestEngine.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestEngine implements EngineInterface
{
    /**
     * @var GameInterface
     */
    private $game;
    /**
     * @var ActionQueue
     */
    private $actionQ;
    /**
     * @var bool
     */
    private $readyToStart = false;

    /**
     * The engine needs to be build before it can be run.
     *
     * @param GameInterface $game
     * @param ActionQueue   $actionQueue
     *
     * @return boolean true|false
     */
    public function build(GameInterface $game, ActionQueue $actionQueue)
    {
        $this->game = $game;
        $this->actionQ = $actionQueue;
        $this->readyToStart = true;
    }

    /**
     * Start the engine ...
     */
    public function start()
    {
        if (!$this->readyToStart) {
            throw new GameException('The Engine has not been build, can not start!');
        }
        // Process all actions ...
        $actions = $this->actionQ->getIterator();

        /** @var ActionInterface $action */
        foreach ($actions as $action) {
            $action->applyOn($this->game);
        }

        // yeah ...
        $this->game->nextTurn();
    }
}

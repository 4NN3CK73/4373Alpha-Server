<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 10.03.15, 08:11 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\AlphaServerBundle\Services;

use Anneck\Game\Action\ActionQueue;
use Anneck\Game\ActionInterface;
use Anneck\Game\TestEngine;
use Anneck\Game\TestGame;

/**
 * The GameService is a manager for the unified use of a game and a game engine.
 *
 * @package Anneck\Game\AlphaServerBundle\Services
 * @todo    Write PHPDoc for this class!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameService {

    /**
     * @var ActionQueue
     */
    private $actionQ;

    /**
     *
     */
    public function __construct() {
        $this->actionQ = new ActionQueue();
    }

    /**
     * @param ActionInterface $action
     *
     * @return bool
     */
    public function addAction(ActionInterface $action) {

        return $this->actionQ->addAction($action);

    }
    public function run() {
        // Get all required classes to build the game engine ...
        $game = new TestGame();
        $gameEngine = new TestEngine();

        $gameEngine->build($game, $this->actionQ);
        return $gameEngine->start();
    }

}
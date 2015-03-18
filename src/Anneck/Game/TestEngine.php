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
use Anneck\Game\Features\ItemRegisterFeature;
use Anneck\Game\Features\SingleScoreFeature;
use Anneck\Game\Features\TurnBasedFeature;
use Anneck\Game\Player\Player;

/**
 * The TestEngine drives the game forward executing all action in the action queue.
 * The TestEngine has to be build before it can be started!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 * @use     ActionQueue, GameInterface
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

        $this->readyToStart = $this->validateGameFeatures();
    }

    /**
     * Validates if the provided game has the features implemented required by this engine.
     *
     * @todo    Think about if exceptions are the right choice here ...
     *
     * @return bool
     *
     * @throws GameException
     */
    private function validateGameFeatures()
    {
        // The TestEngine requires a Game with Turns, Scores and Items with a Register

        if (!$testTurns = $this->game instanceof TurnBasedFeature) {
            throw new GameException('Gamefeature missing: TurnBased!');
        }
        if (!$testScores = $this->game instanceof SingleScoreFeature) {
            throw new GameException('Gamefeature missing: SingleScore!');
        }
        if (!$testRegister = $this->game instanceof ItemRegisterFeature) {
            throw new GameException('Gamefeature missing: ItemRegister!');
        }

        if ($testRegister && $testScores && $testTurns) {
            return true;
        }

        return false;
    }

    /**
     * Start the engine ...
     */
    public function start()
    {
        // Check if engine can start ...
        if (!$this->readyToStart) {
            throw new GameException('The Engine has not been build, can not start!');
        }
        // Process the action queue ...
        $this->processActionQ();

        // Mark end of turn calling next turn ...
        if ($this->game instanceof TurnBasedFeature) {
            $this->game->nextTurn();
        }
        // Check score ...
        if($this->game instanceof SingleScoreFeature) {

            $score = $this->game->getScore();
            $player = $this->game->getPlayer();

            if($player != null ) { // this should only happen during development

                $scoreManager = new GameScoreManager();
                $scoreManager->addScore($player, $score);

            } else {
                GameLogger::addToGameLog(
                    sprintf('We have a score, but no player!'),
                    GameLogger::WARNING
                );
            }
        }

        return true;
    }

    /**
     * @todo: write phpdoc!
     */
    private function processActionQ()
    {
        // Process all actions ...
        $actions = $this->actionQ->getIterator();

        /** @var ActionInterface $action */
        foreach ($actions as $action) {
            $action->applyOn($this->game);
            GameLogger::addToGameLog(
                sprintf('Apply action %s on game %s', $action, $this->game),
                GameLogger::INFO
            );
        }
    }
}

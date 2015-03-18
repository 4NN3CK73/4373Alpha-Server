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
use Anneck\Game\Exception\GameFeatureMissingException;
use Anneck\Game\Features\ItemRegisterFeature;
use Anneck\Game\Features\PlayerItemRegisterFeature;
use Anneck\Game\Features\SingleScoreFeature;
use Anneck\Game\Features\TurnBasedFeature;
use Anneck\Game\Player\Player;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * The game used.
     *
     * @var GameInterface
     */
    private $game;
    /**
     * The action queue of the engine.
     *
     * @var ActionQueue
     */
    private $actionQ;
    /**
     * Used to indicate if build has succeeded.
     *
     * @var bool
     */
    private $isBuild = false;
    /**
     * Used to indicate if fuelWith has succeeded.
     *
     * @var bool
     */
    private $isFueld = false;

    /**
     * The engine needs to be build before it can be run.
     *
     * @param GameInterface $game
     *
     * @return boolean true|false
     */
    public function build(GameInterface $game)
    {
        $this->game = $game;

        $this->isBuild = $this->validateGameFeatures();
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
        if (!$testPlayerRegister = $this->game instanceof PlayerItemRegisterFeature) {
            throw new GameFeatureMissingException('Gamefeature missing: PlayerItemRegister!');
        }

        return true;
    }

    /**
     * After the engine has been build the player can retrieve her available actions.
     *
     * Every item associated to the player contains actions, these are collected and returned.
     *
     * @param Player $player
     *
     * @return Collection a collection of actions available to the player.
     *
     * @throws GameFeatureMissingException if the game does not provided the player item register feature.
     */
    public function getAvailablePlayerActions(Player $player)
    {
        if (!$this->game instanceof PlayerItemRegisterFeature) {
            throw new GameFeatureMissingException('PlayerItemRegister is missing from game: '.$this->game);
        }

        $playerItems = $this->game->getPlayerItems($player);

        $playerActions = new ArrayCollection();

        /** @var ItemInterface $pItem */
        foreach ($playerItems as $pItem) {
            $itemActions = $pItem->getAvailableActions();

            /** @var ActionInterface $iAction */
            foreach ($itemActions as $iAction) {
                $playerActions->add($iAction);
            }
        }

        return $playerActions;
    }

    /**
     * @return Collection a collection of actions available.
     * @throws GameFeatureMissingException
     */
    public function getAvailableActions()
    {
        if (!$this->game instanceof ItemRegisterFeature) {
            throw new GameFeatureMissingException('ItemRegister is missing from game: '.$this->game);
        }

        $allItems = $this->game->getItems();
        $allItemActions = new ArrayCollection();

        /** @var ItemInterface $item */
        foreach($allItems as $item) {
            $itemActions = $item->getAvailableActions();
            $allItemActions->add($itemActions);
        }

        return $allItemActions;

    }


    /**
     * After the engine has been build it is fueled with player actions.
     *
     * @param ActionQueue $actionQueue
     *
     * @return mixed
     */
    public function fuelWith(ActionQueue $actionQueue)
    {
        $this->actionQ = $actionQueue;
        $this->isFueld = true;
    }

    /**
     * Start the engine ...
     */
    public function start()
    {
        // Check if engine can start ...
        if (!$this->isBuild) {
            throw new GameException('The Engine has not been build, can not start!');
        }
        if (!$this->isFueld) {
            throw new GameException('The Engine has not been fueld with player actions, can not start!');
        }
        // Process the action queue ...
        $this->processActionQ();

        // Mark end of turn calling next turn ...
        if ($this->game instanceof TurnBasedFeature) {
            $this->game->nextTurn();
        }
        // Check score ...
        if ($this->game instanceof SingleScoreFeature) {
            $score = $this->game->getScore();
            $player = $this->game->getPlayer();

            if ($player != null) { // this should only happen during development

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
        if (is_null($this->actionQ)) {
            throw new GameException('Process ActionQ failed, ActionQ is NULL!!');
        }

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

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
use Anneck\Game\Features\ItemRegisterFeatureInterface;
use Anneck\Game\Features\PlayerItemRegisterFeature;
use Anneck\Game\Features\SingleScoreFeatureInterface;
use Anneck\Game\Features\TurnBasedFeatureInterface;
use Anneck\Game\Player\Player;
use DateTime;
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

        if (!$testTurns = $this->game instanceof TurnBasedFeatureInterface) {
            throw new GameFeatureMissingException('ValidateGameFeatures failed', 'TurnBased!', $this->game);
        }
        if (!$testScores = $this->game instanceof SingleScoreFeatureInterface) {
            throw new GameFeatureMissingException('ValidateGameFeatures failed', 'SingleScore', $this->game);
        }
        if (!$testRegister = $this->game instanceof ItemRegisterFeatureInterface) {
            throw new GameFeatureMissingException('ValidateGameFeatures failed', 'ItemRegister!', $this->game);
        }
        if (!$testPlayerRegister = $this->game instanceof PlayerItemRegisterFeature) {
            throw new GameFeatureMissingException('ValidateGameFeatures failed', 'PlayerItemRegister!', $this->game);
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
            throw new GameFeatureMissingException('Get available player actions.', 'PlayerItemRegister', $this->game);
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
     *
     * @throws GameFeatureMissingException
     */
    public function getAvailableActions()
    {
        if (!$this->game instanceof ItemRegisterFeatureInterface) {
            throw new GameFeatureMissingException('TestEngine could not use Register during getAvailableActions()', 'ItemRegisterFeature', $this->game);
        }

        $allItems = $this->game->getItems();
        $allItemActions = new ArrayCollection();

        /** @var ItemInterface $item */
        foreach ($allItems as $item) {
            GameLogger::addToGameLog('Item:'.$item);
            $itemActions = $item->getAvailableActions();
            foreach ($itemActions as $action) {
                $allItemActions->add($action);
                GameLogger::addToGameLog('ItemActions:'.$action);
            }
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
            throw new GameException('The Engine has not been fueld with actions, can not start!');
        }

        // Process the action queue ...
        $this->processActionQ();

        // Mark end of turn calling next turn ...
        if ($this->game instanceof TurnBasedFeatureInterface) {
            $this->game->nextTurn();
        }
        // Check score ...
        if ($this->game instanceof SingleScoreFeatureInterface) {
            $score = $this->game->getScore();
            $player = $this->game->getPlayer();

            if ($player !== null) { // this should only happen during development

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
     * Helper method to process the current actionQ and apply each action onto the game.
     */
    private function processActionQ()
    {
        if (is_null($this->actionQ)) {
            throw new GameException('Process ActionQ failed, ActionQ is NULL!!');
        }

        if (!$this->game instanceof ItemRegisterFeatureInterface) {
            throw new GameFeatureMissingException('processActionQ', 'ItemRegisterFeature', $this->game);
        }

        // Get all actions ...
        $actions = $this->actionQ->getIterator();

        // Process all actions ...
        /** @var ActionInterface $action */
        foreach ($actions as $action) {

            // check if usable ...
            if ($this->isActionUsable($action)) {
                GameLogger::addToGameLog(
                    sprintf('>>> [Apply] action %s on game %s', $action, $this->game),
                    GameLogger::INFO
                );

                $action->applyOn($this->game);

                // register action use ...
                if ($this->game instanceof ItemRegisterFeatureInterface) {
                    $this->game->registerActionUsage($action, new DateTime());
                }

                GameLogger::addToGameLog(
                    '<<< [Apply]',
                    GameLogger::INFO
                );
            } else {
                GameLogger::addToGameLog(
                    sprintf('--- [Skipped] action %s on game %s', $action, $this->game),
                    GameLogger::INFO
                );
            }
        }
    }

    /**
     * @param ActionInterface $action
     *
     * @return bool
     *
     * @throws GameFeatureMissingException
     */
    private function isActionUsable(ActionInterface $action)
    {
        if (!$this->game instanceof ItemRegisterFeatureInterface) {
            throw new GameFeatureMissingException('processActionQ', 'ItemRegisterFeature', $this->game);
        }

        // If the action use is not in the game yet, its usable.
        if (!$this->game->hasAction($action)) {
            return true;
        }

        // If we have an action ...

        /** @var ActionInterface $action */
        $action = $this->game->getAction($action);

        // FYI: Cool down is ignored for now

        // ... we need to check use/max use and first unlimited ...
        if ($action['MaxUse'] === '*') {
            return true;
        }

        if ($action['UseCounter'] < $action['MaxUse']) {
            return true;
        }

        GameLogger::addToGameLog(
            sprintf('Action %s is at maximum usage! (%s/%s)',
                $action['Action']->__toString(),
                $action['UseCounter'],
                $action['MaxUse']
            ),
            GameLogger::DEBUG
        );


        // OK no true condition, action is not usable!
        return false;
    }
}

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
use Anneck\Game\Configuration\WorldConfiguration;
use Anneck\Game\Features\SingleScoreFeature;
use Anneck\Game\Features\TurnBasedFeature;
use Anneck\Game\GameInterface;
use Anneck\Game\GameLogger;
use Anneck\Game\ItemInterface;
use Anneck\Game\TestEngine;
use Anneck\Game\TestGame;
use Anneck\Game\World\DefaultWorld;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Monolog\Logger;

/**
 * The GameService is a manager for the unified use of a game and a game engine.
 *
 * The GameService holds the state of its ActionQueue, the TestGame and a DefaultWorld.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameService
{
    /**
     * @var ActionQueue
     */
    private $actionQ;
    /**
     * Used to remember the game internally ...
     *
     * @var GameInterface
     */
    private $game;

    /**
     *
     */
    public function __construct()
    {
        $this->actionQ = new ActionQueue();
        $this->game = new TestGame();
        $world = new DefaultWorld();
        $worldConfig = new WorldConfiguration();
        $world->configure($worldConfig);
        $this->game->setWorld($world);
    }

    /**
     * Searches the game (register) for the specified game item and returns it.
     *
     * @param ItemInterface $item the item to look up.
     *
     * @return ItemInterface the item found or NULL.
     */
    public function getItem(ItemInterface $item)
    {
        return $item;
    }

    /**
     * @param ActionInterface $action
     *
     * @return bool
     */
    public function addAction(ActionInterface $action)
    {
        GameLogger::addToGameLog(
            sprintf('Add action %s to running game %s', $action, $this->game), Logger::ALERT);

        return $this->actionQ->addAction($action);
    }

    /**
     * @return bool
     *
     * @throws \Anneck\Game\Exception\GameException
     */
    public function run()
    {
        // Build the game engine ...
        $gameEngine = new TestEngine();
        $gameEngine->build($this->game, $this->actionQ);

        // start it ...
        return $gameEngine->start();
    }

    /**
     * Returns all changes applied to the game in JSON format.
     *
     * @return string the game result in JSON
     */
    public function getGameResult()
    {
        $gameResult = new ArrayCollection();

        $gameResult->set('Game-World:', (string) $this->game->getWorld());

        if ($this->game instanceof SingleScoreFeature) {
            $gameResult->set('Game-Score:', $this->game->getScore());
        }
        if ($this->game instanceof TurnBasedFeature) {
            $gameResult->set('Game-Turn:', $this->game->getTurn());
        }

        return json_encode($gameResult->toArray());
    }
}

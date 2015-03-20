<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 18.03.15, 08:25 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Action\ActionQueue;
use Anneck\Game\Item\ItemFactory;
use Anneck\Game\Player\Player;

/**
 * The TestGameRunCreation shows the desired usage of the game api.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameRunCreationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * This test simply takes all actions available in the game and executes them.
     */
    public function testPlayerActions()
    {
        // It always starts with a game engine ...
        $gameEngine = new TestEngine();
        // ... the engine is build ... using a TestGame ...
        $testGame = new TestGame();
        $testGame->addItemToRegister(ItemFactory::createGameItem('Shop', 'My Shop', $testGame));
        // We put a Player in
        $testPlayer = new Player('Flash Gordon');
        // ... tell the game about the player ...
        $testGame->setPlayer($testPlayer);

        // Now build the engine ...
        $gameEngine->build($testGame);
        // ... we need something to fuel it with next ...
        $playerActions = $gameEngine->getAvailableActions()->toArray();
        $playerActionQ = new ActionQueue($playerActions);
        // ... the player Actions get injected into the engine ..
        $gameEngine->fuelWith($playerActionQ);
        // and now we start the engine ... e.g. run the game!
        $gameEngine->start();
    }
}

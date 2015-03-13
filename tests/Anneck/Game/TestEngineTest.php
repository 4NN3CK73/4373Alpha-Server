<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 05.03.15, 16:14 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Action\ActionQueue;
use Anneck\Game\Action\CreateShopProduct;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\Exception\GameException;
use Anneck\Game\World\DefaultWorld;

/**
 * The TestEngineTest.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestEngineTest extends \PHPUnit_Framework_TestCase
{
    public function testEngineSpecificationsStartAfterBuild()
    {
        // Need World and Register for Game
        $world = new DefaultWorld();
        $register = new Register();
        // New TestGame using world and register
        $game = new TestGame();
        $game->setWorld($world);
        $game->setRegister($register);
        // Need game and action queue for engine
        $actionQ = new ActionQueue();
        $action1 = new ScoreOnePoint();
        $action2 = new CreateShopProduct('ShopProduct');
        $action3 = new ScoreOnePoint();
        $actionQ->add($action1);
        $actionQ->add($action2);
        $actionQ->add($action3);

        $engine = new TestEngine();
        // build engine ...
        $engine->build($game, $actionQ);
        // start engine ...
        try {
            $engine->start();
        } catch (GameException $gameException) {
            self::fail($gameException->getMessage());
        }
    }

    public function testEngineSpecificationsStartBeforeBuild()
    {
        $engine = new TestEngine();
        // should throw GameException ...
        try {
            $engine->start();
            self::fail('You should not be able to start the engine without building it first!');
        } catch (GameException $gameException) {
            // all good ..
        }
    }
}

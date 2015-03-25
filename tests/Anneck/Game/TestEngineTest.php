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
use Anneck\Game\Action\CreateItem;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\Exception\GameException;
use Anneck\Game\Item\Shop;
use Anneck\Game\Player\Player;
use Anneck\Game\Register\Register;
use Anneck\Game\World\DefaultWorld;
use Exception;

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
        $action2 = new CreateItem('ShopProduct');
        $action3 = new ScoreOnePoint();

        $actionQ->add($action1);
        $actionQ->add($action2);
        $actionQ->add($action3);
        // the engine will drive the game forward
        $engine = new TestEngine();
        // build engine ...
        $engine->build($game);
        $engine->fuelWith($actionQ);
        // start engine ...
        try {
            $engine->start();
        } catch (GameException $gameException) {
            self::fail($gameException->getMessage());
        }

    }
    public function testEnginePlayerActions()
    {
        // Need World and Register for Game
        $world = new DefaultWorld();
        $register = new Register();

        // New TestGame using world and register
        $game = new TestGame();
        $game->setWorld($world);
        $game->setRegister($register);

        // the engine will drive the game forward
        $engine = new TestEngine();

        // build engine ...
        $engine->build($game);

        $newItem = $register->registerItem(new Shop('Johnny\'s Shop', $game));

        $unregItem = new Shop('Wrong', $game);
        try {
            $register->updateItem($unregItem, ['Player' => 'Johnny Cash']);
            static::fail('This should trigger exception!');
        } catch (Exception $exception) {
            // all good ...
        }

        $register->updateItem($newItem, ['Player' => 'Johnny Cash']);

        $actionCol = $engine->getAvailablePlayerActions(new Player('Johnny Cash'));

        static::assertTrue($actionCol->count() === 1);

        try {
            $register->removeItem($unregItem);
            static::fail('This should trigger exception!');
        } catch (Exception $exception) {
            // all good ...
        }

        $register->removeItem($newItem);
    }

    public function testEngineProvideWrongGameFeatures()
    {
        // New TestGame using world and register
        $game = new NoFeaturesGame();
        // Need game and action queue for engine
        $actionQ = new ActionQueue();
        $action1 = new ScoreOnePoint();
        $actionQ->add($action1);
        // The engine will drive the game forward ...
        $engine = new TestEngine();
        // build engine ...


        // start engine ...
        try {
            $engine->build($game);
            self::fail('This should trigger an exception but didnt!');
        } catch (GameException $gameException) {
            // awesome!
        }
        // get actions ...
        try {
            $engine->getAvailableActions();
            self::fail('This should trigger an exception but didnt!');
        } catch (GameException $gameException) {
            // awesome!
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

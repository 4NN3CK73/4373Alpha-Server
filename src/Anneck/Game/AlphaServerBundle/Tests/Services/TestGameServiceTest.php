<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 10.03.15, 09:23 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Services;

use Anneck\Game\Action\CreateItem;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\AlphaServerBundle\Services\TestGameService;
use Anneck\Game\Item\ItemFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * The TestGameServiceTest.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameServiceTest extends KernelTestCase
{
    /**
     * @var TestGameService
     */
    private static $service;

    public static function setUpBeforeClass()
    {
        static::bootKernel();
        static::$service = static::$kernel->getContainer()->get('alphaserver.testgame');
    }

    public function testFirstGameServiceExists()
    {
        static::assertNotNull(static::$service);
    }

    public function testFirstGameServiceAdAction()
    {
        $result = static::$service->addAction(new ScoreOnePoint());
        static::assertTrue($result);
    }

    public function testFirstGameServiceRun()
    {
        $result = static::$service->run();
        static::assertTrue($result);
    }
    public function testFirstGameServiceRunWithAction()
    {
        static::$service->addAction(new ScoreOnePoint());
        static::assertTrue(static::$service->run());
    }
    public function testFirstGameServiceCreateProductAction()
    {
        $action = new CreateItem(
            'Shop'
        );
        static::$service->addAction(
            $action
        );
        static::assertTrue(static::$service->run());

        $item = static::$service->getItem(ItemFactory::createGameItem('Shop'));
        $actions = $item->getAvailableActions()->toArray();
        $action = $actions[0]; // @todo: this is just the test, but still think about the API

        static::$service->addAction(
            $action
        );

        static::assertTrue(static::$service->run());
    }
}

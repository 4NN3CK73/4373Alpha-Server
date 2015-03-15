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

use Anneck\Game\Action\CreateShopProduct;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\AlphaServerBundle\Services\TestGameService;
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
        self::bootKernel();
        self::$service = static::$kernel->getContainer()->get('alphaserver.testgame');
    }

    public function testFirstGameServiceExists()
    {
        self::assertNotNull(self::$service);
    }

    public function testFirstGameServiceAdAction()
    {
        $result = self::$service->addAction(new ScoreOnePoint());
        self::assertTrue($result);
    }

    public function testFirstGameServiceRun()
    {
        $result = self::$service->run();
        self::assertTrue($result);
    }
    public function testFirstGameServiceRunWithAction()
    {
        self::$service->addAction(new ScoreOnePoint());
        self::assertTrue(self::$service->run());
    }
    public function testFirstGameServiceCreateProductAction()
    {
        self::$service->addAction(
            new CreateShopProduct(
                'ShopProduct'
            )
        );
        self::assertTrue(self::$service->run());
    }
}

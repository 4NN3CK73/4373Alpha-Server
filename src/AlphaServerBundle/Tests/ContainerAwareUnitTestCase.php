<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 03.03.15, 15:03 by 4nn3ck  
 * ************************************************************************
 */
namespace AlphaServerBundle\Tests;
require_once( __DIR__ . '/../../../app/AppKernel.php');

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerAwareUnitTestCase extends KernelTestCase {

    /**
     * @var ContainerInterface
     */
    protected static $container;

    public static function setUpBeforeClass()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
    }

    public static function tearDownAfterClass()
    {
        static::$kernel->shutdown();
    }

    public static function getService($serviceName)
    {
        return self::$container->get($serviceName);
    }

}
<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 05.03.15, 08:54 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

/**
 * The VersionTest
 *
 * @package Anneck\Game
 * @todo    Write PHPDoc for this class!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class VersionTest extends \PHPUnit_Framework_TestCase
{
    public function testVersionSpecification()
    {
        $version = new Version();
        $refClass = new \ReflectionClass($version);

        self::assertTrue($refClass->hasMethod('compare'));
        self::assertEquals('0.0.1', $version::VERSION);

        $versionString = $version."";
        self::assertTrue(is_string($versionString));
    }

    public function testVersionCompare()
    {
        $version = new Version();

        self::assertEquals(-1, $version->compare('0.0.0'));
        self::assertEquals(0, $version->compare('0.0.1'));
        self::assertEquals(1, $version->compare('0.0.2'));
        self::assertEquals(1, $version->compare('1.0.2'));
    }
}

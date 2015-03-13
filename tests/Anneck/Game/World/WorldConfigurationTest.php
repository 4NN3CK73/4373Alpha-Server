<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 12.03.15, 16:28 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;


/**
 * The WorldConfigurationTest
 *
 * @package Anneck\Game\Configuration
 * @todo    Write PHPDoc for this class!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class WorldConfigurationTest extends \PHPUnit_Framework_TestCase {

  public function testWorldConfigurationSpecification() {
    $refClass = new \ReflectionClass(new WorldConfiguration());
    self::assertTrue($refClass->hasMethod('__toString'));
    self::assertTrue($refClass->hasMethod('getConfigTreeBuilder'));
  }
    public function testWorldConfigurationToString() {
        $worldConfig = new WorldConfiguration();
        self::assertEquals((string)$worldConfig, 'WorldConfiguration');
    }
}

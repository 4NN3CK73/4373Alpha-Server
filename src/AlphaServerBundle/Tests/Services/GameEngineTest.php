<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 03.03.15, 15:07 by 4nn3ck  
 * ************************************************************************
 */

namespace AlphaServerBundle\Tests\Services;


use AlphaServerBundle\Tests\ContainerAwareUnitTestCase;

class GameEngineTest extends ContainerAwareUnitTestCase {

    /**
     * Testing the service specification ...
     */
    public function testGameEngineSpec()
    {
        // Get the service class ...
        $gameEngine = self::getService('alpha_server.game_engine');

        // Check against spec using reflection ...
        $reflectionClass = new \ReflectionClass($gameEngine);

        static::assertTrue(
            $reflectionClass->hasMethod('nextTurn'),
            'GameEngineSpec requires method: nextTurn()'
        );

        $result = $gameEngine->nextTurn();

    }
}

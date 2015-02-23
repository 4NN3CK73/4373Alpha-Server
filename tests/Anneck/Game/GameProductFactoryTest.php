<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 19.02.15, 12:43 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;


use Anneck\Game\Configuration\GameWorldConfiguration;
use Anneck\Game\Exception\GameException;
use Anneck\Game\Worlds\GameWorld;
use PHPUnit_Framework_TestCase;

class GameProductFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testCreationOfGameProductFactory()
    {
        $gameProductFactory = null; // Default to enable test fail with null.
        
        try {
            $gameWorld = new GameWorld();
            $gameWorld->create(new GameWorldConfiguration());
            $gameProductFactory = GameProductFactory::getInstance($gameWorld);
        } catch (GameException $gameException) {
            static::fail($gameException->getMessage());
        }


        static::assertNotNull($gameProductFactory, 'Failed to create the GameProductFactory');
    }

}

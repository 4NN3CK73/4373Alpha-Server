<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 11:53 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Player;


class PlayerTest extends \PHPUnit_Framework_TestCase
{

    public function testPlayerSpecification()
    {
        $player = new Player('John, May');
        self::assertEquals($player->getName(), 'John, May');
        self::assertTrue($player->getCredits() == 5000.00);
        $player->setCredits(100.00);
        self::assertEquals($player->getCredits(), 100.00);
    }


}

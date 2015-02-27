<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.02.15, 09:59 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Meta\Action\Item\DefaultItemAction;
use Anneck\Game\Meta\Action\System\DefaultSystemAction;

class ItemActionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultItemActionUse()
    {
        $defaultItemAction = new DefaultItemAction();
        // Testing toString ...
        $this->assertEquals('Anneck\Game\Meta\Action\Item\DefaultItemAction', "$defaultItemAction");
        // Testing usage ...
        $result = $defaultItemAction->execute();
        $this->assertTrue($result);
    }

    public function testSystemItemActionUse()
    {
        $defaultSystemAction = new DefaultSystemAction();
        // Testing toString ...
        $this->assertEquals('Anneck\Game\Meta\Action\System\DefaultSystemAction', "$defaultSystemAction");
        $result = $defaultSystemAction->execute();
        $this->assertTrue($result);
    }
}

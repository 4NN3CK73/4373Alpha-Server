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
use Anneck\Game\Worlds\DefaultWorld;

class ItemActionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultItemActionUse()
    {
        $defaultItemAction = new DefaultItemAction();
        // Testing toString ...
        static::assertEquals($defaultItemAction->__toString(), "$defaultItemAction");
        // Testing usage ...
        $result = $defaultItemAction->execute(new DefaultWorld());
        static::assertTrue($result);
    }

    public function testSystemItemActionUse()
    {
        $defaultSystemAction = new DefaultSystemAction();
        // Testing toString ...
        static::assertEquals($defaultSystemAction->__toString(), "$defaultSystemAction");
        $result = $defaultSystemAction->execute(new DefaultWorld());
        static::assertTrue($result);
    }
}

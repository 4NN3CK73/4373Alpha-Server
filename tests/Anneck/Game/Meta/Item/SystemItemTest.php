<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.02.15, 10:12 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta\Item;


use Anneck\Game\Meta\Action\Item\DefaultItemAction;
use Anneck\Game\Meta\Action\System\DefaultSystemAction;


class SystemItemTest extends \PHPUnit_Framework_TestCase
{

    public function testSystemItemDefaultItemAction()
    {
        $sysItem = new SystemItem();
        $sysItemAction = new DefaultSystemAction();
        $result = $sysItem->executeAction($sysItemAction);
        $this->assertNotNull($result);

    }

    public function testUserItemDefaultWrongItemAction()
    {
        $userItem = new UserItem();
        $result = $userItem->executeAction(new DefaultItemAction());
        $this->assertNull($result);

    }
}
